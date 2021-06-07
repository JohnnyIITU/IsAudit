@include('client.shared._header')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
        <div class="row">
            <div id="chart_div" class="col-12" style="height: 500px;"></div>
            <div class="col-12">
                <p style="color: black">
                    Passed : {{sizeof($data)}}
                </p>
                <p style="color: black">
                    Average : {{$avg}}
                </p>
                <p style="color: black">
                    Questions : {{$count}}
                </p>
            </div>
        </div>
    </div>
</div>

<script>
    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawMaterial);

    function drawMaterial() {
        var data = new google.visualization.arrayToDataTable([
            ['Username', 'Result'],
            @foreach($data as $result)
                ['{{$result['user']}}', {{$result['result']}}],
            @endforeach
        ]);

        var options = {
            title: "Results",
            width: '100%',
            height: '500px',
            legend: { position: "none" },
        };

        var materialChart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        materialChart.draw(data, options);
    }
</script>

@include('client.shared._comments')
@include('client.shared._footer')