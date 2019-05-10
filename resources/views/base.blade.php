<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900' rel='stylesheet' type='text/css'>

    <!-- Page title -->
    <title>Commcepta | Desafio</title>

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

<div class="wrapper">

    @include('layout.header')

    @include('layout.sidebar')

    <!-- Main content-->
    <section class="content">
        <div class="container-fluid">
            @yield("content")
        </div>
    </section>
    <!-- End main content-->

</div>

<!-- Vendor scripts -->
<script src="{{asset('/theme/vendor/pacejs/pace.min.js')}}"></script>
<script src="{{asset('/theme/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('/theme/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/theme/vendor/toastr/toastr.min.js')}}"></script>

<!-- App scripts -->
<script src="{{asset('/theme/scripts/luna.js')}}"></script>
 @yield('js')
</body>

</html>