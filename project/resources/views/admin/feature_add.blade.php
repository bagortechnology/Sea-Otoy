@extends('admin.layout.app')

@section('heading', 'Add Feature')

@section('right_top_button')
<a href="{{ route('admin_feature_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> View All</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_feature_store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Icon *</label>
                                    <input type="text" class="form-control" name="icon" value="{{ old('icon') }}" style="border-color: #E38B29; border-radius: 5px">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Feature Heading*</label>
                                    <input type="text" class="form-control" name="heading" value="{{ old('heading') }}" style="border-color: #E38B29; border-radius: 5px">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Feature Description</label>
                                    <textarea name="text" class="form-control h_100" cols="30" rows="10" style="border-color: #E38B29; border-radius: 5px">{{ old('text') }}</textarea>
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