@extends('admin.layout.layout')
@section('admin-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><a href="{{ route('admin.category.index') }}" class="btn btn-primary"><i class="fa fa-list" aria-hidden="true"></i> All Category </a></h1>
    <!-- DataTales Example -->
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Category Form</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.category.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">In-Active</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Save Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
