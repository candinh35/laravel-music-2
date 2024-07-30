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
                            <div class="sign-in-from w-100 pt-5 m-auto">
                                <h1 class="mb-3 text-center">Sign in</h1>
                                @if ($errors->any())
                                    <x-error-alert />
                                @elseif (session('success'))
                                    <x-success-alert />
                                @endif
                                <form class="mt-4 form-validate" method="post" action="{{ route('client.login.submit') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail2">Email address</label>
                                        <input type="email" name="email" class="form-control mb-0" id="email"
                                            placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword2">Password</label>
                                        <input type="password" name="password" class="form-control mb-0"
                                            id="exampleInputPassword2" placeholder="Password">
                                    </div>
                                    <div class="sign-info">
                                        <button type="submit" class="btn btn-primary mb-2">Sign in</button>
                                        <span class="dark-color d-block line-height-2">Don't have an account? <a
                                                href="sign-up.html">Sign up</a></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="mt-2">
                            <div class="d-flex justify-content-center links">
                                Don't have an account? <a href="{{ route('client.register') }}" class="ml-2">Sign Up</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sign in END -->
            <!-- color-customizer -->
        </div>
    </section>
@endsection
