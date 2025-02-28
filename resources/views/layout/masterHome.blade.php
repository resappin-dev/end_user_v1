<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aksesoris Komputer Serpong</title>

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('template') }}/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('template') }}/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('template') }}/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('template') }}/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('template') }}/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('template') }}/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('template') }}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('template') }}/css/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <style>
        .swal2-popup .nice-select {
            display: none !important;
        }
    </style>
</head>

<body>
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="{{ asset('template') }}/img/image/logo_acc.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            {{-- <div class="header__top__right__language">
                <img src="{{ asset('template') }}/img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div> --}}
            <div class="header__top__right__auth">
                <a href="{{ url('/login') }}"><i class="fa fa-user"></i>Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{ url('/') }}">Home</a></li>
                <li><a href="#">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="#">Shop Details</a></li>
                        <li><a href="#">Shoping Cart</a></li>
                        <li><a href="#">Check Out</a></li>
                        <li><a href="#">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>   
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> customerservice@aksesoriskomputer-serpong.shop</li>
                <li>Welcome to Aksesoris Komputer Serpong!</li>
            </ul>
        </div>
    </div>
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> customerservice@aksesoriskomputer-serpong.shop</li>
                                <li>Welcome to Aksesoris Komputer Serpong!</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            {{-- <div class="header__top__right__language">
                                <img src="{{ asset('template') }}/img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div> --}}
                            <div class="header__top__right__auth">
                                @if(Auth::check())
                                <div class="d-flex flex-column align-items-center p-3">
                                    <span class="me-3 bg-white px-3 py-1">
                                        <strong>Hi, {{ Auth::user()->name }}</strong>
                                    </span>
                                    <span class="me-3">
                                        <a href="/logout" class="small pt-1"><i class="fa fa-user"></i>Logout</a>
                                    </span>
                                </div>
                                {{-- <a href="/logout"><i class="fa fa-user"></i> Logout</a> --}}
                                @else
                                    <a href="/login"><i class="fa fa-user"></i> Login</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{ url('/') }}"><img src="{{ asset('template') }}/img/image/logo_acc.png" alt="" style="height: 125px; width:200px"></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="#">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="#">Shop Details</a></li>
                                    <li><a href="#">Shoping Cart</a></li>
                                    <li><a href="#">Check Out</a></li>
                                    {{-- <li><a href="./blog-details.html">Blog Details</a></li> --}}
                                </ul>
                            </li>
                            {{-- <li><a href="./blog.html">Blog</a></li> --}}
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
{{-- Konten --}}
    @yield('konten-first')
{{-- End Konten --}}
        @if (Session::has('success'))
            <script>
                console.log('Success')
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '{{ Session::get('success') }}',
                    showConfirmButton: false,
                });
            </script>
        @elseif($errors->any())
            <script>
                console.log('Error')
                var errorMessage = @json($errors->all());
                var formattedErrorMessage = errorMessage.join(' & ');
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: formattedErrorMessage,
                    showConfirmButton: false,
                });
            </script>
        @endif

    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="{{ url('/') }}"><img src="{{ asset('template') }}/img/image/logo_acc.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: Graha Raya Bintaro</li>
                            <li>Phone: +62 xxx-xxxx-xxxx</li>
                            <li>Email: cs@resappin.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p>
                        &copy;<script>document.write(new Date().getFullYear());</script> Aksesoris Komputer Serpong by RESAPPIN
                        </p></div>
                        <div class="footer__copyright__payment"><img src="{{ asset('template') }}/img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('template') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('template') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('template') }}/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('template') }}/js/jquery-ui.min.js"></script>
    <script src="{{ asset('template') }}/js/jquery.slicknav.js"></script>
    <script src="{{ asset('template') }}/js/mixitup.min.js"></script>
    <script src="{{ asset('template') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('template') }}/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>