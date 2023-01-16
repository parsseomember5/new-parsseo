<footer class="site-footer with-footer-cta with-footer-bg">
    {{-- box --}}
    <div class="footer-cta">
        <div class="container">
            <div class="row justify-content-lg-between justify-content-center align-items-center">
                <div class="col-lg-7 col-md-8 col-sm-10">
                    <span class="cta-tagline">{{$generalSetting->footer_box_small_text}}</span>
                    <h3 class="cta-title"> {{$generalSetting->footer_box_large_text}}</h3>
                </div>
                <div class="col-lg-auto col-md-6">
                    <a href="{{$generalSetting->footer_box_btn_link}}" class="main-btn bordered-btn bordered-white mt-md-30">
                        {{$generalSetting->footer_box_btn_text}} <i class="far {{$generalSetting->footer_box_btn_icon}}"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- footer --}}
    <div class="footer-content-area" style="background-image: url({{$generalSetting->getFooterImage()}})">
        <div class="container">
            <div class="footer-widgets">
                <div class="row justify-content-between">
                    <div class="col-xl-4 col-lg-6">
                        <div class="widget about-widget">
                            <div class="footer-logo">
                                <img src="{{$generalSetting->getFooterLogo()}}" alt="logo" loading="lazy">
                            </div>
                            <p>{{$generalSetting->footer_under_logo_text}}</p>
                            {!! $generalSetting->footer_logos !!}
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-6">
                        <div class="widget nav-widget">
                            <div class="widget-title">{{$generalSetting->footer_list1_title}}</div>
                            <?php $fMenu1 = \App\Models\Menu::where('location','footer_list1')->where('locale',app()->getLocale())->first();?>
                            @if($fMenu1)
                            <ul>
                                @foreach($fMenu1->items()->where('parent_id',null)->get() as $menuItem)
                                    <li><a href="{{$menuItem->link}}">{{$menuItem->title}}</a></li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-6">
                        <div class="widget nav-widget">
                            <div class="widget-title">{{$generalSetting->footer_list2_title}}</div>
                            <?php $fMenu2 = \App\Models\Menu::where('location','footer_list2')->where('locale',app()->getLocale())->first();?>
                            @if($fMenu2)
                            <ul>
                                @foreach($fMenu2->items()->where('parent_id',null)->get() as $menuItem)
                                    <li><a href="{{$menuItem->link}}">{{$menuItem->title}}</a></li>
                                @endforeach
                            </ul>
                                @endif
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-6">
                        <div class="widget nav-widget">
                            <div class="widget-title">{{$generalSetting->footer_list3_title}}</div>
                            <?php $fMenu3 = \App\Models\Menu::where('location','footer_list3')->where('locale',app()->getLocale())->first();?>
                            @if($fMenu3)
                            <ul>
                                @foreach($fMenu3->items()->where('parent_id',null)->get() as $menuItem)
                                    <li><a href="{{$menuItem->link}}">{{$menuItem->title}}</a></li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-6">
                        <div class="widget nav-widget">
                            <div class="widget-title">{{$generalSetting->footer_list4_title}}</div>
                            <?php $fMenu4 = \App\Models\Menu::where('location','footer_list4')->where('locale',app()->getLocale())->first();?>
                            @if($fMenu4)
                            <ul>
                                @foreach($fMenu4->items()->where('parent_id',null)->get() as $menuItem)
                                    <li><a href="{{$menuItem->link}}">{{$menuItem->title}}</a></li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="widget contact-widget">
                            <div class="widget-title widget-contact-title">ارتباط با ما</div>
                            <ul class="info-list footer-info-list">
                                <li>
                                    <span class="icon"><i class="far fa-phone"></i></span>
                                    <span class="info">
											<span class="info-title">شماره تماس</span>
											<a href="tel:{{$generalSetting->footer_phone}}">{{$generalSetting->footer_phone}}</a>
										</span>
                                </li>
                                <li class="separator"></li>
                                <li>
                                    <span class="icon"><i class="far fa-envelope-open"></i></span>
                                    <span class="info">
											<span class="info-title">ایمیل</span>
											<a href="mailto:{{$generalSetting->footer_email}}"><span class="__cf_email__" data-cfemail="0f7c7a7f7f607d7b4f68626e6663216c6062">[{{$generalSetting->footer_email}}]</span></a>
										</span>
                                </li>
                                <li class="separator"></li>
                                <li>
                                    <span class="icon"><i class="far fa-map-marker-alt"></i></span>
                                    <span class="info">
											<span class="info-title">آدرس</span>
											<span class="small">{{$generalSetting->footer_address}}</span>
										</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-area">
                <div class="row flex-md-row-reverse">
                    <div class="col-md-6">
                        @include('front.includes.social_icons')
                    </div>
                    <div class="col-md-6">
                        <p class="copyright-text">{!! $generalSetting->footer_copyright !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
