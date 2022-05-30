<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title')</title>

    <!-- Google Font -->
    <link
      href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap"
      rel="stylesheet"
    />

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/elegant-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/slicknav.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </head>

  <body>
    <!-- Page Preloder -->
    <div id="preloder">
      <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
      <div class="humberger__menu__logo">
        {{-- <a href="#"><img src="{{ asset('frontend/img/logo.png') }}" alt="" /></a> --}}
      </div>
      <div class="humberger__menu__cart">
        <ul>
          {{-- <li>
            <a href="#"><i class="fa fa-heart"></i> <span>1</span></a>
          </li> --}}
          <li>
            <a href="/cart"><i class="fa fa-shopping-bag"></i> <span>3</span></a>
          </li>
        </ul>
        {{-- <div class="header__cart__price">item: <span>$150.00</span></div> --}}
      </div>
      <div class="humberger__menu__widget">
          @guest
            <div class="header__top__right__language">
              <div class="header__top__right__auth">
                <a href="{{ route('login') }}"><i class="fa fa-user"></i>Masuk</a>
              </div>
            </div>
            <div class="header__top__right__auth" style="margin-left: 20px">
              <a href="{{ route('register') }}"><i class="fa fa-user"></i>Daftar</a>
            </div>
          @else
          <div class="header__top__right__language">
            <div class="header__top__right__auth">
              <a href=""><i class="fa fa-user"></i> {{ auth()->user()->name }}</a>
            </div>
            <span class="arrow_carrot-down"></span>
            <ul>
              <li><a href="#">Profil</a></li>
            </ul>
          </div>
          <div class="header__top__right__auth" style="margin-left: 20px">
            <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-user"></i>Keluar</a>
            <form action="{{ route('logout') }}" id="logout-form" method="post">
              @csrf

            </form>
          </div>
          @endguest
      </div>
      <nav class="humberger__menu__nav mobile-menu">
        <ul>
          <li class="active"><a href="/home">Beranda</a></li>
          <li><a href="/shop">Shop</a></li>
          <li>
            <a href="#">Kategori Produk</a>
            <ul class="header__menu__dropdown">
              @foreach($menu_categories as $menu_category)
                <li><a href="{{ route('shop.index', $menu_category->slug) }}">{{ $menu_category->name }}</a></li>
              @endforeach
            </ul>
          </li>
          <li><a href="/about">About</a></li>
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
          <li><i class="fa fa-envelope"></i> Ula Petshop</li>
          <li>Harga mulai dari 10k!</li>
        </ul>
      </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
      <div class="header__top">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="header__top__left">
                <ul>
                  <li><i class="fa fa-envelope"></i> Ula Petshop</li>
                  <li>Harga mulai dari 10k!</li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
                @guest
                  <div class="header__top__right">
                    <div class="header__top__right__language header__top__right__auth">
                      <a class="d-inline" href="{{ route('login') }}"><i class="fa fa-user"></i>Masuk</a>
                    </div>
                    <div class="header__top__right__auth">
                      <a href="{{ route('register') }}"><i class="fa fa-user"></i>Daftar</a>
                    </div>
                </div>
                @else
                <div class="header__top__right">
                <div
                  class="header__top__right__language header__top__right__auth">
                  <a class="d-inline" href="#"><i class="fa fa-user"></i> {{ auth()->user()->name }}</a>
                  <span class="arrow_carrot-down"></span>
                  <ul>
                    <li><a href="#">Profil</a></li>
                  </ul>
                </div>
                <div class="header__top__right__auth">
                  <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit()"><i class="fa fa-user"></i> Logout</a>
                  <form action="{{ route('logout') }}" id="logout-form" method="post">
                    @csrf
                  </form>
                </div>
              </div>
                @endguest
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <div class="header__logo">
              {{-- <a href="./index.html"><img src="{{ asset('frontend/img/logo.png') }}" alt="" /></a> --}}
            </div>
          </div>
          <div class="col-lg-6">
            <nav class="header__menu">
              <ul>
                <li class="active"><a href="/home">Beranda</a></li>
                <li><a href="/shop">Belanja</a></li>
                <li>
                  <a href="#">Produk</a>
                  <ul class="header__menu__dropdown">
                    @foreach($menu_categories as $menu_category)
                      <li><a href="{{ route('shop.index', $menu_category->slug) }}">{{ $menu_category->name }}</a></li>
                    @endforeach
                  </ul>
                </li>
                <li><a href="/about">About</a></li>
              </ul>
            </nav>
          </div>
          <div class="col-lg-3">
            <div class="header__cart">
              <ul>
                {{-- <li>
                  <a href="#"><i class="fa fa-heart"></i> <span>1</span></a>
                </li> --}}
                <li>
                  <a href="/cart"><i class="fa fa-shopping-cart"></i></a>
                </li>
              </ul>
              {{-- <div class="header__cart__price">item: <span>$150.00</span></div> --}}
            </div>
          </div>
        </div>
        <div class="humberger__open">
          <i class="fa fa-bars"></i>
        </div>
      </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="hero__search">
              <div class="hero__search__form">
                <form action="#">
                  <input type="text" placeholder="Cari produk atau layanan" />
                  <button type="submit" class="site-btn">CARI</button>
                </form>
              </div>
              <div class="hero__search__phone">
                <div class="hero__search__phone__icon">
                  <i class="fa fa-phone"></i>
                </div>
                <div class="hero__search__phone__text">
                  <h5>+6283101463182</h5>
                  <span>Buka dari jam 08.00 - 22.00</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Hero Section End -->

    @yield('content')

    <!-- Footer Section Begin -->
    <footer class="footer spad">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="footer__about">
              <div class="footer__about__logo">
                {{-- <a href="./index.html"><img src="{{ asset('frontend/img/logo.png') }}" alt="" /></a> --}}
              </div>
              <ul>
                <li>Alamat: Sukasari, Kec. Dawuan, Kabupaten Subang, Jawa Barat 41271</li>
                <li>Telepon: +6283101463182</li>
                <li>Email: ulapetshop@.com</li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
            <div class="footer__widget">

            </div>
          </div>
          <div class="col-lg-4 col-md-12">
            <div class="footer__widget">
              <h6>Join Our Newsletter Now</h6>
              <p>
                Get E-mail updates about our latest shop and special offers.
              </p>
              <form action="#">
                <input type="text" placeholder="Enter your mail" />
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
              <div class="footer__copyright__text">
                <p>
                  Copyright &copy;
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  All rights reserved by
                  <a href="" target="_blank">Ula Petshop</a>
                </p>
              </div>
              <div class="footer__copyright__payment">
                <img src="/frontend/img/payment-item.png" alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('frontend/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
  </body>
</html>
