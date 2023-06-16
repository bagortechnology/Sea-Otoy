@extends('admin.layout.app')

@section('heading', 'General Setting')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_setting_update',$setting_data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label">Existing Logo</label>
                                            <div>
                                                <img src="{{ asset('uploads/'.$setting_data->logo) }}" alt="" class="w_200">
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Change Logo</label>
                                            <div>
                                                <input type="file" name="logo" style="border-color: #fa8c7d; border-radius: 5px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label">Existing Favicon</label>
                                            <div>
                                                <img src="{{ asset('uploads/'.$setting_data->favicon) }}" alt="" class="w_50">
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Change Favicon</label>
                                            <div>
                                                <input type="file" name="favicon" style="border-color: #fa8c7d; border-radius: 5px">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Beach Address</label>
                                    <textarea name="footer_address" class="form-control h_100" cols="30" rows="10" style="border-color: #fa8c7d; border-radius: 5px">{{ $setting_data->footer_address }}</textarea>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Contact Number</label>
                                    <input type="text" class="form-control" name="footer_phone" value="{{ $setting_data->footer_phone }}" style="border-color: #fa8c7d; border-radius: 5px">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Email Address</label>
                                    <input type="text" class="form-control" name="footer_email" value="{{ $setting_data->footer_email }}" style="border-color: #fa8c7d; border-radius: 5px">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Copyright</label>
                                    <input type="text" class="form-control" name="copyright" value="{{ $setting_data->copyright }}" style="border-color: #fa8c7d; border-radius: 5px">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Facebook URL</label>
                                    <input type="text" class="form-control" name="facebook" value="{{ $setting_data->facebook }}" style="border-color: #fa8c7d; border-radius: 5px">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Google Analytics ID (GA4)</label>
                                    <input type="text" class="form-control" name="analytic_id" value="{{ $setting_data->analytic_id }}" style="border-color: #fa8c7d; border-radius: 5px">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Primary Theme Color</label>
                                    <input type="text" class="form-control" name="theme_color_1" value="{{ $setting_data->theme_color_1 }}" style="border-color: #fa8c7d; border-radius: 5px">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Secondary Theme Color</label>
                                    <input type="text" class="form-control" name="theme_color_2" value="{{ $setting_data->theme_color_2 }}" style="border-color: #fa8c7d; border-radius: 5px">
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