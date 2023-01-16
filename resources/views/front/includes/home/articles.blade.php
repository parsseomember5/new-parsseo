<section class="latest-blog-section section-gap">
    <div class="container">
        <div class="common-heading text-center mb-30">
				<span class="tagline">
					<i class="fas fa-plus"></i> {{$articlesSetting->articles_uptitle}}
					<span class="heading-shadow-text">{{$articlesSetting->articles_uptitle}}</span>
				</span>
            <h2 class="title">{{$articlesSetting->articles_title}}</h2>
        </div>
        <div class="row justify-content-center latest-blog-posts style-one">
            @foreach(\App\Models\Post::where('locale',$locale)->where('status','published')->orderByDesc('order')->take($articlesSetting->articles_count)->get() as $article)
                <div class="col-lg-4 col-md-6 col-sm-9 col-11 wow fadeInUp" data-wow-delay="0.1s">
                    @include('front.items.article',$article)
                </div>
            @endforeach

        </div>
    </div>
</section>
