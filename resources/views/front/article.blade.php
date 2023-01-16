@extends('front.layouts.master',['headerClass' => '', 'h1Title' => $post->title,
'description' => $post->meta_description, 'canonical' => $post->canonical , 'title' => $post->title])
@section('content')
    <!--====== Page Title Start ======-->
    <section class="page-title-area" style="background-image: url({{$post->getImage()}})">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-8">
                    <h2 class="page-title">{{$post->title}}</h2>
                </div>
                <div class="col-auto">
                    <ul class="page-breadcrumb">
                        <li><a href="{{route('home')}}">{{config('app.app_name_fa')}}</a></li>
                        @if($post->categories->count() > 0)
                        <li><a href="{{route('post_category.show',$post->categories->first())}}">{{$post->categories->first()->title}}</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--====== Page Title End ======-->

    <!--====== Blog Details Area Start ======-->
    <section class="blog-area section-gap-extra-bottom primary-soft-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="blog-post-details">
                        <div class="post-thumbnail">
                            <img src="{{$post->getImage()}}" alt="{{$post->title}}">
                        </div>
                        <div class="post-content">
                            <ul class="post-meta">
                                <li>
                                    <a href="#"><i class="far fa-user-circle"></i>{{$post->author->name}}</a>
                                </li>
                                <li>
                                    <a href="#"><i class="far fa-calendar-alt"></i>{{verta($post->created_at)->format('%d %B، %Y')}}</a>
                                </li>
                            </ul>
                            <h3 class="title">{{$post->title}}</h3>
                            <blockquote>
                                {{$post->excerpt}}
                            </blockquote>
                            {!! $post->body !!}
                            <div class="post-footer mt-40">
                                <div class="row justify-content-between">
                                    <div class="col-auto">
                                        <div class="related-tags">
                                            <span>تگ های مرتبط: </span>
                                            @foreach($post->tags as $tag)
                                            <a href="{{route('tag.show',$tag->slug)}}">{{$tag->name}}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="social-share">
                                            <span>اشتراک: </span>
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{route('post.show',$post)}}"><i class="fab fa-facebook-f"></i></a>
                                            <a href="http://twitter.com/share?text={{$post->title}}&url={{route('post.show',$post)}}"><i class="fab fa-twitter"></i></a>
                                            <a href="https://www.instagram.com/?url={{route('post.show',$post)}}"><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                                @include('front.items.author',['author' => $post->author])

                                <div class="post-nav mt-50">
                                    <div class="row">
                                        @if($previous)
                                        <div class="col-sm-6">
                                            @include('front.items.article_horizontal',['post' => $previous,'icon' => 'fa-arrow-right'])
                                        </div>
                                        @endif
                                        @if($next)
                                        <div class="col-sm-6">
                                            @include('front.items.article_horizontal',['post' => $next,'icon' => 'fa-arrow-left'])
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    @include('front.includes.article_sidebar',$post)
                </div>
            </div>
        </div>
    </section>
    <!--====== Blog Standard Area End ======-->
@endsection
