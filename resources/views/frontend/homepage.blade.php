@extends('layouts.frontend')
@section('title','Ula Petshop')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="mb-5">
      <div class="container">
          <div class="hero__item set-bg" data-setbg="{{ asset('frontend/img/hero/bannerula.jpg') }}">
              <div class="hero__text">
                  <span>ULA PETSHOP</span>
                  <h2>Nyaman, <br />Berkualitas <br>Tepat Waktu</h2>
                  <p>Jaga kesehatan hewan peliharaan anda</p>
                  <a href="/shop" class="primary-btn">Beli Sekarang</a>
              </div>
          </div>
      </div>
    </section>
      <!-- Breadcrumb Section End -->
    <br>
    <!-- Categories Section Begin -->
    <section class="categories">
      <div class="container">
        <div class="row">
          <div class="categories__slider owl-carousel">
            @foreach($menu_categories as $menu_category)
            <div class="col-lg-3">
                <div
                  class="categories__item set-bg"
                  data-setbg="{{ $menu_category->photo->getUrl() }}">
                  <h5><a href="{{ route('shop.index', $menu_category->slug) }}">{{ $menu_category->name }}</a></h5>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-title">
              <h2>Produk</h2>
            </div>
          </div>
        </div>
        <div class="row featured__filter">

        @foreach($products as $product)
          <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
            <div class="featured__item">
              <div class="featured__item__pic set-bg" data-setbg="{{ $product->gallery }}">
                <a href="{{ $product->getMedia('gallery')->first()->getUrl() }}" target="_blank">
                    <img src="{{ $product->getMedia('gallery')->first()->getUrl() }}" alt="">
                </a>
                <ul class="featured__item__pic__hover">
                    {{-- <li>
                        <a href="#"><i class="fa fa-heart"></i></a>
                    </li> --}}
                  <li>
                    <a href="/cart"><i class="fa fa-shopping-cart"></i></a>
                  </li>
                </ul>
              </div>
              <div class="featured__item__text">
                <h6><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h6>
                <h5>Rp.{{ $product->price }}</h5>
              </div>
            </div>
          </div>
          @endforeach

        </div>
      </div>
    </section>
    <!-- Featured Section End -->

    {{-- <!-- Banner Begin -->
    <div class="banner">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="banner__pic">
              <img src="{{ asset('frontend/img/banner/banner-1.jpg') }}" alt="" />
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="banner__pic">
              <img src="{{ asset('frontend/img/banner/banner-2.jpg') }}" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner End --> --}}
@endsection
