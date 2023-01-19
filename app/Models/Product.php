<?php

namespace App\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Spatie\Tags\HasTags;

class Product extends Model implements Viewable
{
    use Sluggable, SoftDeletes, HasTags,InteractsWithViews;

    protected $canonicalBasePath = '/products';
    protected $guarded           = [];
    protected $casts             = [
        'image' => 'array',
        'child' => 'array',
        'faq' => 'array'
    ];

    const TYPE  = [
        'free' => 'رایگان',
        'cash' => 'نقدی',
        'vip'  => 'ویژه'
    ];

    const KIND  = [
        'course'  => 'دوره آموزشی',
        'meeting' => 'کلاس آنلاین',
        'webinar' => 'وبینار',
        'file'    => 'فایل',
    ];

    const STATE = [
        'performed' => 'در حال برگزاری',
        'completed' => 'تکمیل شده',
        'stop'      => 'توقف فروش',
        'pre'      => 'پیش ثبت نام',
    ];

    const LEVEL = [
        'novice'       => 'مقدماتی',
        'intermediate' => 'مقدماتی و متوسط',
        'expert'       => 'مقدماتی تا پیشرفته'
    ];

    const FREE_LINK = [
        'ADD_TIME'  => 48,
        'BASE_DATE' => 631528260
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'unique' => true,
                'onUpdate' => false,
                'includeTrashed' => true
            ]
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function path(): string
    {
        return "/products/$this->slug";
    }

    public function author(){
        return $this->belongsTo(Admin::class,'author_id');
    }

    public function translation(){
        return $this->hasOne(Post::class,'translation_id');
    }

    public function teacher(){
        return $this->belongsTo(Admin::class,'admin_id');
    }

    /*public function supports()
    {
        return $this->hasMany(Support::class);
    }*/

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->where('status', true);
    }

    public function modal()
    {
        return $this->belongsTo(Modal::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class)->whereNotNull('parent_id');
    }

    public function headlines()
    {
        return $this->hasMany(Chapter::class)->whereNull('parent_id');
    }

    public function recommendeds()
    {
        return $this->belongsToMany(Product::class, 'product_recommended', 'product_id', 'recommended_id');
    }

    public function learnings()
    {
        return $this->hasMany(Learning::class);
    }

    public function getImage($size = 'original'){

        if ($this->image == null || $this->image == ""){
            return asset('images/default.jpg');
        }
        return '/storage'.$this->image[$size];
    }

    public function getCover(){
        return '/storage'.$this->cover;
    }

    public function getHeadlinesPDF(){
        return '/storage'.$this->headlines_pdf;
    }

    public static function getLevels($level = null)
    {
        $levels = [
            1 => self::LEVEL['novice'],
            2 => self::LEVEL['intermediate'],
            3 => self::LEVEL['expert'],
        ];

        if (is_null($level)) {
            return $levels;
        }

        return $levels[$level];
    }

    public function generateFreeLink(int $userId, string $reason)
    {
        if ($this->has_free_link) {
            $user = DB::table('users')->select('id', 'email', 'created_at')->where('id', $userId)->first();

            if ($user and $user->created_at) {
                $freeLink = DB::table('product_free_links')->where('user_id', $user->id)->where('product_id', $this->id)->first();

                if ($freeLink and $freeLink->used_at) {
                    return null;
                }
                else {
                    $addTime = self::FREE_LINK['ADD_TIME'];
                    $baseDate = self::FREE_LINK['BASE_DATE'];

                    $createdAt = Carbon::createFromFormat('Y-m-d H:i:s', $user->created_at)->getTimestamp();
                    $token = random_int(1000000000, PHP_INT_MAX);

                    $data = [
                        'user_id'       => $user->id,
                        'product_id'    => $this->id,
                        'token'         => $token,
                        'create_reason' => $reason,
                        'created_at'    => now(),
                    ];

                    if ($freeLink) {
                        DB::table('product_free_links')->where('id', $freeLink->id)->update($data);
                    }
                    else {
                        DB::table('product_free_links')->insert($data);
                    }

                    $payload = ($createdAt - $baseDate) + $addTime + $user->id + $token;
                    $payload = hash_hmac('sha1', $payload, config('settings.free-dl-hash'));

                    $params = [
                        'product' => $this->slug,
                        'payload' => $payload
                    ];

                    return URL::temporarySignedRoute('product.free-download', now()->addHours($addTime), $params);
                }
            }
        }

        return null;
    }

    public function getJsonLdAttribute()
    {
        $jsonLD = [
            "@context"    => "https://schema.org",
            "@type"       => "Course",
            "name"        => $this->fa_title,
            "description" => $this->description,
            "provider"    => [
                "@type"  => "Organization",
                "name"   => "آکادمی‌آی‌تی",
                "sameAs" => url('/')
            ],
        ];

        return json_encode($jsonLD);
    }

    public function getVideoJsonLdAttribute()
    {
        $jsonLD = [
            "@context"             => "https://schema.org",
            "@type"                => "VideoObject",
            "name"                 => $this->fa_title,
            "description"          => $this->description,
            "thumbnailUrl"         => [url($this->cover)],
            "uploadDate"           => $this->created_at->toIso8601String(),
            //"duration" => "PT1M54S",
            "contentUrl"           => $this->video,
            //"embedUrl" => "https://www.example.com/embed/123",
            "interactionStatistic" => [
                "@type"                => "InteractionCounter",
                "interactionType"      => ["@type" => "http://schema.org/WatchAction"],
                "userInteractionCount" => $this->view
            ],
        ];

        return json_encode($jsonLD);
    }
}
