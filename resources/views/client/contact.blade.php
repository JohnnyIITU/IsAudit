@include('client.shared._header')
<div class="bradcam_area">
    <div class="bradcam_shap">
        <img src="img/ilstrator/bradcam_ils.png" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Contact</h3>
                    <nav class="brad_cam_lists">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="contact-section section_padding">
    <div class="container">
        <div class="d-none d-sm-block mb-5 pb-4">
            <div style="height: 480px;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2906.6681627777552!2d76.9130239157616!3d43.23741657913768!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38836933adf23b39%3A0x36a2c9ea956e1c01!2z0YPQu9C40YbQsCDQkdCw0LnQt9Cw0LrQvtCy0LAgMjgwLCDQkNC70LzQsNGC0YsgMDUwMDAw!5e0!3m2!1sru!2skz!4v1591435036139!5m2!1sru!2skz" width="100%" height="100%"></iframe>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">Send a Review</h2>
            </div>
            <div class="col-lg-8">
                <form class="form-contact contact_form">
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
                                <input class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder = 'Enter email address'>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input type="button" onclick="send()" class="button button-contactForm btn_4 boxed-btn" value="Send Message">
                    </div>
                </form>
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