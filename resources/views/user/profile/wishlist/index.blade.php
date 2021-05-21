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
                <h2>Wishlists Table</h2>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($wishlists as $key=> $item)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $item->product->name }}</td>
                            <td><img src="{{ url($item->product->image) }}" alt="product Image" width="100px"></td>
                            <td>
                                <a href="{{ route('product.details',$item->product->slug) }}" class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a href="{{ route('user.wishlist.destroy',$item->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>

                            </td>
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
