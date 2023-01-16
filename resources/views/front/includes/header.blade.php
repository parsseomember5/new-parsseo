<header class="site-header sticky-header {{$headerClass}}">

    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3 mb-4" role="alert">
                {{session('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-error alert-dismissible fade show mt-3 mb-4" role="alert">
                {{session('error')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>

    {{-- topbar --}}
    @include('front.includes.topbar')

    {{-- header --}}
    <div class="navbar-wrapper">
        <div class="container">
            <div class="navbar-inner">
                <div class="site-logo">
                    <a href="/">
                        <img src="{{$generalSetting->getHeaderLogo()}}" alt="{{config('app.app_name_fa')}}" loading="lazy">
                    </a>
                </div>
                <nav class="nav-menu">
                    <h2 class="d-none">{{isset($navTitle) ? $navTitle : $generalSetting->main_nav_title}}</h2>
                    <?php $mainMenu = \App\Models\Menu::where('location','main_menu')->where('locale',app()->getLocale())->first();?>
                    <ul>
                        @foreach($mainMenu->items()->where('parent_id',null)->get() as $menuItem)
                            <li>
                                <a href="{{$menuItem->link}}">{{$menuItem->title}}</a>
                                @if($menuItem->items->count())
                                    <ul class="submenu">
                                    @foreach($menuItem->items as $subItem)
                                        <li><a href="{{$subItem->link}}">{{$subItem->title}}</a></li>
                                    @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </nav>
                <div class="navbar-extra d-flex align-items-center">
                    <a href="{{$generalSetting->header_btn_link}}" class="main-btn nav-btn d-none d-sm-inline-block" {{str_starts_with($generalSetting->header_btn_link,'#') ? 'data-lity' : ''}}>
                        {{$generalSetting->header_btn_text}} <i class="far {{$generalSetting->header_btn_icon}}"></i>
                    </a>
                    <a href="#" class="nav-toggler">
                        <span></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile-menu-panel">
        <div class="panel-logo">
            <a href="/"><img src="{{$generalSetting->getHeaderMobileLogo()}}" alt="logo" loading="lazy"></a>
        </div>

{{--        <div class="text-center mb-3 pr-3">--}}
{{--            @include('front.includes.lang_switcher')--}}
{{--        </div>--}}

        <ul class="panel-menu">
            @foreach($mainMenu->items()->where('parent_id',null)->get() as $menuItem)
                <li>
                    <a href="{{$menuItem->link}}">{{$menuItem->title}}</a>
                    @if($menuItem->items->count())
                        <ul class="submenu">
                            @foreach($menuItem->items as $subItem)
                                <li><a href="{{$subItem->link}}">{{$subItem->title}}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>

        <div class="panel-extra">
            <a href="{{$generalSetting->header_btn_link}}" class="main-btn btn-white" {{str_starts_with($generalSetting->header_btn_link,'#') ? 'data-lity' : ''}}>
                {{$generalSetting->header_btn_text}} <i class="far {{$generalSetting->header_btn_icon}}"></i>
            </a>
        </div>
        <a href="#" class="panel-close">
            <i class="fal fa-times"></i>
        </a>
    </div>
</header>
