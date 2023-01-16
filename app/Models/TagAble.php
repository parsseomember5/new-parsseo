<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphPivot;

class TagAble extends MorphPivot
{
    /**
     * @var array
     */
    protected $guarded = [];
    /**
     *
     * @var bool
     */
    public $timestamps= false;

    /**
     * @var bool
     */
    public $incrementing = true;
    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var string
     */
    protected $table = 'tag_ables';


    public function tag()
    {
        return $this->belongsTo(Tag::class , 'tag_id');
    }
}
