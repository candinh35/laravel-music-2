@extends('client.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="iq-card">
                <div class="iq-card-body p-0">
                    <div class="iq-edit-list">
                        <ul class="iq-edit-profile d-flex nav nav-pills">
                            <li class="col-md-4 p-0">
                                <a class="nav-link active" data-toggle="pill" href="#personal-information">
                                    Personal Information
                                </a>
                            </li>
                            <li class="col-md-4 p-0">
                                <a class="nav-link" data-toggle="pill" href="#chang-pwd">
                                    Change Password
                                </a>
                            </li>
                            <li class="col-md-4 p-0">
                                <a class="nav-link" data-toggle="pill" href="#buy-coin">
                                    Recharge Money
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            @if ($errors->any())
                <x-error-alert />
            @elseif (session('success'))
                <x-success-alert />
            @endif
        </div>
        <div class="col-lg-12">
            <div class="iq-edit-list-data">
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Personal Information</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <form class="form-validate" action="{{ route('client.profile.update') }}" method="post">
                                    @csrf
                                    <div class=" row align-items-center">
                                        <div class="form-group col-sm-6">
                                            <label for="fname">Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name" id="fname"
                                                value="{{ isset($user->name) ? $user->name : '' }}">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="lname">Email</label>
                                            <input disabled class="form-control" name="email" id="lname"
                                                value="{{ isset($user->email) ? $user->email : '' }}">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="uname">Phone number</label>
                                            <input type="text" class="form-control" id="uname" name="phonenumber"
                                                value="{{ isset($user->phonenumber) ? $user->phonenumber : '' }}">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="uname">My wallet</label>
                                            <input disabled type="text" class="form-control" id="uname"
                                                value="{{ $user->wallet }} VND">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button type="reset" class="btn iq-bg-danger">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Change Password</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <form class="form-validate" action="{{ route('client.password.update') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="cpass">Current Password <span class="text-danger">*</span></label>
                                        <input type="Password" class="form-control" name="old_password" id="cpass"
                                            value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="npass">New Password <span class="text-danger">*</span></label>
                                        <input type="Password" name="password" class="form-control" id="password"
                                            value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="vpass">Verify Password <span class="text-danger">*</span></label>
                                        <input type="Password" name="confirm_password" class="form-control" id="vpass"
                                            value="">
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button type="reset" class="btn iq-bg-danger">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="buy-coin" role="tabpanel">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Recharge Money</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <form action="{{ route('vnpay.payment') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="uname">My wallet</label>
                                        <input disabled type="text" class="form-control" id="uname"
                                            value="{{ $user->wallet }} VND">
                                    </div>
                                    <div class="form-group">
                                        <label for="npass">Money <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control number-format" id="npass"
                                            name="money" value="" placeholder="Enter money">
                                    </div>
                                    <input type="hidden" class="form-control" id="" name="redirect">
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <button type="reset" class="btn iq-bg-danger">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
