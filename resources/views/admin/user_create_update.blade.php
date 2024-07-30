@extends('admin.layout')

@section('content')
    <!-- add-category view -->
    <div class="iq-card-header d-flex justify-content-between">
        <div class="iq-header-title">
            <h4 class="card-title">{{ isset($user) ? 'Edit User' : 'Add User' }}</h4>
        </div>
    </div>
    <div class="iq-card-body">
        @if ($errors->any())
            <x-error-alert />
        @elseif (session('success'))
            <x-success-alert />
        @endif
        <form class="form-validate" method="post" action="{{ $action }}">
            @isset($user)
                @method('PUT')
            @endisset
            @csrf
            <div class=" row align-items-center">
                <div class="form-group col-sm-6">
                    <label for="fname">Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" id="fname"
                        value="{{ isset($user->name) ? $user->name : '' }}">
                </div>
                <div class="form-group col-sm-6">
                    <label for="lname">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" id="lname" value="{{ isset($user->email) ? $user->email : '' }}">
                </div>
                <div class="form-group col-sm-6">
                    <label for="uname">Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="uname" name="password" value="">
                </div>
                <div class="form-group col-sm-6">
                    <label for="uname">Phone number</label>
                    <input type="text" class="form-control" id="uname" name="phonenumber"
                        value="{{ isset($user->phonenumber) ? $user->phonenumber : '' }}">
                </div>
                <div class="form-group col-sm-6">
                    <label for="uname">Wallet</label>
                    <input type="text" class="form-control number-format" id="uname" name="wallet"
                        value="{{ isset($user->wallet) ? $user->wallet : 0 }}">
                </div>
                @if ($user->role != ADMIN_ROLE )
                    <div class="form-group col-sm-6">
                        <label for="exampleFormControlSelect1">Role</label>
                        <select class="form-control" name="role" id="exampleFormControlSelect1">
                            <option value="{{ USER_ROLE }}">User</option>
                            <option value="{{ ADMIN_ROLE }}">Admin</option>
                        </select>
                    </div>
                @endif
            </div>
            <div class="form-group d-flex justify-content-between">
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
                <a href="{{ route('users.index') }}" class="text-white btn btn-secondary">Cancel</a>
            </div>

        </form>
    </div>
    <!-- /add-category view -->
@endsection
