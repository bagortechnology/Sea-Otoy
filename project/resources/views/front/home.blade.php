@extends('front.layout.app')

@section('main_content')
<div class="slider">
    <div class="slide-carousel owl-carousel">
        @foreach($slide_all as $item)
        <div class="item" style="background-image:url({{ asset('uploads/'.$item->photo) }});">
            <div class="bg"></div>
            <div class="text">
                <h2>{{ $item->heading }}</h2>
                <p>
                    {!! $item->text !!}
                </p>
                @if($item->button_text != '')
                <div class="button">
                    <a href="{{ $item->button_url }}">{{ $item->button_text }}</a>
                </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>


<div class="search-section">
    <div class="container">
        <form action="{{ route('search') }}" method="GET">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="checkin_checkout" style="font-family: Arial, Helvetica, sans-serif">Arrival &amp; Departure</label>
                            <input type="text" id="checkin_checkout" name="checkin_checkout" class="form-control daterange1" placeholder="Select Dates" style="border-color: #fa8c7d" required>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="adult" style="font-family: Arial, Helvetica, sans-serif" >Adults <span class="small">(13 years old and up)</span></label>
                            <input type="number" id="adult" name="adult" class="form-control" min="1" max="4" placeholder="No. of Adults (Guest)" style="border-color: #fa8c7d" required>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="children" style="font-family: Arial, Helvetica, sans-serif">Children <span class="small">(5 to 13 years old)</span></label>
                            <input type="number" id="children" name="children" class="form-control" min="0" max="3" placeholder="No. of Children (Guest)" style="border-color: #fa8c7d" required>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <a href="{{route('search')}}"><button type="submit" class="btn btn-primary mt-4" style="font-family: Arial, Helvetica, sans-serif"> Check Availability</button></a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="container border-success mt-5" style="border-color: black">
<div class="text-center">
    <h2 class="text-center mt-5 mb-3 fw-bold fs-1" style="font-family: Arial, Helvetica, sans-serif">
        Sea Otoy's Beach House Resort
    </h2>
    <p class="text-center my-3 px-lg-5 px-md-2 lead" style="font-family: Arial, Helvetica, sans-serif">
        Sea Otoy Beach House is a resort located in Sitio Biga, Brgy. Hugom, San Juan, Batangas, Philippines. It was founded just recently by the Sulit Family in the year 2022. It is part of a secluded beach town with a bunch of other resorts along the way. Away from the noise and pollution of the city, guests can experience the soothing effect of the beach waves hitting the shore or view the coppery colour of the sunset.
    </p>
    <p class="text-center my-3 px-lg-5 px-md-2 lead" style="font-family: Arial, Helvetica, sans-serif">
        Guest are also welcome to try the variety of water activities our resort is offering to its patriots. Discover the therapeutic touches of the local masseuses, kneading wonders on your aching joints and muscles. Enjoy the bliss of our Island with us!
    </p>
</div>

@if($global_setting_data->home_feature_status == 'Show')
<div class="home-feature mt-3">
    <div class="container">
        <div class="row">
            
            @foreach($feature_all as $item)
            <div class="col-md-4 my-3">
                <div class="inner">
                    <div class="icon"><i class = '{{ $item->icon }}'></i></div>
                    <div class="text">
                        <h2>{{ $item->heading }}</h2>
                        <p>
                            {!! $item->text !!}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
</div>

@if($global_setting_data->home_latest_post_status == 'Show')
<div class="blog-item mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="main-header">A Great Adventure Start With Us</h2><hr>
            </div>
        </div>
        <div class="row">

            @foreach($post_all as $item)
            @if($loop->iteration>$global_setting_data->home_latest_post_total) 
            @break
            @endif
            <div class="col-md-6">
                <div class="inner">
                    <div class="photo">
                        <img src="{{ asset('uploads/'.$item->photo) }}" alt="blog featured image" class="img-fluid rounded">
                    </div>
                    <div class="text">
                        <h2><a class="text-uppercase" href="{{ route('post',$item->id) }}" style="font-family: Arial, Helvetica, sans-serif">{{ $item->heading }}</a></h2>
                        <div class="button">
                            <a href="{{ route('post',$item->id) }}" class="btn btn-primary text-white">More Info</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif

@if($global_setting_data->home_room_status == 'Show')
<div class="home-rooms">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="main-header">Nipa Huts</h2>
            </div>
        </div>
        <div class="row">
            @foreach($room_all as $item)
            @if($loop->iteration>$global_setting_data->home_room_total) 
            @break
            @endif
            <div class="col-md-4">
                <div class="inner">
                    <div class="photo">
                        <img src="{{ asset('uploads/'.$item->featured_photo) }}" alt="resort featured image" class="img-fluid rounded-top-2">
                    </div>
                    <div class="text">
                        <h2><a href="{{ route('room_detail',$item->id) }}">{{ $item->name }}</a></h2>
                        <div class="room-size">
                            <i class="bx bx-area"> {{ $item->size }}</i>
                        </div>
                        <div class="room-guest">
                            <i class="bx bx-group"> Good for {{ $item->total_guests }}  people</i>
                        </div>
                        <div class="bed">
                            <i class="bx bx-bed"> {{ $item->total_beds }}</i>
                        </div>
                        <div class="price lead">
                            <i class="bx bx-money"> ₱{{ number_format($item->price, 2, '.', ',') }}/day</i>  
                        </div>
                        <div class="button">
                            <a href="{{ route('room_detail',$item->id) }}" class="btn btn-primary text-white"><i class="fa fa-eye"></i> View Details</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="big-button">
                    <a href="{{ route('room') }}" class="btn btn-primary">See All Nipa Huts</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@if($errors->any())
    @foreach($errors->all() as $error)
        <script>
            iziToast.error({
                title: '',
                position: 'center',
                message: '{{ $error }}',
            });
        </script>
    @endforeach
@endif

@endsection