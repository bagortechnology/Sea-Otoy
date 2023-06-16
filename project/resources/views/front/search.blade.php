@extends('front.layout.app')

@section('main_content')

<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Search Results</h2>
            </div>
        </div>
    </div>
</div>

<div class="home-rooms" style="background-color: #E38B29">
    <div class="container">
        <div class="row">
            @if($rooms->isEmpty())
                <div class="col-md-12">
                    <h3 class="text-center p-lg-4 text-white my-3 p-3" style="height: 75vh">No rooms available matching your search criteria. View available <a href="/room" class="text-white text-decoration-none text-decoration-underline">rooms.</a></h3>
                </div>
            @else
                @foreach($rooms as $item)
                    <div class="col-md-4">
                        <!-- Room card HTML code -->
                        <div class="inner">
                    <div class="photo">
                        <img src="{{ asset('uploads/'.$item->featured_photo) }}" alt="resort featured image" class="img-fluid rounded-top-2">
                    </div>
                    <div class="text">
                        <h2 class="lead fs-2"><a href="{{ route('room_detail',$item->id) }}">{{ $item->name }}</a></h2>
                        <div class="room-available">
                            <i class="bx bx-hotel"> {{ $item->total_rooms }} Rooms Available</i>
                        </div>
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
                            <i class="bx bx-money"> Price starts ₱{{ number_format($item->price, 2, '.', ',') }} per day</i>  
                        </div>
                        <div class="button">
                            <a href="{{ route('room_detail',$item->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i> View Details</a>
                        </div>
                    </div>
                </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

@endsection