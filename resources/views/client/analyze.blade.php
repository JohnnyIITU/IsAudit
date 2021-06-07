@include('client.shared._header')
<div class="bradcam_area">
    <div class="bradcam_shap">
        <img src="img/ilstrator/bradcam_ils.png" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>Test</h3>
                    <nav class="brad_cam_lists">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Analyze</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- case_study_area  -->
<div class="case_study_area white_case_study">
    <div class="patrn_1 d-none d-lg-block">
        <img src="img/pattern/patrn_1.png" alt="">
    </div>
    <div class="patrn_2 d-none d-lg-block">
        <img src="img/pattern/patrn.png" alt="">
    </div>
    <div class="container">
        <div class="row">
            @foreach ($data as $test)
                <div class="col-lg-4 col-md-6">
                    <div class="single_study text-center white_single_study">
                        <div class="thumb">
                            <a href="/analyze/{{$test['id']}}">
                                <img src="{{$test['img']}}" alt="">
                            </a>
                        </div>
                        <div class="subheading white_subheading">
                            <h4><a href="/test/{{$test['id']}}">{{$test['name']}}</a></h4>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="load_more text-center">
                    @if(!\Auth::check())
                        <a class="load_more_btn" onclick="alert('Authenticate for take more tests')">Load More</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="section-top-border">
            <h3 class="mb-30">Table</h3>
            <div class="progress-table-wrap">
                <div class="progress-table">
                    <div class="table-head">
                        <div class="serial">#</div>
                        <div class="country">Test</div>
                        <div class="visit">Agv</div>
                        <div class="percentage">Percentages</div>
                    </div>
                    @php($i = 1)
                    @foreach($results as $result)
                    <div class="table-row">
                        <div class="serial">{{$i}}</div>
                        <div class="country">{{$result['name']}}</div>
                        <div class="visit">{{$result['avg']}}</div>
                        <div class="percentage">
                            <div class="progress">
                                <div class="progress-bar color-1" role="progressbar" style="width: {{$result['percent']}}%"
                                     aria-valuenow="{{$result['percent']}}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    @php($i++)
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>
<!--/ case_study_area  -->
@include('client.shared._comments')
@include('client.shared._footer')