@extends('front.layout.app')

@section('main_content')
<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $global_page_data->signin_heading }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container  vh-100">
        <div class="row justify-content-center">
            <div class="col-md-4">

                <form action="{{ route('customer_login_submit') }}" method="post">
                    @csrf
                    <div class="login-form">
                        <div class="mb-3">
                            <label for="" class="form-label fw-bold text-secondary">Email Address</label>
                            <input type="text" class="form-control" name="email" style=" color: gray; border-color: #fa8c7d; border-radius: 15px" placeholder="Enter your email">
                            @if($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-bold text-secondary">Password</label>
                            <input type="password" class="form-control" name="password" style=" color: gray; border-color: #fa8c7d; border-radius: 15px" placeholder="Enter your password">
                            @if($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary bg-website w-100" style="border-radius: 15px; box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;">LOGIN</button>
                            
                        </div>
                        <a href="{{ route('customer_forget_password') }}" class="primary-color text-center d-flex mb-2 text-decoration-underline" id="link">Forgot Password?</a>
                        <div class="mb-3">
                            <a href="{{ route('customer_signup') }}" class="primary-color" id="link"><span style="color: gray">Not yet a member? </span> <b class ="text-decoration-underline"> Create an account</b></a>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>
@endsection