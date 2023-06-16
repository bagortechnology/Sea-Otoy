@extends('admin.layout.app')

@section('heading', 'Reservation History')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Reservation No.</th>
                                    <th>Payment Method</th>
                                    <th>Reservation Date</th>
                                    <th>Paid Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><b>{{ $row->order_no }}</b></td>
                                    <td>{{ $row->payment_method }}</td>
                                    <td>{{ DateTime::createFromFormat('d/m/Y', $row->booking_date)->format('F d, Y') }}</td>
                                    <td>₱{{ number_format($row->paid_amount, 2) }}</td>
                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('admin_invoice',$row->id) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="View Invoice"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a href="{{ route('admin_order_delete',$row->id) }}" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete" onClick="return confirm('Are you sure?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
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