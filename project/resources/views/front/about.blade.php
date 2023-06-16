@extends('front.layout.app')

@section('main_content')
<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $about_data->about_heading }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content"  style="background-color: #FEFAE0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {!! $about_data->about_content !!}
            </div>
        </div>
    </div>
</div>
@endsection