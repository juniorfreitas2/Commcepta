<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900' rel='stylesheet' type='text/css'>

    <!-- Page title -->
    <title>LUNA | Responsive Admin Theme</title>

    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{asset('/theme/vendor/fontawesome/css/font-awesome.css')}}"/>
    <link rel="stylesheet" href="{{asset('/theme/vendor/animate.css/animate.css')}}"/>
    <link rel="stylesheet" href="{{asset('/theme/vendor/bootstrap/css/bootstrap.css')}}"/>
    <link rel="stylesheet" href="{{asset('/theme/vendor/toastr/toastr.min.css')}}"/>

    <!-- App styles -->
    <link rel="stylesheet" href="{{asset('/theme/styles/pe-icons/pe-icon-7-stroke.css')}}"/>
    <link rel="stylesheet" href="{{asset('/theme/styles/pe-icons/helper.css')}}"/>
    <link rel="stylesheet" href="{{asset('/theme/styles/stroke-icons/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('/theme/styles/style.css')}}">
    <style>
        button, [type="button"], [type="reset"], [type="submit"] {
             -webkit-appearance: none;
        }
    </style>
    @yield('css')
</head>
<body>

<!-- Wrapper-->
<div class="wrapper">

    @include('layout.header')

    @include('layout.sidebar')

    <!-- Main content-->
    <section class="content">
        <div class="container-fluid">
            @yield("content")
            {{--<div class="row">--}}

                {{--<div class="col-lg-2 col-xs-6">--}}
                    {{--<div class="panel panel-filled">--}}

                        {{--<div class="panel-body">--}}
                            {{--<h2 class="m-b-none">--}}
                                {{--206 <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i> +20%</span>--}}
                            {{--</h2>--}}

                            {{--<div class="small">% New Sessions</div>--}}
                            {{--<div class="slight m-t-sm"><i class="fa fa-clock-o"> </i> Updated: <span class="c-white">10:22pm</span></div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-lg-2 col-xs-6">--}}
                    {{--<div class="panel panel-filled">--}}
                        {{--<div class="panel-body">--}}
                            {{--<h2 class="m-b-none">--}}
                                {{--140 <span class="slight"><i class="fa fa-play fa-rotate-90 c-white"> </i> 5%</span>--}}
                            {{--</h2>--}}

                            {{--<div class="small">Total visitors</div>--}}
                            {{--<div class="slight m-t-sm"><i class="fa fa-clock-o"> </i> Updated: <span class="c-white">9:10am</span></div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-lg-2 col-xs-6">--}}
                    {{--<div class="panel panel-filled">--}}
                        {{--<div class="panel-body">--}}
                            {{--<h2 class="m-b-none">--}}
                                {{--262 <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i> +56%</span>--}}
                            {{--</h2>--}}

                            {{--<div class="small">Total users</div>--}}
                            {{--<div class="slight m-t-sm"><i class="fa fa-clock-o"> </i> Updated: <span class="c-white">05:42pm</span></div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-lg-2 col-xs-6">--}}
                    {{--<div class="panel panel-filled">--}}
                        {{--<div class="panel-body">--}}
                            {{--<h2 class="m-b-none">--}}
                                {{--62% <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i> +18%</span>--}}
                            {{--</h2>--}}

                            {{--<div class="small">Bounce Rate</div>--}}
                            {{--<div class="slight m-t-sm"><i class="fa fa-clock-o"> </i> Updated: <span class="c-white">04:00am</span></div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}


                {{--<div class="col-lg-4 col-xs-12">--}}
                    {{--<div class="panel panel-filled" style="position:relative;height: 114px">--}}
                        {{--<div style="position: absolute;bottom: 0;left: 0;right: 0">--}}
                            {{--<span class="sparkline"></span>--}}
                        {{--</div>--}}
                        {{--<div class="panel-body">--}}
                            {{--<div class="m-t-sm">--}}
                                {{--<div class="pull-right">--}}
                                    {{--<a href="#" class="btn btn-default btn-xs">See locations</a>--}}
                                {{--</div>--}}
                                {{--<div class="c-white"><span class="label label-accent">+45</span> New visitor</div>--}}
                                {{--<span class="small c-white">120,312 <i class="fa fa-play fa-rotate-270 text-warning"> </i> -22%</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-12">--}}
                    {{--<div class="panel">--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-md-4">--}}

                                {{--<div class="panel-body h-200 list">--}}
                                    {{--<div class="stats-title">--}}
                                        {{--<h4><i class="fa fa-bar-chart text-warning" aria-hidden="true"></i> Traffic source</h4>--}}
                                    {{--</div>--}}
                                    {{--<div class="small">--}}
                                        {{--Total users from the beginning of activity. See detailed charts for more information locations and traffic source.--}}
                                    {{--</div>--}}

                                    {{--<div class="sparkline3"></div>--}}

                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-4">--}}
                                            {{--<small class="stat-label">Today</small>--}}
                                            {{--<h4 class="m-t-xs">170,20 <i class="fa fa-level-up text-warning"></i></h4>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-4">--}}
                                            {{--<small class="stat-label">Last month %</small>--}}
                                            {{--<h4 class="m-t-xs">%20,20 <i class="fa fa-level-down c-white"></i></h4>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-4">--}}
                                            {{--<small class="stat-label">Year</small>--}}
                                            {{--<h4 class="m-t-xs">2180,50 <i class="fa fa-level-up text-warning"></i></h4>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-8">--}}
                                {{--<div class="panel-body">--}}
                                    {{--<div class="text-center slight">--}}
                                    {{--</div>--}}

                                    {{--<div class="flot-chart" style="height: 160px;margin-top: 5px">--}}
                                        {{--<div class="flot-chart-content" id="flot-line-chart"></div>--}}
                                    {{--</div>--}}

                                    {{--<div class="small text-center">All active users from last month.</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-8">--}}
                    {{--<div class="panel panel-filled">--}}
                        {{--<div class="panel-body">--}}
                            {{--<table class="table table-responsive-sm">--}}
                                {{--<thead>--}}
                                {{--<tr>--}}
                                    {{--<th>Name</th>--}}
                                    {{--<th>Phone</th>--}}
                                    {{--<th>Street Address</th>--}}
                                    {{--<th>% Share</th>--}}
                                    {{--<th>City</th>--}}
                                    {{--<th>Action</th>--}}
                                {{--</tr>--}}
                                {{--</thead>--}}
                                {{--<tbody>--}}
                                {{--<tr>--}}
                                    {{--<td>Abraham</td>--}}
                                    {{--<td>076 9477 4896</td>--}}
                                    {{--<td>294-318 Duis Ave</td>--}}
                                    {{--<td>--}}
                                        {{--<div class="sparkline8"></div>--}}
                                    {{--</td>--}}
                                    {{--<td>Vosselaar</td>--}}
                                    {{--<td><a href="#" class="btn btn-default btn-xs">View</a></td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>Phelan</td>--}}
                                    {{--<td>0500 034548</td>--}}
                                    {{--<td>680-1097 Mi Rd.</td>--}}
                                    {{--<td>--}}
                                        {{--<div class="sparkline10"></div>--}}
                                    {{--</td>--}}
                                    {{--<td>Lavoir</td>--}}
                                    {{--<td><a href="#" class="btn btn-default btn-xs active">View</a></td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>Raya</td>--}}
                                    {{--<td>(01315) 27698</td>--}}
                                    {{--<td>Ap #289-8161 In Avenue</td>--}}
                                    {{--<td>--}}
                                        {{--<div class="sparkline11"></div>--}}
                                    {{--</td>--}}
                                    {{--<td>Santomenna</td>--}}
                                    {{--<td><a href="#" class="btn btn-default btn-xs">View</a></td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>Azalia</td>--}}
                                    {{--<td>0500 854198</td>--}}
                                    {{--<td>226-4861 Augue. St.</td>--}}
                                    {{--<td>--}}
                                        {{--<div class="sparkline12"></div>--}}
                                    {{--</td>--}}
                                    {{--<td>Newtown</td>--}}
                                    {{--<td><a href="#" class="btn btn-default btn-xs">View</a></td>--}}
                                {{--</tr>--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-4">--}}

                    {{--<div class="panel panel-b-accent">--}}
                        {{--<div class="panel-body text-center p-m">--}}
                            {{--<h2 class="font-light">--}}
                                {{--+280k downloads--}}
                            {{--</h2>--}}
                            {{--<small>New downloads from the last month.</small>--}}
                            {{--<br/>--}}
                            {{--120,312 <span class="slight"><i class="fa fa-play fa-rotate-270 c-white"> </i> -22%</span>--}}

                            {{--<div class="sparkline7 m-t-xs"></div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}

        </div>
    </section>
    <!-- End main content-->

</div>
<!-- End wrapper-->

<!-- Vendor scripts -->
<script src="{{asset('/theme/vendor/pacejs/pace.min.js')}}"></script>
<script src="{{asset('/theme/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('/theme/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/theme/vendor/toastr/toastr.min.js')}}"></script>
<script src="{{asset('/theme/vendor/sparkline/index.js')}}"></script>
<script src="{{asset('/theme/vendor/flot/jquery.flot.min.js')}}"></script>
<script src="{{asset('/theme/vendor/flot/jquery.flot.resize.min.js')}}"></script>
<script src="{{asset('/theme/vendor/flot/jquery.flot.spline.js')}}"></script>

<!-- App scripts -->
<script src="{{asset('/theme/scripts/luna.js')}}"></script>
{{--mover para a dashboard--}}
{{--<script>--}}
    {{--$(document).ready(function () {--}}

        {{--// Sparkline charts--}}
        {{--var sparklineCharts = function () {--}}
            {{--$(".sparkline").sparkline([20, 34, 43, 43, 35, 44, 32, 44, 52, 45], {--}}
                {{--type: 'line',--}}
                {{--lineColor: '#FFFFFF',--}}
                {{--lineWidth: 3,--}}
                {{--fillColor: '#43454D',--}}
                {{--height: 47,--}}
                {{--width: '100%'--}}
            {{--});--}}

            {{--$(".sparkline7").sparkline([10, 34, 13, 33, 35, 24, 32, 24, 52, 35], {--}}
                {{--type: 'line',--}}
                {{--lineColor: '#FFFFFF',--}}
                {{--lineWidth: 3,--}}
                {{--fillColor: '#f7af3e',--}}
                {{--height: 75,--}}
                {{--width: '100%'--}}
            {{--});--}}

            {{--$(".sparkline1").sparkline([0, 6, 8, 3, 2, 4, 3, 4, 9, 5, 3, 4, 4, 5, 1, 6, 7, 15, 6, 4, 0], {--}}
                {{--type: 'line',--}}
                {{--lineColor: '#2978BB',--}}
                {{--lineWidth: 3,--}}
                {{--fillColor: '#2978BB',--}}
                {{--height: 170,--}}
                {{--width: '100%'--}}
            {{--});--}}

            {{--$(".sparkline3").sparkline([-8, 2, 4, 3, 5, 4, 3, 5, 5, 6, 3, 9, 7, 3, 5, 6, 9, 5, 6, 7, 2, 3, 9, 6, 6, 7, 8, 10, 15, 16, 17, 15], {--}}

                {{--type: 'line',--}}
                {{--lineColor: '#fff',--}}
                {{--lineWidth: 3,--}}
                {{--fillColor: '#43454D',--}}
                {{--height: 60,--}}
                {{--width: '100%'--}}
            {{--});--}}

            {{--$(".sparkline5").sparkline([0, 6, 8, 3, 2, 4, 3, 4, 9, 5, 3, 4, 4, 5], {--}}
                {{--type: 'line',--}}
                {{--lineColor: '#f7af3e',--}}
                {{--lineWidth: 2,--}}
                {{--fillColor: '#2F323B',--}}
                {{--height: 20,--}}
                {{--width: '100%'--}}
            {{--});--}}
            {{--$(".sparkline6").sparkline([0, 1, 4, 2, 2, 4, 1, 4, 3, 2, 3, 4, 4, 2, 4, 2, 1, 3], {--}}
                {{--type: 'bar',--}}
                {{--barColor: '#f7af3e',--}}
                {{--height: 20,--}}
                {{--width: '100%'--}}
            {{--});--}}

            {{--$(".sparkline8").sparkline([4, 2], {--}}
                {{--type: 'pie',--}}
                {{--sliceColors: ['#f7af3e', '#404652']--}}
            {{--});--}}
            {{--$(".sparkline9").sparkline([3, 2], {--}}
                {{--type: 'pie',--}}
                {{--sliceColors: ['#f7af3e', '#404652']--}}
            {{--});--}}
            {{--$(".sparkline10").sparkline([4, 1], {--}}
                {{--type: 'pie',--}}
                {{--sliceColors: ['#f7af3e', '#404652']--}}
            {{--});--}}
            {{--$(".sparkline11").sparkline([1, 3], {--}}
                {{--type: 'pie',--}}
                {{--sliceColors: ['#f7af3e', '#404652']--}}
            {{--});--}}
            {{--$(".sparkline12").sparkline([3, 5], {--}}
                {{--type: 'pie',--}}
                {{--sliceColors: ['#f7af3e', '#404652']--}}
            {{--});--}}
            {{--$(".sparkline13").sparkline([6, 2], {--}}
                {{--type: 'pie',--}}
                {{--sliceColors: ['#f7af3e', '#404652']--}}
            {{--});--}}
        {{--};--}}

        {{--var sparkResize;--}}

        {{--// Resize sparkline charts on window resize--}}
        {{--$(window).resize(function () {--}}
            {{--clearTimeout(sparkResize);--}}
            {{--sparkResize = setTimeout(sparklineCharts, 100);--}}
        {{--});--}}

        {{--// Run sparkline--}}
        {{--sparklineCharts();--}}


        {{--// Flot charts data and options--}}
        {{--var data1 = [[0, 16], [1, 24], [2, 11], [3, 7], [4, 10], [5, 15], [6, 24], [7, 30]];--}}
        {{--var data2 = [[0, 26], [1, 44], [2, 31], [3, 27], [4, 36], [5, 46], [6, 56], [7, 66]];--}}

        {{--var chartUsersOptions = {--}}
            {{--series: {--}}
                {{--splines: {--}}
                    {{--show: true,--}}
                    {{--tension: 0.4,--}}
                    {{--lineWidth: 1,--}}
                    {{--fill: 1--}}

                {{--}--}}

            {{--},--}}
            {{--grid: {--}}
                {{--tickColor: "#404652",--}}
                {{--borderWidth: 0,--}}
                {{--borderColor: '#404652',--}}
                {{--color: '#404652'--}}
            {{--},--}}
            {{--colors: ["#f7af3e", "#DE9536"]--}}
        {{--};--}}

        {{--$.plot($("#flot-line-chart"), [data2, data1], chartUsersOptions);--}}


        {{--// Run toastr notification with Welcome message--}}
        {{--setTimeout(function () {--}}
            {{--toastr.options = {--}}
                {{--"positionClass": "toast-top-right",--}}
                {{--"closeButton": true,--}}
                {{--"progressBar": true,--}}
                {{--"showEasing": "swing",--}}
                {{--"timeOut": "6000"--}}
            {{--};--}}
            {{--toastr.warning('<strong>You entered to LUNA</strong> <br/><small>Premium admin theme with Dark UI style. </small>');--}}
        {{--}, 1600)--}}


    {{--});--}}
{{--</script>--}}
 @yield('js')
</body>

</html>