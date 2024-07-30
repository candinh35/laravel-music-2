<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Spotify Shopee</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="{{ asset('css/typography.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css?version=1') }}">
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
                <a href="{{ route('admin.dashboard') }}" class="header-logo">
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
                            <a href="{{ route('admin.dashboard') }}" class="iq-waves-effect"><i
                                    class="las la-house-damage"></i><span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="{{ route('categories.index') }}" class="iq-waves-effect"><i
                                    class="ri-function-line"></i><span>Category</span></a>
                        </li>
                        <li>
                            <a href="{{ route('singers.index') }}" class="iq-waves-effect"><i
                                    class="las la-microphone-alt"></i><span>Singer</span></a>
                        </li>
                        <li>
                            <a href="{{ route('albums.index') }}" class="iq-waves-effect"><i
                                    class="ri-record-circle-line"></i><span>Album</span></a>
                        </li>
                        <li>
                            <a href="{{ route('songs.index') }}" class="iq-waves-effect"><i
                                    class="las la-play-circle"></i><span>Song</span></a>
                        </li>
                        <li>
                            <a href="{{ route('users.index') }}" class="iq-waves-effect"><i
                                    class="las la-user"></i><span>User</span></a>
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
                            <a href="{{ route('admin.dashboard') }}" class="header-logo">
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
                            Management
                        </ul>
                        <ul class="navbar-nav ml-auto navbar-list">
                            <li class="nav-item nav-icon">
                                <div class="iq-search-bar">
                                    <form action="" class="searchbox" method="get">
                                        <input type="text" class="text search-input" name="filter"
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
                                    <a class="search-audio" href="#"><i
                                            class="las la-microphone text-black"></i></a>
                                </form>
                            </li>
                            <li class="line-height pt-3">
                                <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                                    <img src="{{ asset('images/user/11.png') }}" class="img-fluid rounded-circle"
                                        alt="user">
                                </a>
                                <div class="iq-sub-dropdown iq-user-dropdown">
                                    <div class="iq-card shadow-none m-0">
                                        <div class="iq-card-body p-0 ">
                                            <div class="bg-primary p-3">
                                                <h5 class="mb-0 text-white line-height">Hello Admin</h5>
                                                <span class="text-white font-size-12">Available</span>
                                            </div>
                                            <div class="d-inline-block w-100 text-center p-3">
                                                <a class="bg-primary iq-sign-btn" href="{{ route('admin.logout') }}"
                                                    role="button">Sign out<i class="ri-login-box-line ml-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- TOP Nav Bar END -->
        <!-- Page Content  -->
        <div id="content-page" class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="iq-card">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Wrapper END -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <script>
        setTimeout(function() {
            $("#modal").slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);
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
    <script src="{{ asset('js/charts.js') }}"></script>
    <!-- am animated JavaScript -->
    <script src="{{ asset('js/animated.js') }}"></script>
    <!-- am kelly JavaScript -->
    <script src="{{ asset('js/kelly.js') }}"></script>
    <!-- am maps JavaScript -->
    <script src="{{ asset('js/maps.js') }}"></script>
    <!-- am worldLow JavaScript -->
    <script src="{{ asset('js/worldLow.js') }}"></script>
    <!-- Style Customizer -->
    <script src="{{ asset('js/style-customizer.js') }}"></script>
    <script src="{{ asset('js/chart-custom.js') }}"></script>
    <!-- music js -->
    <script src="{{ asset('js/music-player.js') }}"></script>
    <!-- music-player js -->
    <script src="{{ asset('js/music-player-dashboard.js') }}"></script>
    <!-- Custom JavaScript -->
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
