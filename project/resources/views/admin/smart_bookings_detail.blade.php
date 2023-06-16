@extends('admin.layout.app')

@section('heading', 'Kubo (Booked and Available) for '.DateTime::createFromFormat('d/m/Y', $selected_date)->format('F d, Y'))

@section('right_top_button')
<a href="{{ route('admin_smart_bookings') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Back to previous</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kubo Name</th>
                                    <th>Total Kubo</th>
                                    <th>Booked Kubo</th>
                                    <th>Available Kubo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $rooms = \App\Models\Room::get();
                                @endphp 
                                @foreach($rooms as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->total_rooms }}</td>
                                    <td>
                                        @php
                                        $cnt = \App\Models\BookedRoom::where('room_id',$row->id)->where('booking_date',$selected_date)->count();
                                        @endphp
                                        {{ $cnt }}
                                    </td>
                                    <td>
                                        {{ $row->total_rooms-$cnt }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection