@extends('admin.layout.app')

@section('heading', 'Customers')

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
                                    <th>No.</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Registered</th>
                                    <th>Last Login</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customers as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if($row->photo!='')
                                            <img src="{{ asset('uploads/'.$row->photo) }}" alt="profile photo" class="w_100 img-fluid rounded">
                                        @else
                                            <img src="{{ asset('uploads/default.png') }}" alt="default profile photo" class="w_100 img-fluid rounded">
                                        @endif
                                        
                                    </td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->phone }}</td>
                                    <td>{{ \DateTime::createFromFormat('Y-m-d H:i:s', $row->created_at)->format('F d, Y g:i:s A') }}</td>
                                    <td>{{ \DateTime::createFromFormat('Y-m-d H:i:s', $row->updated_at)->format('F d, Y g:i:s A') }}</td>
                                    <td class="pt_10 pb_10">
                                        @if($row->status == 1)
                                        <a href="{{ route('admin_customer_change_status',$row->id) }}" class="btn btn-success mb-2" data-toggle="tooltip" data-placement="top" title="Deactivate">
                                            <i class="fa fa-power-off" aria-hidden="true"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('admin_customer_change_status',$row->id) }}" class="btn btn-danger mb-2" data-toggle="tooltip" data-placement="top" title="Activate">
                                            <i class="fa fa-power-off" aria-hidden="true"></i>
                                        </a>
                                    @endif                                    
                                        <a href="{{ route('admin_customer_delete',$row->id) }}" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete" onClick="return confirm('Are you sure?');"><i class="fa fa-trash" aria-hidden="true"></i></a>
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