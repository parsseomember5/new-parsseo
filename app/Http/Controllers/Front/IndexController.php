<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ContactRequest;
use App\Models\LandingAboutUs;
use App\Models\LandingAppdesign;
use App\Models\LandingContactUs;
use App\Models\LandingSeo;
use App\Models\LandingWebdesign;
use App\Models\Page;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\PortfoliosSetting;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;
use Spatie\Tags\Tag;

class IndexController extends Controller
{
    public function home()
    {
        return view('front.home');
    }

    public function search()
    {
        $query = request('query');
        if ($query) {
            $posts = Search::add(Post::where('status', 'published'), ['title', 'slug'])
                ->dontParseTerm()
                ->beginWithWildcard()
                ->paginate(10)->search($query);
            $title = 'جستجو برای: ' . $query;
            return view('front.articles', compact('posts', 'title'));
        }
        abort(404);
    }

    public function article(Post $post)
    {
        // check status
        if ($post->status != 'published' && !auth()->guard('admin')->check()) {
            abort(404);
        }

        // check locale
        if (app()->getLocale() != $post->locale) {
            if ($post->translation && $post->translation->locale == app()->getLocale()) {
                return redirect(route('post.show', $post->translation));
            }
            return redirect(route('home'));
        }

        $previous = Post::where('locale', $post->locale)->where('id', '<', $post->id)->orderBy('id', 'desc')->first();
        $next = Post::where('locale', $post->locale)->where('id', '>', $post->id)->orderBy('id', 'asc')->first();;
        views($post)->record();
        return view('front.article', compact('post', 'previous', 'next'));
    }

    public function articles()
    {
        $locale = app()->getLocale();
        $posts = Post::where('locale', $locale)->where('status', 'published')->orderByDesc('order')->paginate(16);
        $title = 'مقالات';
        return view('front.articles', compact('posts', 'title'));
    }

    public function portfolio(Portfolio $portfolio)
    {
        // check locale
        if (app()->getLocale() != $portfolio->locale) {
            if ($portfolio->translation && $portfolio->translation->locale == app()->getLocale()) {
                return redirect(route('portfolio.show', $portfolio->translation));
            }
            return redirect(route('home'));
        }

        views($portfolio)->record();
        return view('front.portfolio', compact('portfolio'));
    }

    public function portfolios()
    {
        $portfoliosSettings = PortfoliosSetting::first();
        $portfolios = Portfolio::where('locale', app()->getLocale())->orderByDesc('order')->paginate(16);
        return view('front.portfolios', compact('portfolios', 'portfoliosSettings'));
    }

    public function page(Page $page)
    {
        // check status
        if ($page->status != 'published' && !auth()->guard('admin')->check()) {
            abort(404);
        }

        views($page)->record();
        return view('front.page', compact('page'));
    }

    public function postCategory(PostCategory $category)
    {
        $posts = $category->posts()->where('status', 'published')
            ->where('locale', app()->getLocale())
            ->orderByDesc('order')->paginate(16);
        return view('front.article_category', compact('posts', 'category'));
    }

    public function portfolioCategory(PortfolioCategory $category)
    {
        $portfolios = $category->portfolios()
            ->where('locale', app()->getLocale())
            ->orderByDesc('order')->paginate(16);
        return view('front.portfolio_category', compact('portfolios', 'category'));
    }

    public function tag(Tag $tag)
    {
        $posts = Post::withAnyTags([$tag])->where('status', 'published')
            ->where('locale', app()->getLocale())
            ->orderByDesc('order')->paginate(16);
        return view('front.article_tag', compact('posts', 'tag'));
    }

    public function changeLang(Request $request)
    {
        if ($request->has('lang')) {
            App::setLocale($request->lang);
            session()->put('locale', $request->lang);
            return redirect()->back();
        }
        abort(404);
    }

    public function storeContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'message' => 'nullable|string|max:1024'
        ]);
        ContactRequest::create($request->all());
        session()->flash('success', 'درخواست شما با موفقیت ثبت شد! همکاران ما بزودی با شما تماس خواهند گرفت.');
        return redirect()->back();
    }

    public function contactUs(){
        $landing = LandingContactUs::first();
        return view('front.contact_us',compact('landing'));
    }

    public function aboutUs(){
        $landing = LandingAboutUs::first();
        return view('front.about_us',compact('landing'));
    }

    public function seo(){
        $landing = LandingSeo::first();
        return view('front.seo',compact('landing'));
    }

    public function appDesign(){
        $landing = LandingAppdesign::first();
        return view('front.app_design',compact('landing'));
    }

    public function webDesign(){
        $landing = LandingWebdesign::first();
        return view('front.web_design',compact('landing'));
    }
}
