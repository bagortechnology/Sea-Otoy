@extends('front.layout.app')

@section('main_content')
<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $global_page_data->reset_password_heading }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4">

                <form action="{{ route('customer_reset_password_submit') }}" method="post">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="hidden" name="email" value="{{ $email }}">
                    <div class="login-form">
                        <div class="mb-3">
                            <label for="" class="form-label fw-bold text-secondary">Password</label>
                            <input type="password" class="form-control" name="password" style="border-color: #E38B29; border-radius: 5px" placeholder="Enter A Strong Password">
                            <div class="small p-2" style="color: gray">Password must be at least 8 character long, combination of letters, numbers, special characters.</div>
                            @if($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-bold text-secondary">Confirm Password</label>
                            <input type="password" class="form-control" name="retype_password" style="border-color: #E38B29; border-radius: 5px" placeholder="Retype your password">
                            @if($errors->has('retype_password'))
                                <span class="text-danger">{{ $errors->first('retype_password') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary bg-website">Update</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection