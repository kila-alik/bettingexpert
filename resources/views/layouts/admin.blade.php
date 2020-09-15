<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Панель управления</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('favicon.ico') }}">
    <!-- App css -->
    <link href="{{ URL::asset('admin/assets/plugins/spinkit/spinkit.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('admin/assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('admin/assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('admin/assets/plugins/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('admin/assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('admin/assets/css/app.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ URL::asset('admin/assets/js/modernizr.min.js') }}"></script>
</head>
<body>
<!-- Begin page -->
<div id="wrapper">

    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">

        <div class="slimscroll-menu" id="remove-scroll">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="{{ route('control-panel') }}" class="inline-block logo">
                            <span>
                                <img src="{{ URL::asset('admin/assets/images/logo.png') }}" alt="" height="22">
                            </span>
                    <i>
                        <img src="{{ URL::asset('admin/assets/images/logo_sm.png') }}" alt="" height="28">
                    </i>
                </a>
                <a href="{{ route('index') }}"  title="Посмотреть сайт" class="inline-block btn btn-light btn-sm" target="_blank"><i class="fa fa-eye colored text-success"></i></a>
            </div>

            <div class="user-box"></div>

            <!--- Sidemenu -->
            <div id="sidebar-menu">

                <ul class="metismenu" id="side-menu">

                    <!--<li class="menu-title">Navigation</li>-->

                    <li>
                        <a href="{{ route('control-panel') }}">
                            <i class="fi-air-play"></i><span>Панель управления</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript: void(0);"><i class="fi-layers"></i> <span> Прогнозы </span> <span class="menu-arrow"></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{ route('forecasts.index') }}">Все прогнозы</a></li>
                            <li><a href="{{ route('forecasts.create') }}">Добавить прогноз</a></li>
                            <li><a href="{{ route('sort.index') }}">Види спортов</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('forecasters.index') }}">
                            <i class="fa fa-user-circle-o"></i> <span>Прогнозисты</span>
                        </a>
                    </li>

                    <li class="menu-title">БОЛЬШЕ</li>

                    <li>
                        <a href="javascript: void(0);"><i class="fi-paper"></i> <span>Новости</span> <span class="menu-arrow"></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{ route('news.index') }}">Все новости</a></li>
                            <li><a href="{{ route('news.create') }}">Добавить новость</a></li>
                            <li><a href="{{ route('news-category.index') }}">Категории новостей</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('reviews.index') }}">
                            <i class="fa fa-star"></i> <span>Отзывы</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('users.index') }}">
                            <i class="fa fa-users"></i> <span>Пользователи</span>
                        </a>
                    </li>

                </ul>

            </div>
            <!-- Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->

    <div class="content-page">

        <!-- Top Bar Start -->
        <div class="topbar">

            <nav class="navbar-custom">

                <ul class="list-unstyled topbar-right-menu float-right mb-0">

                    <li class="hide-phone app-search">
                        <form>
                            <input type="text" placeholder="Поиск..." class="form-control">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <i class="fi-bell noti-icon"></i>
                            <span class="badge badge-danger badge-pill noti-icon-badge">4</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg">

                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5 class="m-0"><span class="float-right"><a href="" class="text-dark"><small>Clear All</small></a> </span>Notification</h5>
                            </div>

                            <div class="slimscroll" style="max-height: 230px;">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-success"><i class="mdi mdi-comment-account-outline"></i></div>
                                    <p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">1 min ago</small></p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-info"><i class="mdi mdi-account-plus"></i></div>
                                    <p class="notify-details">New user registered.<small class="text-muted">5 hours ago</small></p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-danger"><i class="mdi mdi-heart"></i></div>
                                    <p class="notify-details">Carlos Crouch liked <b>Admin</b><small class="text-muted">3 days ago</small></p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-warning"><i class="mdi mdi-comment-account-outline"></i></div>
                                    <p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">4 days ago</small></p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-purple"><i class="mdi mdi-account-plus"></i></div>
                                    <p class="notify-details">New user registered.<small class="text-muted">7 days ago</small></p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-custom"><i class="mdi mdi-heart"></i></div>
                                    <p class="notify-details">Carlos Crouch liked <b>Admin</b><small class="text-muted">13 days ago</small></p>
                                </a>
                            </div>

                            <!-- All-->
                            <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                View all <i class="fi-arrow-right"></i>
                            </a>

                        </div>
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <img src="{{ URL::asset('admin/assets/images/users/avatar-1.jpg') }}" alt="user" class="rounded-circle"> <span class="ml-1">{{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fi-head"></i> <span>My Account</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fi-cog"></i> <span>Settings</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fi-help"></i> <span>Support</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fi-lock"></i> <span>Lock Screen</span>
                            </a>

                            <!-- item-->
                            <form action="{{ route('logout') }}" method="post">
                                {{ csrf_field() }}
                                <button type="submit" class="dropdown-item notify-item">
                                    <i class="fi-power"></i> <span>Logout</span>
                                </button>
                            </form>


                        </div>
                    </li>

                </ul>

                <ul class="list-inline menu-left mb-0">
                    <li class="float-left">
                        <button class="button-menu-mobile open-left disable-btn">
                            <i class="dripicons-menu"></i>
                        </button>
                    </li>
                    <li>
                        <div class="page-title-box">
                            <h4 class="page-title">Панель управления</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">Добро пожаловать в панель администрирования SportPrognoz!</li>
                            </ol>
                        </div>
                    </li>

                </ul>

            </nav>

        </div>
        <!-- Top Bar End -->



        <!-- Start Page content -->
        <div class="content">
            <div class="container-fluid">

                @yield('content')

            </div> <!-- container -->

        </div> <!-- content -->

        <footer class="footer text-right">
            2018 © Панель управления - Sportprognoz.pw
        </footer>

    </div>


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->



<!-- jQuery  -->
<script src="{{ URL::asset('admin/assets/js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('admin/assets/js/popper.min.js') }}"></script>
<script src="{{ URL::asset('admin/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('admin/assets/js/metisMenu.min.js') }}"></script>
<script src="{{ URL::asset('admin/assets/js/waves.js') }}"></script>
<script src="{{ URL::asset('admin/assets/js/jquery.slimscroll.js') }}"></script>

<script src="{{ URL::asset('admin/assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}" type="text/javascript"></script>

<!-- KNOB JS -->
<!--[if IE]>
<script type="text/javascript" src="{{ URL::asset('admin/assets/plugins/jquery-knob/excanvas.js') }}"></script>
<![endif]-->
<script src="{{ URL::asset('admin/assets/plugins/jquery-knob/jquery.knob.js') }}"></script>

<!-- App js -->
<script src="{{ URL::asset('admin/assets/js/jquery.core.js') }}"></script>
<script src="{{ URL::asset('admin/assets/js/jquery.app.js') }}"></script>
<script src="{{ URL::asset('admin/assets/js/app.js') }}"></script>
<script src="{{ URL::asset('admin/assets/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
@yield('scripts')

</body>
</html>