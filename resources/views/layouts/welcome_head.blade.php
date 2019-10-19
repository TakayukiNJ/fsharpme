@section('welcome_head')

    <meta charset="utf-8" />
    <link rel="shortcut icon" href="{{ url('/') }}/../img/icon/favicon.ico" type="img/icon/favicon.ico"/>
    
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('/') }}/../img/apple-icon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'F♯') }}</title>
    
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/paper-kit.css?v=2.1.0" rel="stylesheet"/>
    <link href="css/demo.css" rel="stylesheet" />
    
    <!-- Fonts and icons -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/nucleo-icons.css" rel="stylesheet">

@endsection