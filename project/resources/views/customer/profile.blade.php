@extends('customer.layout.app')

@section('heading', 'My Profile')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('customer_profile_submit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                @php
                                if(Auth::guard('customer')->user()->photo != '') {
                                    $customer_photo = Auth::guard('customer')->user()->photo;
                                } else {
                                    $customer_photo = 'default.png';
                                }
                                @endphp
                                <img src="{{ asset('uploads/'.$customer_photo) }}" alt="" class="profile-photo w_100_p">
                                <input type="file" class="form-control mt_10" name="photo" style="border-color: #fa8c7d; border-radius: 5px">
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label">Name *</label>
                                            <input type="text" class="form-control" name="name" value="{{ Auth::guard('customer')->user()->name }}" style="border-color: #fa8c7d; border-radius: 5px">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label">Email *</label>
                                            <input type="text" class="form-control" name="email" value="{{ Auth::guard('customer')->user()->email }}" style="border-color: #fa8c7d; border-radius: 5px">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label">Phone</label>
                                            <input type="text" class="form-control" name="phone" value="{{ Auth::guard('customer')->user()->phone }}" style="border-color: #fa8c7d; border-radius: 5px">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label">Country</label>
                                            <input type="text" class="form-control" name="country" value="{{ Auth::guard('customer')->user()->country }}" style="border-color: #fa8c7d; border-radius: 5px">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label">House No./Block/Street Address/Brgy</label>
                                            <input type="text" class="form-control" name="address" value="{{ Auth::guard('customer')->user()->address }}" style="border-color: #fa8c7d; border-radius: 5px">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label">Province</label>
                                            <input type="text" class="form-control" name="state" value="{{ Auth::guard('customer')->user()->state }}" style="border-color: #fa8c7d; border-radius: 5px">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label">Town/City</label>
                                            <input type="text" class="form-control" name="city" value="{{ Auth::guard('customer')->user()->city }}" style="border-color: #fa8c7d; border-radius: 5px">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label">Zip Code</label>
                                            <input type="text" class="form-control" name="zip" value="{{ Auth::guard('customer')->user()->zip }}" style="border-color: #fa8c7d; border-radius: 5px">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password" style="border-color: #fa8c7d; border-radius: 5px">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label">Retype Password</label>
                                            <input type="password" class="form-control" name="retype_password" style="border-color: #fa8c7d; border-radius: 5px">
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                                
                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection