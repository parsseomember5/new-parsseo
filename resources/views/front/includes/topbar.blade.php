<div class="header-topbar d-none d-sm-block">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-auto">
                <ul class="contact-info">
                    <li><a href="mailto:{{$generalSetting->header_email}}"><i class="far fa-envelope"></i> <span class="__cf_email__" data-cfemail="aedddbdedec1dcdaeec9c3cfc7c280cdc1c3">[{{$generalSetting->header_email}}]</span></a></li>
                    <li><a href="#"><i class="far fa-map-marker-alt"></i> {{$generalSetting->header_address}}</a></li>
                </ul>
            </div>

            <div class="col-auto d-none d-md-block mr-auto">
                @include('front.includes.social_icons')
            </div>

            {{-- language switcher --}}
{{--            <div class="col-auto">--}}
{{--                @include('front.includes.lang_switcher')--}}
{{--            </div>--}}
        </div>
    </div>
</div>
