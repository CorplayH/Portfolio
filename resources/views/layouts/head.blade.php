<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>My portfolio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="keywords" content="portfolio, resume, projects" />
    <meta name="Developer" content="Corplay" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="uToken" content="{{$uToken}}">
    <link rel="shortcut icon" href="{{asset('/org/sunshine')}}/favicon.ico">

    <link rel="stylesheet" href="{{asset('/css')}}/app.css">
    <link rel="stylesheet" href="{{asset('/org/layui/css')}}/layui.css">
    <link rel="stylesheet" href="{{asset('/org/sunshine/css')}}/normalize.css">
    <link rel="stylesheet" href="{{asset('/org/sunshine/css')}}/transition-animations.css">
    <link rel="stylesheet" href="{{asset('/org/sunshine/css')}}/owl.carousel.css">
    <link rel="stylesheet" href="{{asset('/org/sunshine/css')}}/magnific-popup.css">
    <link rel="stylesheet" href="{{asset('/org/sunshine/css')}}/animate.css">
    @stack('cssLink')
    <link rel="stylesheet" href="{{asset('/org/sunshine/css')}}/main.css" type="text/css">

    <script src="{{asset('/org/sunshine/js')}}/jquery-2.1.3.min.js"></script>
    <script src="{{asset('/org/sunshine/js')}}/modernizr.custom.js"></script>
    <script src='https://www.google.com/recaptcha/api.js?explicit&hl=en' async defer></script>

</head>
