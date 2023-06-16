@extends('front.layout.app')

@section('main_content')
<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $single_room_data->name }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content room-detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-12 left">

                <div class="room-detail-carousel owl-carousel">
                    <div class="item" style="background-image:url({{ asset('uploads/'.$single_room_data->featured_photo) }}); border-radius: 10px">
                        <div class="bg"></div>
                    </div>
                    
                    @foreach($single_room_data->rRoomPhoto as $item)
                    <div class="item" style="background-image:url({{ asset('uploads/'.$item->photo) }}); border-radius: 10px">
                        <div class="bg"></div>
                    </div>
                    @endforeach

                </div>
                
                <div class="amenity">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 style="font-family: Arial, Helvetica, sans-serif">Amenities</h2>
                        </div>
                    </div>
                    <div class="row">
                        @php
                        $arr = explode(',',$single_room_data->amenities);
                        for($j=0;$j<count($arr);$j++) {
                            $temp_row = \App\Models\Amenity::where('id',$arr[$j])->first();
                            echo '<div class="col-lg-6 col-md-12" >';
                            echo '<div class="mb-3 p-3" style="background-color: #fa8c7d; box-shadow: rgba(9, 30, 66, 0.25) 0px 1px 1px, rgba(9, 30, 66, 0.13) 0px 0px 1px 1px; border-radius: 10px"><i class="fa fa-check-circle text-dark"></i> '.$temp_row->name.'</div>';
                            echo '</div>';
                        }
                        @endphp
                    </div>
                </div>
                
                <div class="description">
                    <h3>Room Description</h3>
                    {!! $single_room_data->description !!}
                </div>



                <div class="feature">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Features</h2>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive table-striped-columns" style="border-radius: 15px; background-color: white">
                            <tr>
                                <th>Room Size</th>
                                <td>{{ $single_room_data->size }}</td>
                            </tr>
                            <tr>
                                <th>Number of Beds</th>
                                <td>{{ $single_room_data->total_beds }}</td>
                            </tr>
                            <tr>
                                <th>Number of Bathrooms</th>
                                <td>{{ $single_room_data->total_bathrooms }}</td>
                            </tr>
                            <tr>
                                <th>Number of Guest</th>
                                <td>Good for {{ $single_room_data->total_guests }} persons.</td>
                            </tr>
                        </table>
                    </div>
                </div>

                @if($single_room_data->video_id != '')
                <div class="video">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $single_room_data->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                @endif


            </div>
            <div class="col-lg-4 col-md-5 col-sm-12 right">

                <div class="sidebar-container" id="sticky_sidebar">

                    <div class="widget" style="background-color: white; box-shadow: rgba(9, 30, 66, 0.25) 0px 1px 1px, rgba(9, 30, 66, 0.13) 0px 0px 1px 1px; border-radius: 15px">
                        <h2>Room Price per Day</h2>
                        <div class="price">
                            ₱{{ number_format($single_room_data->price, 2, '.', ',') }}
                        </div>
                    </div>
                    <div class="widget" style=" background-color: white; box-shadow: rgba(9, 30, 66, 0.25) 0px 1px 1px, rgba(9, 30, 66, 0.13) 0px 0px 1px 1px; border-radius: 15px">
                        <h2>Book This Room </h2>
                        <form action="{{ route('cart_submit') }}" method="post">
                            @csrf
                            <input type="hidden" name="room_id" value="{{ $single_room_data->id }}">
                            <div class="form-group mb_20">
                                <label for="">Check in & Check out</label>
                                <input type="text" name="checkin_checkout" class="form-control daterange1" placeholder="Checkin & Checkout" style="border-color: #fa8c7d" required>
                            </div>
                                <div class="form-group mb_20">
                                    <label for="adult">Adult (13 years old and up)</label>
                                    <input type="number" name="adult" id="adult" class="form-control" min="1" max="4" placeholder="No. of Adults (Guest)"style="border-color: #fa8c7d" required>
                                </div>
                                <div class="form-group mb_20">
                                    <label for="children">Children (below 12 years old)</label>
                                    <input type="number" name="children" id="children" class="form-control" min="0" max="3" placeholder="No. of Children (Guest)" style="border-color: #fa8c7d" required>
                                </div>
                                <div class="small">*The room is good for <b>{{ $single_room_data->total_guests }}</b> persons only. </div>
                            <button type="submit" class="book-now" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">Add to Bookings</button>
                        </form>
                    </div>

                </div>


            </div>
        </div>
    </div>
</div>

@if($errors->any())
    @foreach($errors->all() as $error)
        <script>
            iziToast.error({
                title: '',
                position: 'topRight',
                message: '{{ $error }}',
            });
        </script>
    @endforeach
@endif

@endsection