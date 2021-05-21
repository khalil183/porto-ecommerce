@extends('user.layouts.layout')
@section('user-content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
            </ol>
        </div>
    </nav>

    <div class="container mb-6">
        <div class="row">
            <div class="col-lg-8">
                <div class="cart-table-container">
                <form action="{{ route('update.cart') }}" method="POST">
                    @csrf
                    <table class="table table-cart">
                        <thead>
                            <tr>
                                <th class="product-col">Product</th>
                                <th class="price-col">Price</th>
                                <th class="qty-col">Qty</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contents as $key=> $item)
                                <tr class="product-row">
                                    <td class="product-col">
                                        <figure class="product-image-container">
                                            <a href="#" class="product-image">
                                                <img src="{{ url($item->options->image) }}" alt="product">
                                            </a>
                                        </figure>
                                        <h2 class="#">
                                            <a href="product.html">{{ $item->name }}</a>
                                        </h2>
                                    </td>
                                    <td>{{ $item->price }}Tk</td>
                                    <td>
                                        <input name="qty[]" class="vertical-quantity form-control" type="text" value="{{ $item->qty }}">

                                        <input type="hidden" name="rowId[]" value="{{ $item->rowId }}">

                                    </td>
                                    <td>{{ $item->qty * $item->price }} Tk</td>
                                </tr>
                                <tr class="product-action-row">
                                    <td colspan="4" class="clearfix">
                                        <div class="float-left">
                                            <a href="{{ route('destroy.cart.item',$item->rowId) }}" class="btn-move">Move to Cart</a>
                                        </div><!-- End .float-left -->
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                        <tfoot>
                            <tr>
                                <td colspan="4" class="clearfix">
                                    <div class="float-left">
                                        <a href="{{ url('/') }}" class="btn btn-outline-secondary">Continue Shopping</a>
                                    </div><!-- End .float-left -->

                                    <div class="float-right">
                                        <a href="{{ route('destroy.cart') }}" class="btn btn-outline-secondary btn-clear-cart">Clear Shopping Cart</a>
                                        <button type="submit" class="btn btn-outline-secondary btn-update-cart">Update Shopping Cart</button>
                                    </div><!-- End .float-right -->
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
                </div><!-- End .cart-table-container -->
            </div><!-- End .col-lg-8 -->

            <div class="col-lg-4">
                <div class="cart-summary">
                    <h3>Summary</h3>
                    <table class="table table-totals">
                        <tbody>
                            <tr>
                                <td>Subtotal</td>
                                <td>{{ Cart::priceTotal() }} Tk</td>
                            </tr>

                            <tr>
                                <td>Tax</td>
                                <td>0.00 tk</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Order Total</td>
                                <td>{{ Cart::priceTotal() }}</td>
                            </tr>
                        </tfoot>
                    </table>

                    <div class="checkout-methods">
                        <a href="{{ route('checkout') }}" class="btn btn-block btn-sm btn-primary">Go to Checkout</a>
                        <a href="#" class="btn btn-link btn-block">Check Out with Multiple Addresses</a>
                    </div><!-- End .checkout-methods -->
                </div><!-- End .cart-summary -->
            </div><!-- End .col-lg-4 -->
        </div><!-- End .row -->
    </div><!-- End .container -->		</main><!-- End .main -->
@endsection
