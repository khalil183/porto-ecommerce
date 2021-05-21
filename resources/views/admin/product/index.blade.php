@extends('admin.layout.layout')
@section('admin-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><a href="{{ route('admin.product.create') }}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> New Product </a></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Product Table</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key=> $item)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ $item->price }} Tk</td>
                                <td><img src="{{ url($item->image) }}" alt="product image" width="80px"></td>
                                <td>
                                    @if ($item->status)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                    <span class="badge badge-danger">In-Active</span>
                                    @endif
                                </td>
                                <td>
                                    <a data-toggle="modal" data-target="#deleteModal" href="#" onclick="deleteData({{ $item->id }})" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    <a href="{{ route('admin.product.edit',$item->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <a target="_blank" href="{{ route('product.details',$item->slug) }}" class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>


                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function deleteData(id){
            $("#deleteForm").attr("action",'{{ url("admin/product/") }}'+"/"+id)
        }
    </script>
@endsection
