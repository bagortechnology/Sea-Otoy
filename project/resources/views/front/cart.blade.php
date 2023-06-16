@extends('front.layout.app')

@section('main_content')
<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>RESERVATION</h2>
            </div>
        </div>
    </div>
</div>
<div class="page-content">
    <div class="container">
        <div class="row cart">
            <div class="col-md-12">
                

                @if(session()->has('cart_room_id'))

                <div class="table-responsive">
                    <table class="table table-bordered table-cart">
                        <thead>
                            <tr>
                                <th></th>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Kubo Info</th>
                                <th>Price/Day</th>
                                <th>Checkin</th>
                                <th>Checkout</th>
                                <th>Guests</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php
                            $arr_cart_room_id = array();
                            $i=0;
                            foreach(session()->get('cart_room_id') as $value) {
                                $arr_cart_room_id[$i] = $value;
                                $i++;
                            }

                            $arr_cart_checkin_date = array();
                            $i=0;
                            foreach(session()->get('cart_checkin_date') as $value) {
                                $arr_cart_checkin_date[$i] = $value;
                                $i++;
                            }

                            $arr_cart_checkout_date = array();
                            $i=0;
                            foreach(session()->get('cart_checkout_date') as $value) {
                                $arr_cart_checkout_date[$i] = $value;
                                $i++;
                            }

                            $arr_cart_adult = array();
                            $i=0;
                            foreach(session()->get('cart_adult') as $value) {
                                $arr_cart_adult[$i] = $value;
                                $i++;
                            }

                            $arr_cart_children = array();
                            $i=0;
                            foreach(session()->get('cart_children') as $value) {
                                $arr_cart_children[$i] = $value;
                                $i++;
                            }

                            $total_price = 0;
                            for($i=0;$i<count($arr_cart_room_id);$i++)
                            {
                                $room_data = DB::table('rooms')->where('id',$arr_cart_room_id[$i])->first();
                                @endphp
                                <tr>
                                    <td>
                                        <a href="{{ route('cart_delete',$arr_cart_room_id[$i]) }}" class="cart-delete-link" onclick="return confirm('Are you sure?');"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                    <td>{{ $i+1 }}</td>
                                    <td><a href="{{route('room_detail', $room_data->id)}}" target="_blank"><img src="{{ asset('uploads/'.$room_data->featured_photo) }}" class="img-fluid rounded"></a></td>
                                    <td>
                                        <a href="{{ route('room_detail',$room_data->id) }}" class="room-name" target="_blank">{{ $room_data->name }}</a>
                                    </td>
                                    <td>₱{{ number_format($room_data->price, 2) }}</td>
                                    <td>{{ DateTime::createFromFormat('d/m/Y', $arr_cart_checkin_date[$i])->format('F d, Y') }}</td>
                                    <td>{{ DateTime::createFromFormat('d/m/Y', $arr_cart_checkout_date[$i])->format('F d, Y') }}</td>



                                    <td>
                                        Adult: {{ $arr_cart_adult[$i] }}<br>
                                        Children: {{ $arr_cart_children[$i] }}
                                    </td>
                                    <td>
                                    @php
                                        $d1 = explode('/',$arr_cart_checkin_date[$i]);
                                        $d2 = explode('/',$arr_cart_checkout_date[$i]);
                                        $d1_new = $d1[2].'-'.$d1[1].'-'.$d1[0];
                                        $d2_new = $d2[2].'-'.$d2[1].'-'.$d2[0];
                                        $t1 = strtotime($d1_new);
                                        $t2 = strtotime($d2_new);
                                        $diff = ($t2-$t1)/60/60/24;
                                       echo '₱' . number_format($room_data->price * $diff, 2);
                                    @endphp
                                    </td>
                                </tr>
                                @php
                                $total_price = $total_price+($room_data->price*$diff);
                            }
                            @endphp                            
                            <tr>
                                <td colspan="8" class="tar"><b>Total:</b></td>
                                <td><b>₱{{ number_format($total_price, 2) }}</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="checkout mb_20">
                    <a href="{{ route('checkout') }}" class="btn btn-primary bg-website" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">Checkout</a>
                </div>

                @else

                <div class="text-danger mb_30" style="min-height: 75vh">
                    <h5 class="text-center">Reservation page is EMPTY! Check available <a href="{{route('room')}}" style="text-decoration: none; text-decoration: underline;">kubo.</a></h5>
                </div>

                @endif

            </div>
        </div>
    </div>
</div>
@endsection