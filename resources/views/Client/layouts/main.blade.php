<!DOCTYPE html>
<html lang="en">
<head>
    <title> @yield('title')</title>
    <base href="{{asset('')}}">
    <meta charset="utf-8">
    <meta name="author" content="pixelhint.com">
    <meta name="description" content="Magnetic is a stunning responsive HTML5/CSS3 photography/portfolio website  template"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="client/css/reset.css">
    <link rel="stylesheet" type="text/css" href="client/css/main.css">
    {{--Bootstap--}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>

<body>
@include("Client.layouts.leftmenu")
@yield('content')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="client/js/jquery.js"></script>
<script type="text/javascript" src="client/js/main.js"></script>
<script>
    setTimeout(function() {
        $('#mydiv').fadeOut('fast');
    }, 2000)
</script>
</body>
</html>
