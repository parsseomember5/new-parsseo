<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{route('admin.dashboard')}}" class="app-brand-link">
            <img src="{{asset('admin/assets/img/branding/auth_logo.png')}}" alt="logo" style="width: 140px;">
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx menu-toggle-icon d-none d-xl-block fs-4 align-middle"></i>
            <i class="bx bx-x d-block d-xl-none bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-divider mt-0"></div>

    <div class="menu-inner-shadow"></div>

    <?php $currentRoute = \Illuminate\Support\Facades\Route::currentRouteName();?>

    <ul class="menu-inner py-1">

        {{-- dashboard --}}
        <li class="menu-item {{$currentRoute == "admin.dashboard" ? 'active' :''}}">
            <a href="{{route('admin.dashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-home-circle"></i>
                <div data-i18n="Page 1">داشبورد</div>
            </a>
        </li>

        {{-- profile --}}
        <li class="menu-item {{str_starts_with($currentRoute,'admin.profile') ? 'active' :''}}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-user"></i>
                <div data-i18n="Invoice">حساب کاربری</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{$currentRoute == "admin.profile" ? 'active' :''}}">
                    <a href="{{route('admin.profile')}}" class="menu-link">
                        <div data-i18n="List">ویرایش اطلاعات</div>
                    </a>
                </li>
                <li class="menu-item {{$currentRoute == "admin.profile.security" ? 'active' :''}}">
                    <a href="{{route('admin.profile.security')}}" class="menu-link">
                        <div data-i18n="Preview">امنیت</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- contacts --}}
        <li class="menu-item {{$currentRoute == "contacts.index" ? 'active' :''}}">
            <a href="{{route('contacts.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-contact"></i>
                <div data-i18n="Page 1">درخواست های تماس</div>
            </a>
        </li>

        {{-- posts --}}
        <li class="menu-item {{str_starts_with($currentRoute,'posts') ? 'active' :''}}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-pencil"></i>
                <div data-i18n="Users">مقالات</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{$currentRoute == "posts.index" ? 'active' :''}}">
                    <a href="{{route('posts.index')}}" class="menu-link">
                        <div data-i18n="List">مشاهده همه</div>
                    </a>
                </li>
                <li class="menu-item {{$currentRoute == "posts.trash" ? 'active' :''}}">
                    <a href="{{route('posts.trash')}}" class="menu-link">
                        <div data-i18n="List">زباله‌دان</div>
                    </a>
                </li>
                <li class="menu-item {{$currentRoute == "posts.create" ? 'active' :''}}">
                    <a href="{{route('posts.create')}}" class="menu-link">
                        <div data-i18n="List">افزودن مورد جدید</div>
                    </a>
                </li>
                <li class="menu-item {{str_starts_with($currentRoute,"post-categories") ? 'active' :''}}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <div data-i18n="View">دسته بندی ها</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{$currentRoute == "post-categories.index" ? 'active' :''}}">
                            <a href="{{route('post-categories.index')}}" class="menu-link">
                                <div data-i18n="Account">مشاهده همه</div>
                            </a>
                        </li>
                        <li class="menu-item {{$currentRoute == "post-categories.create" ? 'active' :''}}">
                            <a href="{{route('post-categories.create')}}" class="menu-link">
                                <div data-i18n="Security">افزودن مورد جدید</div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>

        {{-- products --}}
        <li class="menu-item {{str_starts_with($currentRoute,'products') ? 'active' :''}}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-shopping-bags"></i>
                <div data-i18n="Users">محصولات</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{$currentRoute == "products.index" ? 'active' :''}}">
                    <a href="{{route('products.index')}}" class="menu-link">
                        <div data-i18n="List">مشاهده همه</div>
                    </a>
                </li>
                <li class="menu-item {{$currentRoute == "products.trash" ? 'active' :''}}">
                    <a href="{{route('products.trash')}}" class="menu-link">
                        <div data-i18n="List">زباله‌دان</div>
                    </a>
                </li>
                <li class="menu-item {{$currentRoute == "products.create" ? 'active' :''}}">
                    <a href="{{route('products.create')}}" class="menu-link">
                        <div data-i18n="List">افزودن مورد جدید</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- chapters --}}
        <li class="menu-item {{str_starts_with($currentRoute,'chapters') ? 'active' :''}}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-videos"></i>
                <div data-i18n="Users">سرفصل ها</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{$currentRoute == "chapters.index" ? 'active' :''}}">
                    <a href="{{route('chapters.index')}}" class="menu-link">
                        <div data-i18n="List">مشاهده همه</div>
                    </a>
                </li>
                <li class="menu-item {{$currentRoute == "chapters.create" ? 'active' :''}}">
                    <a href="{{route('chapters.create')}}" class="menu-link">
                        <div data-i18n="List">افزودن مورد جدید</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- tags --}}
        <li class="menu-item {{str_starts_with($currentRoute,'tags') ? 'active' :''}}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-tag"></i>
                <div data-i18n="Users">تگ ها</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{$currentRoute == "tags.index" ? 'active' :''}}">
                    <a href="{{route('tags.index')}}" class="menu-link">
                        <div data-i18n="List">مشاهده همه</div>
                    </a>
                </li>
                <li class="menu-item {{$currentRoute == "tags.create" ? 'active' :''}}">
                    <a href="{{route('tags.create')}}" class="menu-link">
                        <div data-i18n="List">افزودن مورد جدید</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- portfolios --}}
        <li class="menu-item {{str_starts_with($currentRoute,'portfolios') ? 'active' :''}}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-box"></i>
                <div data-i18n="Users">نمونه‌کار ها</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{$currentRoute == "portfolios.index" ? 'active' :''}}">
                    <a href="{{route('portfolios.index')}}" class="menu-link">
                        <div data-i18n="List">مشاهده همه</div>
                    </a>
                </li>
                <li class="menu-item {{$currentRoute == "portfolios.trash" ? 'active' :''}}">
                    <a href="{{route('portfolios.trash')}}" class="menu-link">
                        <div data-i18n="List">زباله‌دان</div>
                    </a>
                </li>
                <li class="menu-item {{$currentRoute == "portfolios.create" ? 'active' :''}}">
                    <a href="{{route('portfolios.create')}}" class="menu-link">
                        <div data-i18n="List">افزودن مورد جدید</div>
                    </a>
                </li>
                <li class="menu-item {{str_starts_with($currentRoute,"portfolio-categories") ? 'active' :''}}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <div data-i18n="View">دسته بندی نمونه‌کار ها</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{$currentRoute == "portfolio-categories.index" ? 'active' :''}}">
                            <a href="{{route('portfolio-categories.index')}}" class="menu-link">
                                <div data-i18n="Account">مشاهده همه</div>
                            </a>
                        </li>
                        <li class="menu-item {{$currentRoute == "portfolio-categories.create" ? 'active' :''}}">
                            <a href="{{route('portfolio-categories.create')}}" class="menu-link">
                                <div data-i18n="Security">افزودن مورد جدید</div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>

        {{-- logos --}}
        <li class="menu-item {{str_starts_with($currentRoute,'logos.') ? 'active' :''}}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-image"></i>
                <div data-i18n="Invoice">لوگوی مشتریان</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{$currentRoute == "logos.index" ? 'active' :''}}">
                    <a href="{{route('logos.index')}}" class="menu-link">
                        <div data-i18n="List">مشاهده همه</div>
                    </a>
                </li>
                <li class="menu-item {{$currentRoute == "logos.create" ? 'active' :''}}">
                    <a href="{{route('logos.create')}}" class="menu-link">
                        <div data-i18n="Preview">افزودن مورد جدید</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- pages --}}
        <li class="menu-item {{str_starts_with($currentRoute,'pages.') ? 'active' :''}}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-news"></i>
                <div data-i18n="Invoice">برگه ها</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{$currentRoute == "pages.index" ? 'active' :''}}">
                    <a href="{{route('pages.index')}}" class="menu-link">
                        <div data-i18n="List">مشاهده همه</div>
                    </a>
                </li>
                <li class="menu-item {{$currentRoute == "pages.trash" ? 'active' :''}}">
                    <a href="{{route('pages.trash')}}" class="menu-link">
                        <div data-i18n="List">زباله‌دان</div>
                    </a>
                </li>
                <li class="menu-item {{$currentRoute == "pages.create" ? 'active' :''}}">
                    <a href="{{route('pages.create')}}" class="menu-link">
                        <div data-i18n="Preview">افزودن مورد جدید</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- feedbacks --}}
        <li class="menu-item {{str_starts_with($currentRoute,'feedbacks.') ? 'active' :''}}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-message-dots"></i>
                <div data-i18n="Invoice">نظرات مشتریان</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{$currentRoute == "feedbacks.index" ? 'active' :''}}">
                    <a href="{{route('feedbacks.index')}}" class="menu-link">
                        <div data-i18n="List">مشاهده همه</div>
                    </a>
                </li>
                <li class="menu-item {{$currentRoute == "feedbacks.create" ? 'active' :''}}">
                    <a href="{{route('feedbacks.create')}}" class="menu-link">
                        <div data-i18n="Preview">افزودن مورد جدید</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- menus --}}
        <li class="menu-item {{str_starts_with($currentRoute,'menu') ? 'active' :''}}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-category-alt"></i>
                <div data-i18n="Invoice">منو ها</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{$currentRoute == "menus.index" ? 'active' :''}}">
                    <a href="{{route('menus.index')}}" class="menu-link">
                        <div data-i18n="List">لیست منو ها</div>
                    </a>
                </li>
                <li class="menu-item {{$currentRoute == "menus.create" ? 'active' :''}}">
                    <a href="{{route('menus.create')}}" class="menu-link">
                        <div data-i18n="Preview">افزودن منوی جدید</div>
                    </a>
                </li>

                <li class="menu-item {{str_starts_with($currentRoute,"menu-items") ? 'active' :''}}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <div data-i18n="View">آیتم های منو</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{$currentRoute == "menu-items.index" ? 'active' :''}}">
                            <a href="{{route('menu-items.index')}}" class="menu-link">
                                <div data-i18n="Account">مشاهده همه</div>
                            </a>
                        </li>
                        <li class="menu-item {{$currentRoute == "menu-items.create" ? 'active' :''}}">
                            <a href="{{route('menu-items.create')}}" class="menu-link">
                                <div data-i18n="Security">افزودن مورد جدید</div>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </li>

        {{-- settings --}}
        <li class="menu-item {{str_starts_with($currentRoute,'settings.') ? 'active' :''}}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-cog"></i>
                <div data-i18n="Invoice">تنظیمات</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{$currentRoute == "settings.general" ? 'active' :''}}">
                    <a href="{{route('settings.general')}}" class="menu-link">
                        <div data-i18n="List">عمومی</div>
                    </a>
                </li>
                <li class="menu-item {{$currentRoute == "settings.hero" ? 'active' :''}}">
                    <a href="{{route('settings.hero')}}" class="menu-link">
                        <div data-i18n="Preview">هیرو</div>
                    </a>
                </li>
                <li class="menu-item {{$currentRoute == "settings.about" ? 'active' :''}}">
                    <a href="{{route('settings.about')}}" class="menu-link">
                        <div data-i18n="Preview">درباره ما</div>
                    </a>
                </li>
                <li class="menu-item {{$currentRoute == "settings.portfolios" ? 'active' :''}}">
                    <a href="{{route('settings.portfolios')}}" class="menu-link">
                        <div data-i18n="Preview">نمونه کار ها</div>
                    </a>
                </li>
                <li class="menu-item {{$currentRoute == "settings.features" ? 'active' :''}}">
                    <a href="{{route('settings.features')}}" class="menu-link">
                        <div data-i18n="Preview">ویژگی ها</div>
                    </a>
                </li>
                <li class="menu-item {{$currentRoute == "settings.articles" ? 'active' :''}}">
                    <a href="{{route('settings.articles')}}" class="menu-link">
                        <div data-i18n="Preview">مقالات</div>
                    </a>
                </li>
                <li class="menu-item {{$currentRoute == "settings.feedbacks" ? 'active' :''}}">
                    <a href="{{route('settings.feedbacks')}}" class="menu-link">
                        <div data-i18n="Preview">نظرات مشتریان</div>
                    </a>
                </li>
                <li class="menu-item {{$currentRoute == "settings.events" ? 'active' :''}}">
                    <a href="{{route('settings.events')}}" class="menu-link">
                        <div data-i18n="Preview">رویداد ها</div>
                    </a>
                </li>
                <li class="menu-item {{$currentRoute == "settings.counters" ? 'active' :''}}">
                    <a href="{{route('settings.counters')}}" class="menu-link">
                        <div data-i18n="Preview">شمارشگر ها</div>
                    </a>
                </li>

            </ul>
        </li>
    </ul>
</aside>
