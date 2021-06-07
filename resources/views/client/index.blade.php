@include('client.shared._header')
<div class="shap_big_2 d-none d-lg-block">
    <img src="img/ilstrator/body_shap_2.png" alt="">
</div>
<!-- slider_area_start -->
<div class="slider_area">
    <div class="shap_img_1 d-none d-lg-block">
        <img src="img/ilstrator/body_shap_1.png" alt="">
    </div>
    <div class="poly_img">
        <img src="img/ilstrator/poly.png" alt="">
    </div>
    <div class="single_slider  d-flex align-items-center slider_bg_1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-10 offset-xl-1">
                    <div class="slider_text text-center">
                        <div class="text">
                            <h3>
                                Information Security Audit<br>
                                Analyze Your Information Security
                            </h3>
                            {{--<a class="boxed-btn3" href="#">Get Started</a>--}}
                        </div>
                        <div class="ilstrator_thumb">
                            <img src="img/ilstrator/illustration.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider_area_end -->

<!-- service_area  -->
<div class="service_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-md-4">
                <div class="single_service text-center">
                    <div class="icon">
                        <img src="img/svg_icon/seo_1.svg" alt="">
                    </div>
                    <h3>Testing</h3>
                    <p>Take the test prepared for you to determine the security of your information system</p>
                    <a href="/test" class="boxed-btn3-text">Learn More</a>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
                <div class="single_service text-center">
                    <div class="icon">
                        <img src="img/svg_icon/seo_2.svg" alt="">
                    </div>
                    <h3>Monitoring</h3>
                    <p>Monitor your information system and security</p>
                    <a href="/monitor" class="boxed-btn3-text">Learn More</a>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
                <div class="single_service text-center">
                    <div class="icon">
                        <img src="img/svg_icon/seo_3.svg" alt="">
                    </div>
                    <h3>Analyzing</h3>
                    <p>Analyze Social & Mass media</p>
                    <a href="/analyze" class="boxed-btn3-text">Learn More</a>
                </div>
            </div>
        </div>

    </div>
</div>
<!--/ service_area  -->

<!-- compapy_info  -->
<div class="compapy_info">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-md-5">
                <div class="man_thumb">
                    <img src="img/ilstrator/man.png" alt="">
                </div>
            </div>
            <div class="col-xl-7 col-md-7">
                <div class="company_info">
                    <h3>Quality Assurance and Result
                    </h3>
                    <p>We guarantee the high quality of the services provided, our highly qualified auditors in the field of information security know their requirements.</p>

                    <a href="/about" class="boxed-btn3">About Us</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ compapy_info  -->

<section class="contact-section section_padding">
    <div class="container">
        <div class="row">
    <div class="col-12">
        <h2 class="contact-title">Send a Review</h2>
    </div>
    <div class="col-lg-8">
        <div class="form-contact contact_form">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">

                        <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder = 'Enter Message'></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input class="form-control" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder = 'Enter your name'>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input class="form-control" name="name" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder = 'Enter email address'>
                    </div>
                </div>
            </div>
            <div class="form-group mt-3">
                <button type="button" onclick="send()" class="button button-contactForm btn_4 boxed-btn">Send Message</button>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
                <h3>Almaty Towers</h3>
                <p>Almaty, Bayzakov st. 280</p>
            </div>
        </div>
        <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
            <div class="media-body">
                <h3>+7 777 518 8310</h3>
                <p>Mon to Fri 9am to 6pm</p>
            </div>
        </div>
        <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
                <h3>review@isaudit.kz</h3>
                <p>Send us your review anytime!</p>
            </div>
        </div>
    </div>
</div>
    </div>
</section>

<script>
    function send() {
        $.ajax({
            cache : false,
            type : 'POST',
            dataType : 'json',
            url : '/setReview',
            data : {
                _token : '{{csrf_token()}}',
                message : $('#message').val(),
                name : $('#name').val(),
                email : $('#email').val()
            },
            success(data){
                if(data.success){
                    alert('Thanks for review');
                }else{
                    alert('Error : '+data.error);
                }
            },
            error(error) {
                alert('Try later');
            }
        });
    }
</script>
@include('client.shared._comments')

@include('client.shared._footer')