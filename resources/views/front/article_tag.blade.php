@extends('front.layouts.master',['headerClass' => '', 'h1Title' => $tag->name,
'description' => '', 'canonical' => '' , 'title' => $tag->name])
@section('content')
    <!--====== Page Title Start ======-->
    <section class="page-title-area">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-8">
                    <h2 class="page-title">{{$tag->name}}</h2>
                </div>
                <div class="col-auto">
                    <ul class="page-breadcrumb">
                        <li><a href="{{route('home')}}">{{config('app.app_name_fa')}}</a></li>
                        <li><a href="{{route('posts')}}">بلاگ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--====== Page Title End ======-->

    <!--====== Event area Start ======-->
    <section class="event-area section-gap-extra-bottom">
        <div class="container">
            <div class="event-items">
                @foreach($posts as $article)
                    @include('front.items.article_horizontal_lg',$article)
                @endforeach
                <div class="col-12">
                    {{$posts->links('front.includes.paginator')}}
                </div>
            </div>
        </div>
    </section>
    <!--====== Event area End ======-->
@endsection
