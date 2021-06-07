@include('client.shared._header')
<div class="bradcam_area">
    <div class="bradcam_shap">
        <img src="img/ilstrator/bradcam_ils.png" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>About Us</h3>
                    <nav class="brad_cam_lists">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">About</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
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

<div class="accordion_area">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-xl-6 col-lg-6">
                <div class="faq_ask">
                    <h3>Why Choose Us</h3>
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Adieus who direct esteem <span>It esteems luckily?</span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion" style="">
                                <div class="card-body">Esteem spirit temper too say adieus who direct esteem esteems luckily or picture placing drawing.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        Who direct esteem It esteems?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion" style="">
                                <div class="card-body">Esteem spirit temper too say adieus who direct esteem esteems luckily or picture placing drawing.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Duis consectetur feugiat auctor?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion" style="">
                                <div class="card-body">Esteem spirit temper too say adieus who direct esteem esteems luckily or picture placing drawing.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="accordion_thumb">
                    <img src="img/banner/accordion.png" alt="">
                </div>
            </div>
        </div>
    </div>

</div>
@include('client.shared._comments')
@include('client.shared._footer')