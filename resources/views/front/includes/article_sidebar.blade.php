<div class="blog-sidebar">

    {{-- search --}}
    <div class="widget search-widget">
        <h4 class="widget-title">جستوجو کنید</h4>
        <form action="{{route('search')}}" method="get">
            <input aria-label="query" type="text" name="query" placeholder="دنبال چی میگردی؟">
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>

    {{-- categories --}}
    <div class="widget category-widget">
        <h4 class="widget-title">دسته بندی ها</h4>
        <ul>
            @foreach(\App\Models\PostCategory::has('posts')->get() as $category)
            <li><a href="{{route('post_category.show',$category)}}">{{$category->title . ' (' . $category->posts()->count() .')'}} <i class="far fa-angle-left"></i></a></li>
            @endforeach
        </ul>
    </div>

    {{-- latest articles --}}
    <div class="widget latest-blog-widget">
        <h4 class="widget-title">آخرین اخبار</h4>
        <ul>
            @foreach(\App\Models\Post::latest()->take(3)->get() as $post)
            <li>
                <div class="thumb">
                    <img src="{{$post->getImage('thumb')}}" alt="{{$post->title}}">
                </div>
                <div class="desc">
                    <h6><a href="{{route('post.show',$post)}}">{{$post->title}}</a></h6>
                    <span class="date"><i class="far fa-calendar-alt"></i>{{verta($post->created_at)->format('%d %B، %Y')}}</span>
                </div>
            </li>
            @endforeach
        </ul>
    </div>

    {{-- popular tags --}}
    <div class="widget tags-widget">
        <h4 class="widget-title">تگ های محبوب</h4>
        <ul>
            @foreach(\Spatie\Tags\Tag::withCount('posts')->take(12)->orderByDesc('posts_count')->get() as $tag)
            <li><a href="{{route('tag.show',$tag->slug)}}">{{$tag->name}}</a></li>
            @endforeach
        </ul>
    </div>

</div>
