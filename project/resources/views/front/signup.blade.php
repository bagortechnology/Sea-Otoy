@extends('front.layout.app')

@section('main_content')
<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $global_page_data->signup_heading }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container vh-100">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form action="{{ route('customer_signup_submit') }}" method="post">
                    @csrf
                    <div class="login-form">
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold text-secondary">Full Name</label>
                            <input type="text" class="form-control" name="name" style=" color: gray; border-color: #fa8c7d; border-radius: 15px" placeholder="Enter Your Full Name">
                            @if($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-bold text-secondary">Email Address</label>
                            <input type="text" class="form-control" name="email" style="border-color: #fa8c7d; border-radius: 15px" placeholder="Enter Your Email Address">
                            @if($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-bold text-secondary">Password</label>
                            <input type="password" class="form-control" name="password" style="border-color: #fa8c7d; border-radius: 15px" placeholder="Enter A Strong Password">
                            <div class="small p-2" style="color: gray">Password must be at least 8 character long, combination of letters, numbers, special characters.</div>
                            @if($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-bold text-secondary">Retype Password</label>
                            <input type="password" class="form-control" name="retype_password" style="border-color: #fa8c7d; border-radius: 15px" placeholder="Retype your password">
                            @if($errors->has('retype_password'))
                                <span class="text-danger">{{ $errors->first('retype_password') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary bg-website w-100" style="border-radius: 15px; box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;">SUBMIT</button>
                        </div>
                        <div class="mb-3 text-center">
                            <a href="{{ route('customer_login') }}" class="primary-color" id="link"><span style="color: gray">Already a member?</span> <b class="text-decoration-underline">Login Now</b> </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection