@extends('layouts.frontend')
@section('title','Ula Petshop | Produk')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend/img/breadcrumb.jpg') }}">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <div class="breadcrumb__text">
              <h2>Produk</h2>

            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <div class="product__details__pic">
              <div class="product__details__pic__item">
                <img
                  class="product__details__pic__item--large"
                  src="{{ $product->gallery->first()->getUrl() }}"
                  alt="{{ $product->name }}"/>
              </div>
              <div class="product__details__pic__slider owl-carousel">
                @foreach($product->getMedia('gallery') as $gallery)
                <img
                  data-imgbigurl="{{ $gallery->getUrl() }}"
                  src="{{ $gallery->getUrl() }}"
                  alt=""
                />
                @endforeach

              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="product__details__text">
              <h3>{{ $product->name }}</h3>
              {{-- <div class="product__details__rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
                <span>(18 reviews)</span>
              </div> --}}
              <div class="product__details__price">Rp. {{ $product->price }}</div>
              <p>{{ $product->description }}</p>
              <div class="product__details__quantity">
                <div class="quantity">
                  <div class="pro-qty">
                    <input type="text" value="1" />
                  </div>
                </div>
              </div>
              <a href="{{ route('add_to_cart', $product->id) }}" class="primary-btn">ADD TO CART</a>
              {{-- <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a> --}}
              <ul>
                <li><b>Berat</b> <span>{{ $product->weight }} gram</span></li>
                {{-- <li>
                  <b>Share on</b>
                  <div class="share">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-pinterest"></i></a>
                  </div>
                </li> --}}
              </ul>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="product__details__tab">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a
                    class="nav-link active"
                    data-toggle="tab"
                    href="#tabs-1"
                    role="tab"
                    aria-selected="true"
                    >Deskripsi</a
                  >
                </li>
                {{-- <li class="nav-item">
                  <a
                    class="nav-link"
                    data-toggle="tab"
                    href="#tabs-3"
                    role="tab"
                    aria-selected="false"
                    >Reviews <span>(1)</span></a
                  >
                </li> --}}
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tabs-1" role="tabpanel">
                  <div class="product__details__tab__desc">
                    <h6>Informasi Produk</h6>
                    {{ $product->description }}
                  </div>
                </div>
                {{-- <div class="tab-pane" id="tabs-3" role="tabpanel">
                  <div class="product__details__tab__desc">
                    <h6>Products Infomation</h6>
                    <p></p>
                  </div>
                </div> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Product Details Section End -->


@endsection
@section('scripts')

<div class="container">

    @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
    @endif

    @yield('content')
</div>

@yield('scripts')

@endsection
