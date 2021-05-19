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
                    @if ($errors->any())
                        <div class="alert alert-danger text-white">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin.category.update',$category->id) }}" method="POST">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $category->name }}">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option {{ $category->status == 1 ? 'selected':'' }} value="1">Active</option>
                                <option {{ $category->status == 0 ? 'selected':'' }}  value="0">In-Active</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Update  Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
