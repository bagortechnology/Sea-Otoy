@extends('admin.layout.app')

@section('heading', 'Send Newsletter')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_subscriber_send_email_submit') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Subject</label>
                                    <input type="text" class="form-control" name="subject" value="{{ old('subject') }}" style="border-color: #fa8c7d; border-radius: 5px">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Message</label>
                                    <textarea name="message" class="form-control h_100" cols="30" rows="10" style="border-color: #fa8c7d; border-radius: 5px">{{ old('message') }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection