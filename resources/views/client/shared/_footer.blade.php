<footer class="footer">
    <div class=" container">
        <div class="pro_border">
            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <div class="lets_projects">
                        <h3>Let’s Start, <a href="mailto:review@isaudit.kz">Mail Us</a> </h3>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="phone_number">
                        <h3>+7 777 518 8310</h3>
                        <a href="#">review@isaudit.kz</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <div class="footer_logo">
                            <a href="#">
                                <img src="img/footer_logo.png" alt="">
                            </a>
                        </div>
                        <p>
                            Information Security Audit<br>
                            Analyze Your Information Security
                        </p>
                        <div class="socail_links">
                            <ul>
                                <li>
                                    <a href="https://wa.me/77775188310?text=Hello, I need a some Service">
                                        <i class="fa fa-whatsapp"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://instagram.com/isaudit">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-xl-2 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Services
                        </h3>
                        <ul>
                            <li><a href="/test">Testing</a></li>
                            <li><a href="/monitor">Monitoring</a></li>
                            <li><a href="/analyze">Analyzing</a></li>
                        </ul>

                    </div>
                </div>
                <div class="col-xl-2 col-md-6 col-lg-2">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Useful Links
                        </h3>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="/solutions">Solutions</a></li>
                            <li><a href="/about">About</a></li>
                            <li><a href="/contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 offset-xl-1 col-md-6 col-lg-4">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Subscribe
                        </h3>
                        <form action="#" class="newsletter_form">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit">Subscribe</button>
                        </form>
                        <p class="newsletter_text">Esteem spirit temper too say adieus who direct esteem esteems luckily.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right_text">
        <div class="container">
            <div class="footer_border"></div>
            <div class="row">
                <div class="col-xl-12">
                    <p class="copy_right text-center">

                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved

                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- JS here -->
<script src="/js/vendor/modernizr-3.5.0.min.js"></script>
<script src="/js/vendor/jquery-1.12.4.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/isotope.pkgd.min.js"></script>
<script src="/js/ajax-form.js"></script>
<script src="/js/waypoints.min.js"></script>
<script src="/js/jquery.counterup.min.js"></script>
<script src="/js/imagesloaded.pkgd.min.js"></script>
<script src="/js/scrollIt.js"></script>
<script src="/js/jquery.scrollUp.min.js"></script>
<script src="/js/wow.min.js"></script>
<script src="/js/nice-select.min.js"></script>
<script src="/js/jquery.slicknav.min.js"></script>
<script src="/js/jquery.magnific-popup.min.js"></script>
<script src="/js/plugins.js"></script>
<script src="/js/gijgo.min.js"></script>

<!--contact js-->
<script src="/js/contact.js"></script>
<script src="/js/jquery.ajaxchimp.min.js"></script>
<script src="/js/jquery.form.js"></script>
<script src="/js/jquery.validate.min.js"></script>
<script src="/js/mail-script.js"></script>

<script src="/js/main.js"></script>

<script>
    function login() {
        username = $('#username').val();
        password = $('#password').val();
        $.ajax({
            dataType : 'json',
            type : 'POST',
            cache : false,
            url : '/login',
            data : {
                _token : '{{csrf_token()}}',
                username : username,
                password : password
            },
            success(data){
                if(data.success){
                    location.reload();
                }else{
                    alert('Error : '+data.error);
                }
            },
            error(error){
                alert('Error, try later');
            }
        });
    }
</script>

</body>

</html>