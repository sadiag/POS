
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<title>@yield('title')</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


@yield('css')

</head>

<body class="hold-transition login-page">
<div class="login-box">
<div class="login-logo">
<a href="../../index2.html">{{ config('app.name') }}</a>
</div>

<div class="card">
<div class="card-body login-card-body">
@yield('content')

</div>

</div>
</div>


<script src="{{ asset('js/app.js') }}"></script>

@yield('js')

</body>
</html>
