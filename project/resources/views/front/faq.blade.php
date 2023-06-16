@extends('front.layout.app')

@section('main_content')
<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $global_page_data->faq_heading }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <h3 class="display-4 lead fw-semibold" style="font-family: 'Segoe UI', Arial, sans-serif">Have booking questions?</h3>
        <h4 class="display-4 lead">We have answers.</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="accordion" id="faq">
                    @php
                    $i=0;
                    @endphp
                    @foreach($faq_all as $item)
                    @php
                    $i++;
                    @endphp
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{ $i }}" style="font-family: 'Segoe UI', Arial, sans-serif">
                        <button class="accordion-button @if($i!=1) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $i }}" aria-expanded="@if($i==1) true @else false @endif" aria-controls="collapse{{ $i }}">
                            {{ $item->question }}
                        </button>
                        </h2>
                        <div id="collapse{{ $i }}" class="accordion-collapse collapse @if($i==1) show @endif" aria-labelledby="heading{{ $i }}" data-bs-parent="#faq">
                            <div class="accordion-body">
                                {!! $item->answer !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection