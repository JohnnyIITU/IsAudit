<!-- testimonial_area  -->
<div class="testimonial_area ">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="testmonial_active owl-carousel">
                    @foreach(App\Review::getReviews() as $review)
                        <div class="single_carousel">
                        <div class="single_testmonial text-center">
                            <div class="quote">
                                <img src="img/testmonial/quote.svg" alt="">
                            </div>
                            <p>{{$review['message']}}</p>
                            <div class="testmonial_author">
                                <h3>{{$review['fullname']}}</h3>
                                <span>{{$review['email']}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /testimonial_area  -->