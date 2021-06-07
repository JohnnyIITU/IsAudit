<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ISaudIT</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/magnific-popup.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/themify-icons.css">
    <link rel="stylesheet" href="/css/nice-select.css">
    <link rel="stylesheet" href="/css/flaticon.css">
    <link rel="stylesheet" href="/css/gijgo.css">
    <link rel="stylesheet" href="/css/animate.min.css">
    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/slicknav.css">
    <link rel="stylesheet" href="/css/style.css">
    <!-- <link rel="stylesheet" href="/css/responsive.css"> -->
</head>

<body>
<div class="modal hide fade" id="modalLoginForm" data-dismiss="modal"  data-backdrop="false"  tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                    <i class="ti-user"></i>
                    <input type="email" id="username" class="form-control">
                    <label data-error="wrong" data-success="right" for="defaultForm-email">Username</label>
                </div>

                <div class="md-form mb-4">
                    <i class="ti-lock prefix grey-text"></i>
                    <input type="password" id="password" class="form-control">
                    <label data-error="wrong" data-success="right" for="defaultForm-pass">Password</label>
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" onclick="login()" class="btn btn-default">Login</button>
            </div>
        </div>
    </div>
</div>

<!-- header-start -->
<header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-2">
                        <div class="logo">
                            <a href="index.html">
                                <img src="img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7">
                        <div class="main-menu  d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="/">Home</a></li>
                                    <li><a href="#">Services<i class="ti-angle-down"></i></a>
                                        <ul class="submenu">
                                            <li><a href="/test">Testing</a></li>
                                            @if(\Illuminate\Support\Facades\Auth::user()->checkAdminAccess())
                                                <li><a href="/monitor">Monitoring</a></li>
                                                <li><a href="/analyze">Analyze</a></li>
                                            @endif
                                        </ul>
                                    </li>
                                    <li><a href="/solutions">Solutions</a></li>
                                    <li><a href="/about">About Us</a></li>
                                    <li><a href="/contact">Contact</a></li>
                                    <li style="float: right;"><a href="#" data-toggle="modal" data-target="#modalLoginForm">Login</a></li>


                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                        <div class="Appointment">
                            <div class="book_btn d-none d-lg-block">
                                <a  href="#"> <i class="fa fa-pen"></i>Send Request</a>
                                <a  href="#"> <i class="fa fa-phone"></i>+7 777 518 8310</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>


<!-- header-end -->
