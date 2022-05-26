@extends('layouts.frontend')
@section('title','Ula Petshop | Pemesanan')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend/img/breadcrumb.jpg') }}">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <div class="breadcrumb__text">
              <h2>Checkout</h2>
              <div class="breadcrumb__option">
                <a href="/home">Home</a>
                <span>Checkout</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
      <div class="container">
        <div class="checkout__form">
          <h4>Form Pemesanan</h4>
          <form action="#">
            <div class="row">
              <div class="col-lg-8 col-md-6">
                  <div class="checkout__input">
                    <p>Nama Lengkap<span>*</span></p>
                    <input
                      type="text"
                      class="checkout__input__add"
                      placeholder="Nama Lengkap"
                    />
                  </div>
                <div class="checkout__input">
                  <p>Alamat Lengkap<span>*</span></p>
                  <input
                    type="text"
                    class="checkout__input__add"
                    placeholder="Alamat Lengkap"
                  />
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="checkout__input">
                      <p>Nomor Telepon<span>*</span></p>
                      <input type="text"
                      placeholder="Nomor Telepon"
                      />
                    </div>
                  </div>

                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="checkout__order">
                  <h4>Pesanan Kamu</h4>
                  <div class="checkout__order__products">
                    Produk <span>Total</span>
                  </div>
                  <ul>
                    <li>Baju Kucing <span>$75.99</span></li>
                    <li>Tempat Makan Kucing <span>$151.99</span></li>
                    <li>Makanan Kucing Rasa Pisang <span>$53.99</span></li>
                  </ul>
                  <div class="checkout__order__subtotal">
                    Subtotal <span>$750.99</span>
                  </div>
                  <div class="checkout__order__total">
                    Total <span>$750.99</span>
                  </div>
                  <!-- <div class="checkout__input__checkbox">
                    <label for="payment">
                      Check Payment
                      <input type="checkbox" id="payment" />
                      <span class="checkmark"></span>
                    </label>
                  </div>
                  <div class="checkout__input__checkbox">
                    <label for="paypal">
                      Paypal
                      <input type="checkbox" id="paypal" />
                      <span class="checkmark"></span>
                    </label>
                  </div> -->
                  <button type="submit" class="site-btn">Pesan Sekarang</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
    <!-- Checkout Section End -->
@endsection
