@extends('admin.layout.app')

@section('heading', 'View Subscribers')

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
                                    <th>Email</th>
                                    <th>Date Submitted</th>
                                    <th>Date Verified</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($all_subscribers as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ \DateTime::createFromFormat('Y-m-d H:i:s', $row->created_at)->format('F d, Y g:i:s A') }}</td>
                                    <td>{{ \DateTime::createFromFormat('Y-m-d H:i:s', $row->updated_at)->format('F d, Y g:i:s A') }}</td>
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