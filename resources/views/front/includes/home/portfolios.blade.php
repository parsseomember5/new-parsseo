<section class="project-section project-section-two">
    <div class="container fluid-extra-padding">
        <div class="common-heading text-center color-version-white mb-30">
				<span class="tagline">
					<i class="fas fa-plus"></i>{{$portfoliosSetting->portfolios_uptitle}}
					<span class="heading-shadow-text">{{$portfoliosSetting->portfolios_uptitle}}</span>
				</span>
            <h2 class="title">{{$portfoliosSetting->portfolios_title}}</h2>
        </div>
        @php $portfolios = \App\Models\Portfolio::where('locale',$locale)->where('featured',true)->take($portfoliosSetting->portfolios_count)->get(); @endphp
        <div class="row justify-content-center project-items project-style-one">
            @foreach($portfolios as $portfolio)
                <div class="col-lg-4 col-md-6 col-sm-10">
                    @include('front.items.portfolio',[$portfolio])
                </div>
            @endforeach
        </div>
    </div>
</section>
