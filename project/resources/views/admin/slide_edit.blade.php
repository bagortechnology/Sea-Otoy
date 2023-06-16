@extends('admin.layout.app')

@section('heading', 'Edit Slide')

@section('right_top_button')
<a href="{{ route('admin_slide_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> View All</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_slide_update',$slide_data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Existing Marketing Photo</label>
                                    <div>
                                        <img src="{{ asset('uploads/'.$slide_data->photo) }}" alt="" class="w_200">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Change Marketing Photo</label>
                                    <div>
                                        <input type="file" name="photo" style="border-color: #E38B29; border-radius: 5px">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Headline</label>
                                    <input type="text" class="form-control" name="heading" value="{{ $slide_data->heading }}" style="border-color: #E38B29; border-radius: 5px">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Short Description</label>
                                    <textarea name="text" class="form-control h_100" cols="30" rows="10" style="border-color: #E38B29; border-radius: 5px">{{ $slide_data->text }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Button Label</label>
                                    <input type="text" class="form-control" name="button_text" value="{{ $slide_data->button_text }}" style="border-color: #E38B29; border-radius: 5px">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Button URL</label>
                                    <input type="text" class="form-control" name="button_url" value="{{ $slide_data->button_url }}" style="border-color: #E38B29; border-radius: 5px">
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