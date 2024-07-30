<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>spotify_shopee</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="{{ asset('css/typography.css?version=1') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
</head>

<body class="sidebar-main-active right-column-fixed">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">
        <!-- Sidebar  -->
        <div class="iq-sidebar">
            <div class="iq-sidebar-logo d-flex justify-content-between">
                <a href="{{ route('client.home') }}" class="header-logo">
                    <img src="{{ asset('images/logo.png') }}" class="img-fluid rounded-normal" alt="">
                    <div class="logo-title">
                        <span class="text-primary text-uppercase">Spotify</span>
                    </div>
                </a>
                <div class="iq-menu-bt-sidebar">
                    <div class="iq-menu-bt align-self-center">
                        <div class="wrapper-menu">
                            <div class="main-circle"><i class="las la-bars"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sidebar-scrollbar">
                <nav class="iq-sidebar-menu">
                    <ul id="iq-sidebar-toggle" class="iq-menu">
                        <li>
                            <a href="{{ route('client.home') }}" class="iq-waves-effect"><i
                                    class="las la-home iq-arrow-left"></i><span>Home</span></a>
                        </li>
                        <li>
                            <a href="#discover" class="iq-waves-effect" data-toggle="collapse"
                                aria-expanded="false"><span class="ripple rippleEffect"></span><i
                                    class="las la-headphones"></i><span>Discover</span><i
                                    class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                            <ul id="discover" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li>
                                    <a href="{{ route('client.albums') }}"><i class="lar la-file-audio"></i>Album</a>
                                </li>
                                <li><a href="{{ route('client.singers') }}"><i
                                            class="las la-microphone-alt"></i>Singer</a></li>
                                <!-- <li><a href="#"><i class="las la-play"></i>Music</a></li> -->
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('client.playlist') }}" class="iq-waves-effect">
                                <i class="lab la-gratipay"></i><span>My Playlist</span>
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>
        <!-- TOP Nav Bar -->
        <div class="iq-top-navbar">
            <div class="iq-navbar-custom">
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <div class="iq-menu-bt d-flex align-items-center">
                        <div class="wrapper-menu">
                            <div class="main-circle"><i class="las la-bars"></i></div>
                        </div>
                        <div class="iq-navbar-logo d-flex justify-content-between">
                            <a href="{{ route('client.home') }}" class="header-logo">
                                <img src="{{ asset('images/logo.png') }}" class="img-fluid rounded-normal"
                                    alt="">
                                <div class="pt-2 pl-2 logo-title">
                                    <span class="text-primary text-uppercase">Spotify</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-label="Toggle navigation">
                        <i class="ri-menu-3-line"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="list-unstyled iq-menu-top d-flex justify-content-between mb-0 p-0">
                            <li><a href="{{ route('client.home') }}">Home</a></li>
                            <!-- <li><a href="#">Genres</a></li> -->
                            <li><a href="{{ route('client.albums') }}">Albums</a></li>
                        </ul>
                        <ul class="navbar-nav ml-auto navbar-list">
                            <li class="nav-item nav-icon">
                                <div class="iq-search-bar">
                                    <form action="{{ route('client.search') }}" method="get" class="searchbox">
                                        <input type="text" name="filter" class="text search-input"
                                            placeholder="Search Here..">
                                        <button type="submit" class="search-link"
                                            style="border: none;outline: none;background: none;cursor: pointer;"><i
                                                class="ri-search-line text-black"></i></button>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item nav-icon search-content">
                                <a href="#" class="search-toggle iq-waves-effect text-gray rounded"><span
                                        class="ripple rippleEffect "></span>
                                    <i class="ri-search-line text-black"></i>
                                </a>
                                <form action="#" class="search-box p-0">
                                    <input type="text" class="text search-input"
                                        placeholder="Type here to search...">
                                    <a class="search-link" href="#"><i
                                            class="ri-search-line text-black"></i></a>
                                </form>
                            </li>
                            @if (auth()->user())
                                <li class="line-height pt-3">
                                    <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                                        <img src="{{ asset('images/user/11.png') }}" class="img-fluid rounded-circle"
                                            alt="user">
                                    </a>
                                    <div class="iq-sub-dropdown iq-user-dropdown">
                                        <div class="iq-card shadow-none m-0">
                                            <div class="iq-card-body p-0 ">
                                                <div class="bg-primary p-3">
                                                    <h5 class="mb-0 text-white line-height">
                                                        Hello {{ auth()->user()->name }}
                                                    </h5>
                                                    <span class="text-white font-size-12">Available</span>
                                                </div>
                                                <a href="{{ route('client.profile') }}"
                                                    class="iq-sub-card iq-bg-primary-hover">
                                                    <div class="media align-items-center">
                                                        <div class="rounded iq-card-icon iq-bg-primary">
                                                            <i class="ri-file-user-line"></i>
                                                        </div>
                                                        <div class="media-body ml-3">
                                                            <h6 class="mb-0 ">My Profile</h6>
                                                            <p class="mb-0 font-size-12">View personal profile details.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="d-inline-block w-100 text-center p-3">
                                                    <a class="bg-primary iq-sign-btn"
                                                        href="{{ route('client.logout') }}" role="button">
                                                        Sign out <i class="ri-login-box-line ml-2"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @else
                                <li class="nav-item nav-icon">
                                    <a href="{{ route('client.login') }}"
                                        class="search-toggle iq-waves-effect text-black rounded" data-toggle="tooltip"
                                        title="" data-placement="bottom" data-original-title="Sign in">
                                        <i class="las la-sign-in-alt"></i>
                                    </a>
                                </li>
                                <li class="nav-item nav-icon">
                                    <a href="{{ route('client.register') }}"
                                        class="search-toggle iq-waves-effect text-black rounded" data-toggle="tooltip"
                                        title="" data-placement="bottom" data-original-title="Sign up">
                                        <i class="lab la-wpforms"></i>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- TOP Nav Bar END -->
        <!-- Page Content  -->
        <div id="content-page" class="content-page">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- Wrapper END -->
    @include('client.music_player')
    <?php if (isset($_SESSION['error'])) : ?>
    <div class="modal fade" id="overlay">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ERROR</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><?php echo $_SESSION['error']; ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <?php unset($_SESSION['error']);
    endif; ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <script type="text/javascript">
        @isset($songs)
            var songList = @json($songs);
        @endif
        var publicPath = @json(asset('uploads/audios'));
    </script>

    <script src="{{ asset('js/main.js') }}"></script>
    <!-- Appear JavaScript -->
    <script src="{{ asset('js/jquery.appear.js') }}"></script>
    <!-- Countdown JavaScript -->
    <script src="{{ asset('js/countdown.min.js') }}"></script>
    <!-- Counterup JavaScript -->
    <script src="{{ asset('js/waypoints.min.js') }}"></script>
    <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
    <!-- Wow JavaScript -->
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <!-- Apexcharts JavaScript -->
    <script src="{{ asset('js/apexcharts.js') }}"></script>
    <!-- Slick JavaScript -->
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <!-- Select2 JavaScript -->
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <!-- Owl Carousel JavaScript -->
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <!-- Magnific Popup JavaScript -->
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Smooth Scrollbar JavaScript -->
    <script src="{{ asset('js/smooth-scrollbar.js') }}"></script>

    <!-- am core JavaScript -->
    <script src="{{ asset('js/core.js') }}"></script>
    <!-- am charts JavaScript -->
    {{-- <script src="{{ asset('js/charts.js') }}"></script> --}}
    <!-- am animated JavaScript -->
    {{-- <script src="{{ asset('js/animated.js') }}"></script> --}}
    <!-- am kelly JavaScript -->
    <script src="{{ asset('js/kelly.js') }}"></script>
    <!-- am maps JavaScript -->
    <script src="{{ asset('js/maps.js') }}"></script>
    <!-- am worldLow JavaScript -->
    <script src="{{ asset('js/worldLow.js') }}"></script>
    <!-- Style Customizer -->
    <script src="{{ asset('js/style-customizer.js') }}"></script>

    <script src="{{ asset('js/chart-custom.js') }}"></script>
    <!-- music player js -->
    <script src="{{ asset('js/music-player.js') }}"></script>
    <!-- Custom JavaScript -->
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
