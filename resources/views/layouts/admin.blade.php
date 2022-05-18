
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title')</title>


<link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">

<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

 <link rel="stylesheet" href="{{ asset('css/app.css') }}">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

@yield('css')

</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">

@include('layouts.partials.navbar')
@include('layouts.partials.sidebar')

<div class="content-wrapper">

@yield('content')

</div>

@include('layouts.partials.footer')

<aside class="control-sidebar control-sidebar-dark">

</aside>

</div>


<script src="{{ asset('js/app.js') }}"></script>

@yield('js')
</body>
</html>
