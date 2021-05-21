@extends('admin.layout.layout')
@section('admin-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Review</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Review Table</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>User Email</th>
                            <th>Product</th>
                            <th>Rating</th>
                            <th>Review</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reviews as $key=> $item)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $item->user->email }}</td>
                            <td>
                                <a target="_blank" href="{{ route('product.details',$item->product->slug) }}"><img src="{{ url($item->product->image) }}" width="100px" alt="product image"></a>
                            </td>
                            <td>{{ $item->rating }} <i class="fa fa-star" aria-hidden="true"></i></td>
                            <td>{{ $item->review }}</td>
                            <td>

                                @if ($item->status==1)
                                    <span class="badge badge-success">Success</span>
                                @else
                                <span class="badge badge-danger">Pending</span>
                                @endif
                            </td>
                            <td>
                                @if ($item->status==1)
                                    <a href="{{ route('admin.review.deny',$item->id) }}" class="btn btn-danger btn-sm">Deny</a>
                                @else
                                    <a href="{{ route('admin.review.approve',$item->id) }}" class="btn btn-success btn-sm">Approve</a>
                                @endif


                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
