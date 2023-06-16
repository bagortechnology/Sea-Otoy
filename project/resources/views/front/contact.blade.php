@extends('front.layout.app')

@section('main_content')
<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $page_data->contact_heading }}</h2>
            </div>
        </div>
    </div>
</div>
<div class="map">
    {!! $page_data->contact_map !!}
</div>
<div class="page-content" style="margin-top: -53px; positon: relative;">
    <div class="container" style=" box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset; border-radius: 15px;">
        <div class="row">
            <div class="col-lg-6 col-md-12 p-4 text-white" style="background-color: #1A5F7A; border-radius: 15px">
                <h2 class="display-4">Let's get in touch</h2>
                <p class="">We're open for any suggestion or just to have a chat.</p>
                <div class="d-flex mt-1">
                  <p class="mt-2 ms-3 fs-6"><i class="bx bx-map-pin" aria-hidden="true"></i> <b>Address</b> : <br>{!! nl2br($global_setting_data->footer_address) !!}</p>
                </div>
                <div class="d-flex mt-1">
                  <p class="mt-2 ms-3 fs-6"><i class="bx bx-phone-call" aria-hidden="true"></i> <b>Phone</b> : {{ $global_setting_data->footer_phone }}</p>
                </div>
                <div class="d-flex mt-1">
                  <p class="mt-2 ms-3 fs-6"> <i class="bx bx-envelope" aria-hidden="true"></i> <b>Email</b> :
                    {{ $global_setting_data->footer_email }} </p>
                </div>
                <div class="d-flex mt-1">
                    <p class="mt-2 ms-3 fs-6"> <i class="fa fa-facebook-official" aria-hidden="true"></i> <b>Facebook Page</b> :
                      <a style="text-decoration: none; color: white" href="{{ $global_setting_data->facebook }}" target="_blank">{{ $global_setting_data->facebook }}</a> </p>
                  </div>
            </div>

            <div class="col-lg-6 col-md-12 p-3">
                <form action="{{ route('contact_send_email') }}" method="post" class="form_contact_ajax">
                    @csrf
                    <div class="contact-form">
                        <div class="mb-3">
                            <label for="name" class="form-label"><b style="color:#1A5F7A">Name *</b></label>
                            <input type="text" class="form-control" name="name">
                            <span class="text-danger error-text name_error"></span>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label"><b style="color:#1A5F7A">Email Address *</b></label>
                            <input type="text" class="form-control" name="email">
                            <span class="text-danger error-text email_error"></span>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label"><b style="color:#1A5F7A">Message *</b></label>
                            <textarea class="form-control" rows="3" name="message"></textarea>
                            <span class="text-danger error-text message_error"></span>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn text-white" style="background-color: #E38B29; box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    (function($){
        $(".form_contact_ajax").on('submit', function(e){
            e.preventDefault();
            $('#loader').show();
            var form = this;
            $.ajax({
                url:$(form).attr('action'),
                method:$(form).attr('method'),
                data:new FormData(form),
                processData:false,
                dataType:'json',
                contentType:false,
                beforeSend:function(){
                    $(form).find('span.error-text').text('');
                },
                success:function(data)
                {
                    $('#loader').hide();
                    if(data.code == 0)
                    {
                        $.each(data.error_message, function(prefix, val) {
                            $(form).find('span.'+prefix+'_error').text(val[0]);
                        });
                    }
                    else if(data.code == 1)
                    {
                        $(form)[0].reset();
                        iziToast.success({
                            title: '',
                            position: 'topRight',
                            message: data.success_message,
                        });
                    }
                    
                }
            });
        });
    })(jQuery);
</script>
<div id="loader"></div>
@endsection