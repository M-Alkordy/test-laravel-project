<section id="{{$section->alias}}">
    <div class="m-0 contact-info padding-top-30" data-stellar-background-ratio=".3" @if($section->background) style="background: url({{url('images/sections/backgrounds/'.$section->background)}}) center center fixed no-repeat;
    background-size: cover;" @endif>
        <div class="container">
            <!-- Heading -->
            <!-- Heading -->
            <div class="heading text-center">
                <h4>{{__('Get in Touch')}}</h4>
            </div>
            <ul class="row">
                <li class="col-md-6">
                    <article>
                        {!! __(config('site_settings.address')) !!}
                        <div style="direction:ltr; font-weight: bold;" class="margin-top-30"><i class="fa fa-phone-square"></i> <a href="tel:{{config('site_settings.contact.tel')}}" >{{config('site_settings.contact.tel')}}</a></div>
                        <div style="direction:ltr; font-weight: bold;" class="margin-top-30"><i class="fa fa-envelope"></i> <a href="mailto:{{config('site_settings.main_email')}}"> {{config('site_settings.main_email')}}</a></div> </article>
                    <div class="mapouter pt-4">
                        <div class="gmap_canvas">
                            <iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q={{config('site_settings.address')}}&t=&z=13&ie=UTF8&iwloc=&output=embed{{config('app.locale')=='ar'?'&language=ar':''}}" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><style>.mapouter{position:relative;text-align:right;height:100%;width:100%;}</style><style>.gmap_canvas {overflow:hidden;background:none!important;min-height:300px; height:100px;width:100%;}</style></div></div
                </li>
                <li class="col-md-6" style="z-index: 9; margin-bottom: 15px;">
                    <!-- CONTACT FORM -->
                    <div class="contact-form">
                        <!-- Success Msg -->

                        <!-- FORM -->
                        <form role="form" id="contact_form" class="contact-form was-validated" method="post" action="{{url('send-email')}}" novalidate>
                            @csrf
                            <ul class="row">
                                <li>
                                    <div class="heading text-left margin-top-70 margin-bottom-30">
                                        <h4>{{{__('drop us a line')}}}</h4>
                                    </div>
                                </li>
                                <li class="col-sm-12 form-group">
                                    <label>
                                        <input type="text" class="form-control is-valid" name="name" id="name" placeholder="{{__('Name')}}" required>
                                    </label>
                                </li>
                                <li class="col-sm-12 form-group">
                                    <label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="{{__('Email')}}" required>
                                    </label>
                                </li>
                                <li class="col-sm-12">
                                    <label>
                                        <input type="text" class="form-control" name="company" id="company" placeholder="{{__('Company')}}" required>
                                    </label>
                                </li>
                                <li class="col-sm-12">
                                    <label>
                                        <input type="text" class="form-control" name="subject" id="company" placeholder="{{__('Subject')}}" required>
                                    </label>
                                </li>
                                <li class="col-sm-12">
                                    <label>
                                        <textarea class="form-control" name="message" id="message" rows="5" placeholder="{{__('Message')}}" required></textarea>
                                    </label>
                                </li>

                                <li class="col-sm-12">
                                    <button  class="g-recaptcha btn btn-1" data-sitekey="6LfKiaggAAAAAJktaZR35nMngOJkvTKy2Thnd7ia" id="btn_submit" data-callback='onSubmit'
                                            data-action='submit'>{{__('Send Message')}} <i class="fa fa-caret-right"></i></button>
                                </li>
                            </ul>
                        </form>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</section>
