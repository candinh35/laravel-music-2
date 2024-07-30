@extends('client.layout_account')

@section('content')
    <!-- Sign in Start -->
    <section class="sign-in-page">
        <div class="container">
            <div class="row justify-content-center align-items-center height-self-center">
                <div class="col-md-6 col-sm-12 col-12 align-self-center">
                    <div class="sign-user_card ">
                        <div class="d-flex justify-content-center">
                            <div class="sign-user_logo">
                                <img src="{{ asset('images/logo.png') }}" class=" img-fluid" alt="Logo">
                            </div>
                        </div>
                        <div class="sign-in-page-data">
                            <div class="sign-in-from w-100 m-auto pt-5">
                                <h1 class="mb-3 text-center">Sign Up</h1>
                                @if ($errors->any())
                                    <x-error-alert />
                                @endif
                                <form class="mt-4 form-validate" method="post"
                                    action="{{ route('client.register.submit') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Your Full Name</label>
                                        <input type="text" name="name" class="form-control mb-0" id="name"
                                            placeholder="Your Full Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" name="email" class="form-control mb-0" id="email"
                                            placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="phonenumber">Phone number</label>
                                        <input type="text" name="phonenumber" class="form-control mb-0" id="phonenumber"
                                            placeholder="Enter phone number">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control mb-0" id="password"
                                            placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm_password">Repeat Password</label>
                                        <input type="password" name="confirm_password"class="form-control mb-0"
                                            id="confirm_password" placeholder="Confirm Password">
                                    </div>
                                    <div class="sign-info mt-3">
                                        <button type="submit" class="btn btn-primary mb-2">Sign Up</button>
                                    </div>
                                </form>
                            </div>
                            <div class="mt-2">
                                <div class="d-flex justify-content-center links">
                                    Already have an account ? <a href="{{ route('client.login') }}" class="ml-2">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Sign in END -->
@endsection
