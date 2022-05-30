@extends('layouts.frontend')
@section('title','Keranjang Saya')
@section('content')
 <!-- Breadcrumb Section Begin -->
 <section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend/img/breadcrumb.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table id="cart" class="table table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th class="shoping__product">Produk</th>
                                    <th >Harga</th>
                                    <th >Jumlah</th>
                                    <th  class="text-center">Subtotal</th>
                                    <th ></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0 @endphp
                                @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                        @php $total += $details['price'] * $details['quantity'] @endphp
                                        <tr data-id="{{ $id }}">
                                            <td data-th="Product">
                                                <div class="row">
                                                    <div class="col-sm-9">
                                                        <h4 class="nomargin">{{ $details['name'] }}</h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-th="Price">Rp.{{ $details['price'] }}</td>
                                            <td data-th="Quantity">
                                                <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity cart_update" min="1" />
                                            </td>
                                            <td data-th="Subtotal" class="text-center">Rp.{{ $details['price'] * $details['quantity'] }}</td>
                                            <td class="actions" data-th="">
                                                <button class="btn btn-danger btn-sm cart_remove">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" class="text-right"><h3><strong>Total Rp.{{ $total }}</strong></h3></td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right">
                                        <a href="{{ url('/shop') }}"class="site-btn">Lanjutkan Belanja</a>
                                        <button href="{{ route('checkout.process') }}" class="site-btn">Checkout</button>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script type="text/javascript">

    $(".cart_update").change(function (e) {
        e.preventDefault();

        var ele = $(this);

        $.ajax({
            url: '{{ route('update_cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.parents("tr").attr("data-id"),
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });

    $(".cart_remove").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        if(confirm("Do you really want to remove?")) {
            $.ajax({
                url: '{{ route('remove_from_cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });

</script>
@endsection
