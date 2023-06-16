@extends('admin.layout.app')

@section('heading', 'Add Slide')

@section('right_top_button')
<a href="{{ route('admin_slide_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> View All</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_slide_store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Marketing Photo *</label>
                                    <div>
                                        <input type="file" name="photo" style="border-color: #E38B29; border-radius: 5px">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Unique Selling Proposition (USP) Headline</label>
                                    <input type="text" class="form-control" name="heading" value="{{ old('heading') }}" style="border-color: #E38B29; border-radius: 5px">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">USP Description</label>
                                    <textarea name="text" class="form-control h_100" cols="30" rows="10" style="border-color: #E38B29; border-radius: 5px">{{ old('text') }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Button Call to Action (CTA)</label>
                                    <input type="text" class="form-control" name="button_text" value="{{ old('button_text') }}" style="border-color: #E38B29; border-radius: 5px">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Button CTA URL</label>
                                    <input type="text" class="form-control" name="button_url" value="{{ old('button_url') }}" style="border-color: #E38B29; border-radius: 5px">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Submit</button>
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