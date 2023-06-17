@extends('admin.layout.app')

@section('heading', 'Dashboard')

@section('main_content')
<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-info">
                <i class="bx bx-receipt bx-burst-hover"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Reservations</h4>
                </div>
                <div class="card-body">
                    {{ $total_completed_orders }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-info">
                <i class="bx bx-calendar-exclamation bx-tada-hover"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Sales</h4>
                </div>
                <div class="card-body">
                    ₱{{ number_format($total_sales, 2) }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-info">
                <i class="bx bx-user-voice bx-burst-hover"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Active Customers</h4>
                </div>
                <div class="card-body">
                    {{ $total_active_customers }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-info">
                <i class="bx bx-sleepy bx-tada-hover"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Pending Customers</h4>
                </div>
                <div class="card-body">
                    {{ $total_pending_customers }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-info">
                <i class="bx bx-bed bx-tada-hover"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Kubo</h4>
                </div>
                <div class="card-body">
                    {{ $total_rooms }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-info">
                <i class="bx bx-envelope bx-tada-hover"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Subscribers</h4>
                </div>
                <div class="card-body">
                    {{ $total_subscribers }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <section class="section">
            <div class="section-header">
                <h1>Recent Reservations</h1>
            </div>
        </section>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
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
                                            <td>{{ $row->order_no }}</td>
                                            <td>{{ $row->payment_method }}</td>
                                            <td>{{ DateTime::createFromFormat('d/m/Y', $row->booking_date)->format('F d, Y') }}</td>
                                            <td>₱{{ number_format($row->paid_amount, 2) }}</td>
                                            <td class="pt_10 pb_10">
                                                <a href="{{ route('admin_invoice',$row->id) }}" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                                <a href="{{ route('admin_order_delete',$row->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
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
    </div>
</div>


@endsection