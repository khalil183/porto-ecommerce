@extends('admin.layout.layout')
@section('admin-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Orders Details</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
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
            <br>
            <div class="row">
                <div class="col">
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
                </div>
            </div>

            @if ($order->status==0)
                <a href="{{ route('admin.order.accept',$order->id) }}" class="btn btn-success">Order Accept</a>
            @else
                <a href="{{ route('admin.order.cancel',$order->id) }}" class="btn btn-danger">Order Cancel</a>
            @endif



        </div>
    </div>


@endsection
