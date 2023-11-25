@extends('site.layouts.master')

@section('content')
    <section class="home-slide">
        <ul class="slides">

            <!-- SLIDER 1 -->
            <li class="slide-img-1" data-stellar-background-ratio="0.6" style="background: linear-gradient(to bottom right, rgba(51,153, 51, 0.5), rgba(0, 102, 153, 0.5),rgba(0, 102, 153, 0.5),rgba(0, 102, 153, 0.5)),
    url({{asset('/assets/images/slides/slide-1.jpg')}}); background-size: cover;">
                <div class="position-center-center">
                    <h1>HR-Trust</h1>
                    <h5>Your HR Strategic Trusted Partner</h5>
                    <a href="#." class="btn margin-top-30">Read More <i class="fa fa-caret-right"></i></a> </div>
            </li>

            <!-- SLIDER 2 -->
            <li class="slide-img-2" data-stellar-background-ratio="0.1" style="background: linear-gradient(to bottom right, rgba(51,153, 51, 0.5), rgba(0, 102, 153, 0.5),rgba(0, 102, 153, 0.5),rgba(0, 102, 153, 0.5)),
    url({{asset('/assets/images/slides/slide-2.jpg')}}); background-size: cover;">
                <div class="position-center-center">
                    <h1>HR-Trust</h1>
                    <h5>Your HR Strategic Trusted Partner</h5>
                    <a href="#." class="btn margin-top-30">Read More <i class="fa fa-caret-right"></i></a> </div>
            </li>
        </ul>

    </section>
    <!-- WHO WE ARE -->
    <section id="about" class="padding-top-70 padding-bottom-70">
        <div class="heading text-center">
            <h4>{{__('About Us')}}</h4>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>We are a-preferred Trusted partner-of-choice</h3>
                    <p>
                        With over 100 years of combined experience in HR within local, multinational and World class organizations; we understand the value of integrating innovative solutions into our daily work and the necessity of always providing tailored-fit HR solutions to our clients.
                        <br>
                        We incorporate lessons learned to continually improve our HR solutions. We are authentic, organized, professional, and passionate about what we do.   

                    </p>
                </div>
            </div>
            <div class="who-we">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="font-normal">who we are</h3>
                        <h6>Our Values</h6>
                        <p>Act with Trust: we are trustworthy and transparent in the way we work.
                            <br>
                            Strive for Excellence: we aim high and strive for professional perfection.
                            <br>
                            Value our People: we have a highly professional team who deliver value added solutions.
                            <br>
                            Commitment to Quality: we continually improve our performance to ensure delivery of quality based solutions every time.
                            </p>
                        <h6>Our Integrated HR Solutions </h6>
                        <p>
                            Partnering closely with our client, we develop new insights about the current business operations, challenges they face, and their future aspiration in-order to create tailored-fit HR solutions that yield the greatest competitive advantage and value for our clients.
                            <br>
                            We develop innovative and practical HR approaches guaranteed to transform and stimulate growth, optimization, efficiency and effectiveness to earn Trust.

                        </p>
                    </div>
                    <div class="col-md-6">

                        <!-- SERVICES -->
                        <ul class="row">

                            <!-- SERVICES -->
                            <li class="col-sm-12"> <i class="fa fa-eye"></i>
                                <h5>{{__('Our Vision')}}</h5>
                                <p>To become the leading advisor in HR management consulting, being well-recognized for overcoming business challenges through value-added solutions.</p>
                            </li>

                            <!-- SERVICES -->
                            <li class="col-sm-12"> <i class="fa fa-rocket"></i>
                                <h5>{{__('Our Mission')}}</h5>
                                <p>To develop integrated HR solutions that transform strategies into reality and business plans into action plans.
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SERVICES -->
    <section id="services" class="services padding-top-70 padding-bottom-70">
        <div class="container">
            <!-- Heading -->
            <div class="heading text-center">
                <h4>Our Services</h4>
            </div>
        </div>
        <div class="best-services">
            <!-- Row -->
            <div class="container">
                <ul class="row list">
                    <!-- Consulting Solutions -->
                    <li class="col-md-3" data-content="#colio_c1">
                        <article class="thumb"> <a class="button colio-link" href="#">
                                <img class="icon" src="{{asset('assets/icons/consulting.svg')}}">
                                <h5>Consulting Solutions</h5>
                                <p>Value Driven Solutions</p>
                            </a> </article>
                    </li>

                    <!-- Executive Search -->
                    <li class="col-md-3" data-content="#colio_c2">
                        <article class="thumb"><a class="button colio-link" href="#">
                                <img class="icon" src="{{asset('assets/icons/execuitive-search.svg')}}">
                                <h5>Executive Search</h5>
                                <p>Pioneering Executive Search</p>
                            </a> </article>
                    </li>

                    <!-- Executive Coaching -->
                    <li class="col-md-3" data-content="#colio_c3">
                        <article class="thumb"><a class="button colio-link" href="#">
                                <img class="icon" src="{{asset('assets/icons/coaching.svg')}}">
                                <h5>Executive Coaching</h5>
                                <p>Coaching With A Purpose!</p>
                            </a> </article>
                    </li>

                    <!-- Training & Learning -->
                    <li class="col-md-3" data-content="#colio_c4">
                        <article class="thumb"><a class="button colio-link" href="#">
                                <img class="icon" src="{{asset('assets/icons/training.svg')}}">
                                <h5>Training & Learning</h5>
                                <p>Training & Learning .</p>
                            </a> </article>
                    </li>

                </ul>
            </div>
        </div>

        <!-- Analytics Tab Open -->
        <div id="colio_c1" class="colio-content">
            <div class="main">
                <div class="container">
                    <div class="inside-colio">
                        <div class="row">
                            <div class="col-md-4 text-right"> <img class="img-responsive" src="{{asset('assets/images/consulting.png')}}" alt=""> </div>
                            <div class="col-md-8">
                                <!-- Heading -->
                                <div class="heading text-left margin-bottom-40">
                                    <h4>Consulting Solutions</h4>
                                </div>
                                <p>
                                    Businesses are compelled to find new ways to minimize costs and boost productivity without impacting performance.
                                    Through focusing on what matters, we advise our clients to Optimize their resources, Transform their operational activities, products, and services to enable an efficient competitive advantage.
                                    <br>
                                    <strong> Our professional consultants will advise on boosting organizational performance with many strategic benefits like:</strong> <br></p>
                                <ul>
                                    <li>Structural reduction of the Human Resource Managing (HRM) cost-base, by identifying the non-value adding activities and eliminate the hidden HR operations costs.</li>
                                    <li>Identify the inefficient and ineffective HR Administration processes and practices.</li>
                                    <li>Focus on human resource performance towards a performance driven organization.</li>
                                    <li>Improve efficiency, productivity, communication & employee engagement within the organization.</li>

                                </ul>
                                <a href="#." class="btn btn-1 margin-top-30">Read More <i class="fa fa-caret-right"></i></a> </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Storage Tab Open -->
        <div id="colio_c2" class="colio-content">
            <div class="main">
                <div class="container">
                    <div class="inside-colio">
                        <div class="row">
                            <div class="col-md-4 text-left"> <img class="img-responsive" src="{{('assets/images/executive-search.png')}}" alt=""> </div>
                            <div class="col-md-8">
                                <!-- Heading -->
                                <div class="heading text-left margin-bottom-40">
                                    <h4>Executive Search</h4>
                                </div>
                                <p> <strong> Our Understanding</strong> <br>
                                    <br>
                                    Sourcing and resourcing high-performing talents for Senior Executive roles requires following a rigid approach for assessment and a thorough understanding of the compound work environment.
                                    <br>
                                    <strong>Who We Are?</strong>
                                    <br>
                                    We are deep industry and subject matter experts in finding executive talent for your organization to lead into the future.
                                    <br>
                                    Through applying a well-defined methodology and approach to ensure that every single time delivers the best candidate for you.
                                    <br>
                                    We are specialized across a variety of industries and sectors including private, governmental and publicly traded organizations.
                                </p>
                                 <a href="#." class="btn btn-1 margin-top-30">Read More <i class="fa fa-caret-right"></i></a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Security Tab Open -->
        <div id="colio_c3" class="colio-content">
            <div class="main">
                <div class="container">
                    <div class="inside-colio">
                        <div class="row">
                            <div class="col-md-4 text-right"> <img class="img-responsive" src="{{asset('assets/images/coaching.png')}}" alt=""> </div>
                            <div class="col-md-8">
                                <!-- Heading -->
                                <div class="heading text-left margin-bottom-40">
                                    <h4>Executive Coaching</h4>
                                </div>
                                <p> <strong>Coaching With A Purpose!</strong> <br>
                                    <br>
                                    Coaching is a professional relationship between the coach and the executive member driven by the sole purpose to achieve exceptional results. Through the process of coaching, the individual focuses on the skills and actions needed for their career success.
                                    <br>
                                    It’s common among professionals to have the desire to revisit their career and consider new opportunities, but most fail to find time to work on it due to their daily routine. With a Personal Career Coach you will have well-defined, realistic goals and a clear action plan, which will make it easier to organize yourself and work towards your career objectives.
                                    <br>
                                    Coaching broadens the executive’s mental thought leadership by providing greater focus and awareness of opportunities, leading to more effective choices.
                                </p>
                                <a href="#." class="btn btn-1 margin-top-30">Read More <i class="fa fa-caret-right"></i></a> </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Storage Tab Open -->
        <div id="colio_c4" class="colio-content">
            <div class="main">
                <div class="container">
                    <div class="inside-colio">
                        <div class="row">
                            <div class="col-md-4 text-right"> <img class="img-responsive" src="{{asset('assets/images/training.png')}}" alt=""> </div>
                            <div class="col-md-8">
                                <!-- Heading -->
                                <div class="heading text-left margin-bottom-40">
                                    <h4>Training & Learning</h4>
                                </div>
                                <p> To ensure delivering the best Training & Learning Solutions; we have partnered with a truly dedicated global provider specialized in delivering custom learning solutions – from the frontline to the C-suite.
                                    <br>
                                    American Consulting Experts provide Learning Solutions which integrates leading technologies, developing new learning paradigms, and instituting fresh training concepts and learning approaches that keep your people ahead-of-change.
                                </p>
                                <img style="float:right; width:150px;" src="{{asset('assets/images/ace.jpg')}}">
                                 <a href="#." class="btn btn-1 margin-top-30">Read More <i class="fa fa-caret-right"></i></a> </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Our Methodology -->
    <section id="our-methology" class="testi-bg padding-top-100 padding-bottom-100" >
        <div class="container">
            <div class="testi">
                <h5>Our Methodology</h5>
                <p> Through our methodology, we are committed to present the subject matter expert in your industry. We are responsive to find an immediate tailored-fit solution to the problem in a very short notice. We continuously improve the quality of our solutions and the efficiency of our processes.</p>
            </div>
        </div>
        <div class="container mt-4">
            <!-- Methodologies -->
            <div class="list-style-featured">
                <div class="row no-margin">
                    <!-- LIST LEFT -->
                    <div class="col-md-6 no-padding">
                        <ul class="text-right">
                            <li>
                                <div class="media">
                                    <div class="media-left">
                                        <div class="icon"><i class="fa fa-search"></i></div>
                                    </div>
                                    <div class="media-body">
                                        <h6>EXAMINE</h6>
                                        <p>Applying extensive data collection & analysis to diagnose existing HR problems & challenges</p>
                                    </div>

                                </div>
                            </li>
                            <li>
                                <div class="media">
                                    <div class="media-left">
                                        <div class="icon"><i class="fa fa-magnet"></i></div>
                                    </div>
                                    <div class="media-body">

                                        <h6>ENGAGE</h6>
                                        <p>Setting a strategic plan & a roadmap of innovative HR solutions &  well-defined approaches to solve problems</p>
                                    </div>

                                </div>
                            </li>
                        </ul>
                    </div>


                    <!-- LIST ICON RIGHT -->
                    <div class="col-md-6 no-padding">
                        <ul>
                            <li>
                                <div class="media">
                                    <div class="media-left">
                                        <div class="icon"> <i class="fa fa-cogs"></i> </div>
                                    </div>
                                    <div class="media-body">
                                        <h6>EXECUTE</h6>
                                        <p>Implementation of HR solutions & building internal support to ensure their integration within the client's need</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media">
                                    <div class="media-left">
                                        <div class="icon"> <i class="fa fa-list-ol"></i> </div>
                                    </div>
                                    <div class="media-body">
                                        <h6>EVALUATE</h6>
                                        <p>Continuous improvement & resource optimization</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team -->
    <section id="our-team" class="light-gray-bg padding-top-70 padding-bottom-70">
        <div class="container">
            <!-- Heading -->
            <div class="heading text-center">
                <h4>Our Team</h4>
                <p>Our global, cross-functional team of professionals collaborate with clients to develop tailored-fit solutions across strategy, design, and end-to-end delivery.
                    <br>
                    Our involvement includes all project phases and project types from concept design, modeling, development, testing to implementation.</p>
            </div>

            <!-- Team -->
            <div class="team">
                <div class="row">

                    <!-- Member -->
                    <div class="col-md-3">
                        <article> <img class="img-responsive" src="{{asset('assets/images/ibrahim.jpg')}}" alt="" >
                            <h5>Ibrahim Alamer</h5>
                            <span>CEO & Founder</span>
                            <p>A Senior HR & Business Leader with 26+ Years of proven career record with local and multinational organizations and leading HR Strategic roles indecisive and diverse industries viz.</p>

                        </article>
                    </div>

                    <!-- Member -->
                    <div class="col-md-3">
                        <article> <img class="img-responsive" src="{{asset('assets/images/gaith.jpg')}}" alt="" >
                            <h5>Gaith Hammad</h5>
                            <span>Managing Partner</span>
                            <p>Gaith has diversified experience, spanning over the time period of more than two decades in various regional and international setups in the vast field of Strategic Organization and Human Capital Development.</p>

                        </article>
                    </div>

                    <!-- Member -->
                    <div class="col-md-3">
                        <article> <img class="img-responsive" src="{{asset('assets/images/waseem.jpg')}}" alt="" >
                            <h5>Waseem Sinjab</h5>
                            <span>Senior Consultant</span>
                            <p>Waseem brings a fresh approach to Consulting Solutions, combining his expertise in HR Strategy Planning and Organizational Development, Performance Consulting, Digital Transformation and Project Management.</p>
                        </article>
                    </div>

                    <!-- Member -->
                    <div class="col-md-3">
                        <article> <img class="img-responsive" src="{{asset('assets/images/allan.jpg')}}" alt="" >
                            <h5>Allan Soueidan</h5>
                            <span>Professor</span>
                            <p>Senior Lecturer in the executive training Program in the “American University of Beirut - AUB” ,lecturer in the “Lebanese American University – LAU”
                            </p>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="clients padding-top-100 padding-bottom-100">
        <div class="container">

            <!-- Heading -->
            <div class="heading text-center">
                <h4>Accumulative Team Experiences</h4>
                <span>Through their individual experiences; our team have been exposed to many local and international organization in the Region and across all the HR spectrums.</span> </div>

            <!-- Clients -->
            <div class="single-slide">
                <div class="item">
                    <ul class="row">
                        <li class="col-2"><a href="#."><img class="img-responsive" src="{{asset('assets/images/client-img-1.jpg')}}" alt=""></a></li>
                        <li class="col-2"><a href="#."><img class="img-responsive" src="{{asset('assets/images/client-img-2.jpg')}}" alt=""></a></li>
                        <li class="col-2"><a href="#."><img class="img-responsive" src="{{asset('assets/images/client-img-3.jpg')}}" alt=""></a></li>
                        <li class="col-2"><a href="#."><img class="img-responsive" src="{{asset('assets/images/client-img-4.jpg')}}" alt=""></a></li>
                        <li class="col-2"><a href="#."><img class="img-responsive" src="{{asset('assets/images/client-img-5.jpg')}}" alt=""></a></li>
                        <li class="col-2"><a href="#."><img class="img-responsive" src="{{asset('assets/images/client-img-6.jpg')}}" alt=""></a></li>
                        <li class="col-2"><a href="#."><img class="img-responsive" src="{{asset('assets/images/client-img-7.jpg')}}" alt=""></a></li>
                        <li class="col-2"><a href="#."><img class="img-responsive" src="{{asset('assets/images/client-img-8.jpg')}}" alt=""></a></li>
                        <li class="col-2"><a href="#."><img class="img-responsive" src="{{asset('assets/images/client-img-9.jpg')}}" alt=""></a></li>
                        <li class="col-2"><a href="#."><img class="img-responsive" src="{{asset('assets/images/client-img-10.jpg')}}" alt=""></a></li>
                        <li class="col-2"><a href="#."><img class="img-responsive" src="{{asset('assets/images/client-img-11.jpg')}}" alt=""></a></li>
                        <li class="col-2"><a href="#."><img class="img-responsive" src="{{asset('assets/images/client-img-12.jpg')}}" alt=""></a></li>
                    </ul>
                </div>
                <div class="item">
                    <ul class="row">
                        <li class="col-2"><a href="#."><img class="img-responsive" src="{{asset('assets/images/client-img-13.jpg')}}" alt=""></a></li>
                        <li class="col-2"><a href="#."><img class="img-responsive" src="{{asset('assets/images/client-img-14.jpg')}}" alt=""></a></li>
                        <li class="col-2"><a href="#."><img class="img-responsive" src="{{asset('assets/images/client-img-15.jpg')}}" alt=""></a></li>
                        <li class="col-2"><a href="#."><img class="img-responsive" src="{{asset('assets/images/client-img-16.jpg')}}" alt=""></a></li>
                        <li class="col-2"><a href="#."><img class="img-responsive" src="{{asset('assets/images/client-img-17.jpg')}}" alt=""></a></li>
                        <li class="col-2"><a href="#."><img class="img-responsive" src="{{asset('assets/images/client-img-18.jpg')}}" alt=""></a></li>
                        <li class="col-2"><a href="#."><img class="img-responsive" src="{{asset('assets/images/client-img-19.jpg')}}" alt=""></a></li>
                        <li class="col-2"><a href="#."><img class="img-responsive" src="{{asset('assets/images/client-img-20.jpg')}}" alt=""></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="contact">
        <div class="m-0 contact-info padding-top-100 padding-bottom-100" data-stellar-background-ratio=".3">
            <div class="container">
                <!-- Heading -->
                <!-- Heading -->
                <div class="heading text-center">
                    <h4>Get in Touch</h4>
                </div>
                <ul class="row">
                    <li class="col-md-6">
                        <article>
                            <h5>Riyadh, Kingdom of Saudi Arabia</h5>
                            <p>Building No. 8918, Othman Bin Affan Street, Al Wahah District, Al Waha Complex<p>
                            <p>PO Box 12445</p>
                            <span class="margin-top-30"><i class="fa fa-phone-square"></i> <a href="tel:+96611 4466660">(+966) 11 4466660</a></span> <span class="primary-color"><i class="fa fa-envelope"></i> <a href="mailto:info@hr-trust.com"> info@hr-trust.com</a></span> </article>
                        <div class="mapouter pt-4">
                            <div class="gmap_canvas">
                                <iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=hr-trust, Othman Bin Affan Street,Riyadh,Saudi Arabia&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><style>.mapouter{position:relative;text-align:right;height:100%;width:100%;}</style><style>.gmap_canvas {overflow:hidden;background:none!important;min-height:300px; height:100px;width:100%;}</style></div></div
                    </li>
                    <li class="col-md-6">
                        <!-- CONTACT FORM -->
                        <div class="contact-form">
                            <!-- Success Msg -->
                            <div id="contact_message" class="success-msg"> <i class="fa fa-paper-plane-o"></i>Thank You. Your Message has been Submitted</div>
                            <!-- FORM -->
                            <form role="form" id="contact_form" class="contact-form" method="post" onSubmit="return false">
                                <ul class="row">
                                    <li>
                                        <div class="heading text-left margin-top-70 margin-bottom-30">
                                            <h4>drop us a line</h4>
                                        </div>
                                    </li>
                                    <li class="col-sm-12">
                                        <label>
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                        </label>
                                    </li>
                                    <li class="col-sm-12">
                                        <label>
                                            <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                                        </label>
                                    </li>
                                    <li class="col-sm-12">
                                        <label>
                                            <input type="text" class="form-control" name="company" id="company" placeholder="Subject">
                                        </label>
                                    </li>
                                    <li class="col-sm-12">
                                        <label>
                                            <textarea class="form-control" name="message" id="message" rows="5" placeholder="Message"></textarea>
                                        </label>
                                    </li>
                                    <li class="col-sm-12">
                                        <button type="submit" value="submit" class="btn btn-1" id="btn_submit" onClick="proceed();">Send Message <i class="fa fa-caret-right"></i></button>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </section>
    <footer>
        <div class="text-center text-white">
            <span>Copyright ©{{date('Y')}} All rights reserved</span>
            <br>
            <small>Developed By: <a style="font-size: 16px" class="brand" target="_blank" href="https://pioneers.network">Pioneers Network</a></small>
        </div>
    </footer>
@endsection
