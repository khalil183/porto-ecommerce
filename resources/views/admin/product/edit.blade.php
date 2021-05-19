@extends('admin.layout.layout')
@section('admin-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><a href="{{ route('admin.product.index') }}" class="btn btn-primary"><i class="fa fa-list" aria-hidden="true"></i> All Product </a></h1>
    <!-- DataTales Example -->
    <div class="row">
        <div class="col-md-10">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Product Form</h6>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger text-white">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin.product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Product Name" value="{{ $product->name }}">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" name="price" id="price" placeholder="Price" value="{{ $product->price }}">
                        </div>

                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category" id="category" class="form-control">
                                <option value="">Select Cateogry</option>
                                @foreach ($categories as $item)
                                    <option {{ $item->id==$product->category_id ? 'selected' :'' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" name="image" id="image">
                            <input type="hidden" name="old_image" value="{{ $product->image }}">
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option {{ $product->status==1 ? 'selected':'' }} value="1">Active</option>
                                <option {{ $product->status==0 ? 'selected':'' }} value="0">In-Active</option>
                            </select>
                        </div>


                        <button type="submit" class="btn btn-success">Save Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
