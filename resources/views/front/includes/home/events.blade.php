<section class="partners-with-cta">
    {{-- events --}}
    <div class="cta-boxes">
        <div class="container">
            <div class="row no-gutters justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="cta-box cta-primary-overly" style="background-image: url({{$eventsSetting->getEvent1Image()}});">
                        <h2 class="cta-title">{{$eventsSetting->event1_title}}</h2>
                        <p>{{$eventsSetting->event1_text}}</p>
                        <a href="{{$eventsSetting->event1_btn_link}}" {{str_starts_with($eventsSetting->event1_btn_link,'#') ? 'data-lity' : ''}} class="main-btn btn-white">{{$eventsSetting->event1_btn_text}} <i class="far {{$eventsSetting->event1_btn_icon}}"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-10">
                    <div class="cta-box mt-40" style="background-image: url({{$eventsSetting->getEvent2Image()}});">
                        <h2 class="cta-title">{{$eventsSetting->event2_title}}</h2>
                        <p>{{$eventsSetting->event2_text}}</p>
                        <a href="{{$eventsSetting->event2_btn_link}}" {{str_starts_with($eventsSetting->event2_btn_link,'#') ? 'data-lity' : ''}} class="main-btn">{{$eventsSetting->event2_btn_text}} <i class="far {{$eventsSetting->event2_btn_icon}}"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- logos --}}
    <div class="partners-logos">
        <div class="container">
            <div class="row partners-logos-two">
                @foreach(\App\Models\Logo::all()->sortBy('order') as $logo)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        @include('front.items.logo',[$logo])
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
