@extends('admin.layout.layout')
@section('admin-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Orders</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Order Table</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                            <td><a href="{{ route('admin.order.show',$item->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
