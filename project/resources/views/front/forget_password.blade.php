@extends('front.layout.app')

@section('main_content')
<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $global_page_data->forget_password_heading }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">

                <form action="{{ route('customer_forget_password_submit') }}" method="post">
                    @csrf
                    <div class="login-form">
                        <div class="mb-3">
                            <label for="" class="form-label fw-bold text-secondary">Email Address</label>
                            <input type="text" class="form-control" name="email" style="border-color: #E38B29; border-radius: 5px" placeholder="Enter Your Email Address">
                            @if($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary bg-website w-100" style="border-radius: 5px; box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;">SUBMIT</button>
                        </div>
                        <a href="{{ route('customer_login') }}" class="primary-color" id="link"><i class="fa fa-arrow-left" aria-hidden="true"></i> <span class="text-decoration-underline">Back to Login Page</span> </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection