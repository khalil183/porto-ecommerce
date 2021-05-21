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
                <h2>Order Information</h2>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Order Id</th>
                            <th>Qty</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>{{ $item->amount }} Tk</td>
                            <td>{{ $item->date }}</td>
                            <td>
                                @if ($item->status==1)
                                    <span class="badge badge-success">Success</span>
                                @else
                                <span class="badge badge-danger">Pending</span>
                                @endif
                            </td>
                            <td><a href="{{ route('user.order.show',$item->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
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
                        <li><a href="{{ route('user.wishlist') }}">My Wishlist</a></li>
                        <li><a href="{{ route('logout') }}">User Logout</a></li>
                    </ul>
                </div><!-- End .widget -->
            </aside><!-- End .col-lg-3 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</main><!-- End .main -->

@endsection
