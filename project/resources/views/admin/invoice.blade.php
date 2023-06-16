@extends('admin.layout.app')

@section('heading', 'Booking Invoice')

@section('main_content')
<div class="section-body">
    <div class="invoice">
        <div class="invoice-print">
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice-title">
                        <div class="d-flex align-items-center justify-content-between">
                            <img src="{{ asset('uploads/'.$global_setting_data->favicon) }}" alt="logo" class="img-fluid" style="height: 80px; width: 80px">
                            <h2 class="text-center fs-2 text-uppercase" style="font-family: 'Arial', san-serif;">Booking Invoice</h2>
                            <h2 class="text-center align-items-center fs-2 d-flex justify-content-center barcode">
                              {!! DNS2D::getBarcodeSVG($order->order_no, 'QRCODE') !!}
                            </h2>
                          </div>
                          <hr>
                                                 
                        <div class="invoice-number">Invoice No. <span class="fw-bold fs-3" style="font-family: 'Trebuchet MS', san-serif; color: red">{{ $order->order_no }}</span></div>
                        <h5 style="font-family: 'Arial', san-serif">Bayangan Hotel & Beach Resort</h5>
                        <span>Brgy. Osukan, Labason, Zamboanga del Norte</span><br>
                        <span>(+63) 977 829 8391</span>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <b>Invoice To</b><br>
                                {{ $customer_data->name }}<br>
                                {{ $customer_data->address }},<br>
                                {{ $customer_data->city }}, {{ $customer_data->state }}, {{ $customer_data->zip }}
                            </address>
                        </div>
                        <div class="col-md-6 text-md-right">
                            <address>
                                <b>Booking Date</b><br>
                                {{ DateTime::createFromFormat('d/m/Y', $order->booking_date)->format('F d, Y') }}
                            </address>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="section-title">Booking Details</div>
                    <p class="section-lead">The booking detail information are given below:</p>
                    <hr class="invoice-above-table">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <thead class="thead-dark">
                            <tr>
                                <th>No.</th>
                                <th>Room Name</th>
                                <th class="text-center">Checkin Date</th>
                                <th class="text-center">Checkout Date</th>
                                <th class="text-center">Number of Adult</th>
                                <th class="text-center">Number of Children</th>
                                <th class="text-right">Subtotal</th>
                            </tr>
                            </thead>
                            @php $total = 0; @endphp
                            @foreach($order_detail as $item)
                            @php
                            $room_data = \App\Models\Room::where('id',$item->room_id)->first();
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $room_data->name }}</td>
                                <td class="text-center">{{ DateTime::createFromFormat('d/m/Y', $item->checkin_date)->format('F d, Y') }}</td>
                                <td class="text-center">{{ DateTime::createFromFormat('d/m/Y', $item->checkout_date)->format('F d, Y') }}</td>
                                <td class="text-center">{{ $item->adult }}</td>
                                <td class="text-center">{{ $item->children }}</td>
                                <td class="text-right">
                                    @php
                                    $d1 = explode('/',$item->checkin_date);
                                    $d2 = explode('/',$item->checkout_date);
                                    $d1_new = $d1[2].'-'.$d1[1].'-'.$d1[0];
                                    $d2_new = $d2[2].'-'.$d2[1].'-'.$d2[0];
                                    $t1 = strtotime($d1_new);
                                    $t2 = strtotime($d2_new);
                                    $diff = ($t2-$t1)/60/60/24;
                                    $sub = $room_data->price*$diff;
                                    @endphp
                                    ₱{{ number_format($sub, 2) }}
                                </td>
                            </tr>
                            @php
                            $total += $sub;
                            @endphp
                            @endforeach
                        </table>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-12 text-right">
                            <div class="invoice-detail-item">
                                <div class="invoice-detail-name">Total</div>
                                <div class="invoice-detail-value invoice-detail-value-lg">₱{{ number_format($total, 2) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="about-print-button">
        <div class="text-center fs-5 fw-bold">Thank you for your business!</div>
        <h2 class="text-center align-items-center d-flex justify-content-center barcode">{!! DNS1D::getBarcodeSVG($order->order_no, 'C93') !!}</h2>
        <div class="text-md-right">
            <a href="javascript:window.print();" class="btn btn-warning btn-icon icon-left text-white print-invoice-button"><i class="fa fa-print"></i> Print</a>
        </div>
    </div>
</div>
@endsection