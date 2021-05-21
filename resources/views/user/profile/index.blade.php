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
                <h2>Edit Account Information</h2>
                @if ($errors->any())
                <div class="alert alert-danger text-white">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <form action="{{ route('user.update.profile') }}" method="POST">
                    @csrf
                    <div class="form-group required-field">
                        <label for="acc-name">Name</label>
                        <input type="text" class="form-control" id="acc-name" name="name" value="{{ $user->name }}" >
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div><!-- End .form-group -->


                    <div class="form-group required-field">
                        <label for="acc-email">Email</label>
                        <input type="email" class="form-control" id="acc-email" name="email" required value="{{ $user->email }}" readonly>
                    </div><!-- End .form-group -->

                    <div class="form-group required-field">
                        <label for="acc-password">Old Password</label>
                        <input type="password" class="form-control" id="acc-password" name="old_password">
                        <span class="text-danger">{{ $errors->first('old_password') }}</span>
                    </div><!-- End .form-group -->

                    <div class="mb-2"></div><!-- margin -->

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="change-pass-checkbox" value="1">
                        <label class="custom-control-label" for="change-pass-checkbox">Change Password</label>
                    </div><!-- End .custom-checkbox -->

                    <div id="account-chage-pass">
                        <h3 class="mb-2">Change Password</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group required-field">
                                    <label for="acc-pass2">New Password</label>
                                    <input type="password" class="form-control" id="acc-pass2" name="password">
                                </div><!-- End .form-group -->
                            </div><!-- End .col-md-6 -->

                            <div class="col-md-6">
                                <div class="form-group required-field">
                                    <label for="acc-pass3">Confirm Password</label>
                                    <input type="password" class="form-control" id="acc-pass3" name="password_confirmation">
                                </div><!-- End .form-group -->
                            </div><!-- End .col-md-6 -->
                        </div><!-- End .row -->
                    </div><!-- End #account-chage-pass -->

                    <div class="required text-right">* Required Field</div>
                    <div class="form-footer">
                        <a href="#"><i class="icon-angle-double-left"></i>Back</a>

                        <div class="form-footer-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div><!-- End .form-footer -->
                </form>
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
