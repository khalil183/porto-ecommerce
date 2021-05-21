@extends('user.layouts.layout')
@section('user-content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">My Account</li>
            </ol>
        </div>
    </nav>

    <div class="container mb-5">
        <div class="row">
            <div class="col-lg-9 order-lg-last dashboard-content">
                <h2>Order Details</h2>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card text-left">
                          <div class="card-body">
                            <h5 class="card-title">Shipping Address</h5>
                            <p class="card-text">Name: {{ $order->shipping->name }}</p>
                            <p class="card-text">Phone: {{ $order->shipping->phone }}</p>
                            <p class="card-text">City: {{ $order->shipping->city }}</p>
                            <p class="card-text">ZipCode: {{ $order->shipping->zip_code }}</p>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card text-left">
                          <div class="card-body">
                            <h5 class="card-title">Billing Address</h5>
                            <p class="card-text">Name: {{ $order->user->name }}</p>
                            <p class="card-text">Email: {{ $order->user->email }}</p>
                            <p class="card-text">Total Amount: {{ $order->amount }}</p>
                            <p class="card-text">Status:
                                @if ($order->status==1)
                                <span class="badge badge-success">Success</span>
                                @else
                                <span class="badge badge-danger">Pending</span>
                                @endif
                            </p>
                          </div>
                        </div>
                    </div>

                </div>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->products as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>{{ $item->price * $item->qty }} Tk</td>
                            <td><img src="{{ url($item->image) }}" width="100px" alt=""></td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div><!-- End .col-lg-9 -->

            <aside class="sidebar col-lg-3">
                <div class="widget widget-dashboard">
                    <h3 class="widget-title">My Account</h3>

                    <ul class="list">
                        <li class="active"><a href="{{ route('user.profile') }}">Account Dashboard</a></li>
                        <li><a href="{{ route('user.order') }}">My Orders</a></li>
                        <li><a href="#">My Wishlist</a></li>
                        <li><a href="{{ route('logout') }}">User Logout</a></li>
                    </ul>
                </div><!-- End .widget -->
            </aside><!-- End .col-lg-3 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</main><!-- End .main -->

@endsection
