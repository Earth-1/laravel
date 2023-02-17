<!-- Start Top Header Bar -->
<section class="top-header">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-12 col-sm-4">
                <div class="contact-number">
                    <i class="tf-ion-ios-telephone"></i>
                    <span>094-521-6536</span>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 col-sm-4">
                <!-- Site Logo -->
                <div class="logo text-center">
                    <a href="{{ url('/') }}">
                        <!-- replace logo here -->
                        <svg width="135px" height="29px" viewBox="0 0 155 29" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"
                                font-size="40" font-family="AustinBold, Austin" font-weight="bold">
                                <g id="Group" transform="translate(-108.000000, -297.000000)" fill="#000000">
                                    <text id="AVIATO">
                                        <tspan x="108.94" y="325">BENNY</tspan>
                                    </text>
                                </g>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 col-sm-4">
                <!-- Cart -->
                <ul class="top-menu text-right list-inline">
                    <li class="dropdown cart-nav dropdown-slide">
                        <a href="{{ url('show_cart') }}"><i class="tf-ion-android-cart"></i>ตะกร้า</a>
                    </li><!-- / Cart -->
                    {{-- <li class="dropdown search dropdown-slide">
                        <a href="#!" class="" data-toggle="dropdown" data-hover="dropdown">
                            <i
                                class="tf-ion-ios-search-strong"></i> ค้นหา</a>
                        <ul class="dropdown-menu search-dropdown">
                            <li>
                                <form action="post"><input type="search" class="form-control" placeholder="ค้นหา...">
                                </form>
                            </li>
                        </ul>
                    </li><!-- / Search --> --}}
                    <li class="dropdown search dropdown-slide">
                        @if (Route::has('login'))
                            @auth
                                <x-app-layout>
                                    <span><i class="tf-ion-android-user"> สวัสดีคุณ {{ Auth::user()->name }}</i></span>
                                </x-app-layout>
                            @else
                                <span>เข้าสู่ระบบ / ลงทะเบียน</span>
                            @endauth
                        @endif
                        </a>
                        <ul class="dropdown-menu search-dropdown">
                            <li>
                                @if (Route::has('login'))
                                    @auth
                                        <x-app-layout>
                                            <!-- Responsive Navigation Menu -->
                                            <div :class="{ 'block': open, 'hidden': !open }" class="">
                                                <!-- Responsive Settings Options -->
                                                <div class="pt-4 pb-1 border-t border-gray-200">
                                                    <div class="flex items-center px-4">
                                                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                                            <div class="shrink-0 mr-3">
                                                                <img class="h-10 w-10 rounded-full object-cover"
                                                                    src="{{ Auth::user()->profile_photo_url }}"
                                                                    alt="{{ Auth::user()->name }}" />
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="mt-3 space-y-1">
                                                        <!-- Account Management -->
                                                        <x-jet-responsive-nav-link href="{{ route('profile.show') }}"
                                                            :active="request()->routeIs('profile.show')">
                                                            {{ __('Profile') }}
                                                        </x-jet-responsive-nav-link>
                                                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                                            <x-jet-responsive-nav-link
                                                                href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                                                                {{ __('API Tokens') }}
                                                            </x-jet-responsive-nav-link>
                                                        @endif
                                                        <!-- Authentication -->
                                                        <form method="POST" action="{{ route('logout') }}" x-data>
                                                            @csrf
                                                            <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                                                @click.prevent="$root.submit();">
                                                                {{ __('Log Out') }}
                                                            </x-jet-responsive-nav-link>
                                                        </form>
                                                        <!-- Team Management -->
                                                        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                                            <div class="border-t border-gray-200"></div>
                                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                                {{ __('Manage Team') }}
                                                            </div>
                                                            <!-- Team Settings -->
                                                            <x-jet-responsive-nav-link
                                                                href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                                                                :active="request()->routeIs('teams.show')">
                                                                {{ __('Team Settings') }}
                                                            </x-jet-responsive-nav-link>
                                                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                                                <x-jet-responsive-nav-link href="{{ route('teams.create') }}"
                                                                    :active="request()->routeIs('teams.create')">
                                                                    {{ __('Create New Team') }}
                                                                </x-jet-responsive-nav-link>
                                                            @endcan
                                                            <div class="border-t border-gray-200"></div>
                                                            <!-- Team Switcher -->
                                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                                {{ __('Switch Teams') }}
                                                            </div>
                                                            @foreach (Auth::user()->allTeams() as $team)
                                                                <x-jet-switchable-team :team="$team"
                                                                    component="jet-responsive-nav-link" />
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </x-app-layout>
                                    @else
                                        <a href="{{ route('login') }}"
                                            class="text-sm text-gray-700 dark:text-gray-500 underline">เข้าสู่ระบบ</a>
                                        <a href="{{ route('register') }}"
                                            class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">ลงทะเบียน</a>
                                    @endauth
                                @endif
                            </li>
                        </ul>
                    </li><!-- / Search -->
                </ul><!-- / .nav .navbar-nav .navbar-right -->
            </div>
        </div>
    </div>
</section><!-- End Top Header Bar -->
<!-- Main Menu Section -->
<section class="menu">
    <nav class="navbar navigation">
        <div class="container">
            <div class="navbar-header">
                <h2 class="menu-title">Main Menu</h2>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Navbar Links -->
            <div id="navbar" class="navbar-collapse text-center collapse" aria-expanded="false" style="height: 1px;">
                <ul class="nav navbar-nav">
                    <!-- Home -->
                    <li class="dropdown ">
                        <a href="{{ url('/') }}">หน้าแรก</a>
                    </li><!-- / Home -->
                    <!-- Blog -->
                    <li class="dropdown dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                            data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">ชอปปิ้ง
                            <span class="tf-ion-ios-arrow-down"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('shop') }}">ชอปปิ้ง</a></li>
                            <li><a href="{{ url('show_order') }}">คำสั่งซื้อ</a></li>
                        </ul>
                    </li><!-- / Blog -->
                </ul><!-- / .nav .navbar-nav -->
            </div>
            <!--/.navbar-collapse -->
        </div><!-- / .container -->
    </nav>
</section>
