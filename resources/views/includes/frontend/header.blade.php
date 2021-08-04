<header id="header">
    <nav class="ss-navbar" style="margin-bottom: 10px;">

        <div class="ss-navbar-logo">
            <a href="{{ route('home.index') }}"><svg x="0px" y="0px" viewBox="0 0 1500 1500" xml:space="preserve" width="165" style="height: 124px;
    margin: -35;
    padding-right: 40px;
">
                    <style type="text/css">
                        .st0 {
                            fill: #FF7200;
                        }

                        .st1 {
                            fill: #FFFFFF;
                        }
                    </style>
                    <g id="V_2_">
                        <g id="V_1_">
                            <title>Logo2020</title>
                            <polygon id="V" class="st0" points="105.6,547 190.5,547 291.5,765.2 413.3,547 477.2,547 291.4,953.5  "></polygon>
                        </g>
                    </g>
                    <g id="M_2_">
                        <g id="M_3_">
                            <polygon id="M_4_" class="st1" points="344.9,953.5 528.8,547.7 681.3,853.1 830.3,547.7 1028.9,953.5 959.8,953.5 833.8,727.4  718.2,953.5 651.3,953.5 525.4,730.8 416.9,953.5  "></polygon>
                        </g>
                    </g>
                    <g id="O_2_">
                        <g id="O_1_">
                            <path id="O" class="st1" d="M1190,547c-112.2,0.5-202.8,92-202.2,204.3s92.1,202.8,204.4,202.2c111.8-0.6,202.2-91.4,202.2-203.2 C1394.1,637.7,1302.6,546.7,1190,547z M1277.9,857.2c-59.8,45.9-152.3,41.1-198.1-18.7c-45.8-59.8-18.4-145.1,41.4-190.9 c59.8-45.8,140.3-50.4,186.1,9.4C1353.1,716.8,1337.7,811.3,1277.9,857.2L1277.9,857.2z"></path>
                        </g>
                    </g>
                </svg></a>
        </div>
        <div class="ss-navbar-menu">
            <ul>
                @foreach ($categories as $value)
                <li>
                    <a href="{{ route('home.category', $value->slug)  }}">{{ $value->name }}</a>
                    @if($value->subcategories->count() > 0)
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                    <ul>
                        @foreach ($value->subcategories as $subMenu)
                        <li><a href="{{ route('home.detail', $subMenu->slug) }}" style="color: while;">{{ $subMenu->name }}</a></li>
                        @endforeach
                    </ul>
                    @endif

                </li>
                @endforeach
                <li><a href="{{ route('contact.index') }}">Liên Hệ</a></li>
                <li >
                    @if(Auth::guard('customer')->user())
                        <img class="user-image" style="height: 20px;margin: 27px;" src="{{ Auth::guard('customer')->user()->avatar }}" alt="">
                        <span class="user-name">{{ Auth::guard('customer')->user()->name }}</span>
                        <ul>
                            <li><a href="#" ><i class="icon_clock_alt"></i>Thông Tin</a></li>
                            <li><a href="{{ route('customerpost.select') }}" ><i class="icon_clock_alt"></i> Đăng bài</a></li>
                                <li><a href="#" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i class="icon_clock_alt"></i> Logout</a></li>
                                <form id="frm-logout" action="{{ route('customer.logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                        </ul>
                    @else
                        <a href="{{ route('login.provider', 'google') }}" style="background-color: black;">{{ __('G-SUITE LOGIN') }}</a>
                    @endif
                </li>

            </ul>
        </div>
    </nav>
</header>