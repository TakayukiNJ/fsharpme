<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FSHARP') }}</title>

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="img/icon/favicon.ico"/>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/colorbox.css">
    <link rel="stylesheet" href="/css/range.css">
    <!--<link rel="stylesheet" href="/css/reset.css">-->
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>
<body>
    <!--<div id="app">-->
        <nav class="navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- ハンバーガーみたいな三本線 -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- ロゴ -->
                    <a class="navbar-brand" id="left" href="{{ url('/menu') }}">
                         <!--<img src="{ { url('/') } }/../img/structure/logo.png" class="logo">-->
                         <!--{{ config('app.name', 'NJ10') }}-->
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- ヘッダーの左側 -->
                    <form class="navbar-form navbar-left" action="{{ url('/home/home_search_outer_member_process') }}">
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" name="search">
                        <div class="input-group-btn">
                          <button class="btn btn-default" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                          </button>
                        </div>
                      </div>
                    </form>
                    <!--詳細設定-->
                    <!--<ul class="nav navbar-nav">-->
                    <!--    <li>-->
                    <!--        <a href="{{ url('/home/home_search_outer_member') }}" onClick="H03_1_run();return false;">@lang('app.user search')</a>-->
                            
                    <!--    </li>-->
                    <!--</ul>-->
                    
                    <!-- ヘッダーの右側 -->
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::guest())
                            <li><a href="{{ url('/register') }}"><span class="glyphicon glyphicon-user">@lang('app.register')</a></li>
                            <li><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in">@lang('app.login')</a></li>
                        @else
                            @if ((Auth::user()->name) == "manalangaoka" )
                            <li><a href="https://goo.gl/YZLao1" target="_blank">@lang('app.ask my page')</a></li>
                            <!-- NPO（Vision） -->
                            <li class="dropdown">
                                
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                2hj<span class="caret"></span>
                            </a>
                                <ul class="dropdown-menu" role="menu">
                                    <!-- ホーム画面 -->
                                    <li><a href="{{ url('/2hj') }}" onClick="C01_run();return false;">@lang('app.npo page')</a></li>
                                    <li><a href="{{ url('/home') }}" onClick="C01_run();return false;">@lang('app.npo page edit')</a></li>
                                    <li><a href="{{ url('/npo_registers/1') }}" onClick="C01_run();return false;">@lang('app.npo page edit')(test)</a></li><!-- 将来、ここはチャットに変更 -->
                                    <li><a href="{{ url('/connect/vision_sell_regist') }}" onClick="C01_run();return false;">@lang('app.return setting')</a></li><!-- 将来、ここはチャットに変更 -->
                                    <!-- 設定画面 -->
                                    <!--<li><a href="{{ url('/npo/setting') }}">@lang('app.npo setting')</a></li>-->
                                    <!-- チャット画面 -->
                                    <!--<li><a href="{{ url('/chat') }}">チャット</a></li>-->
                                    <!-- ログアウト -->
                                    
                                    <!-- developer mode表示 -->
                                    <!--<li>-->
                                    <!--    <form action="{{ url('/testviews') }}" method="POST" class="form-horizontal">-->
                                    <!--        {{ csrf_field() }}-->
                                    <!--        <button type="submit">-->
                                    <!--            developer's window-->
                                    <!--        </button>-->
                                    <!--    </form>-->
                                    <!--</li>-->
                                </ul>
                            </li>
                            @else
                            <li><a href="https://goo.gl/YZLao1" target="_blank">@lang('app.make/ask my page')</a></li>
                            @endif
                            
                            <!-- ユーザー -->
                            <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                                <ul class="dropdown-menu" role="menu">
                                    <!-- ホーム画面 -->
                                    <li><a href="{{ url('home/home_own_timeline') }}">@lang('app.mypage')</a></li>
                                    <li><a href="{{ url('home/home_register') }}">@lang('app.mypage edit')</a></li>
                                    <!--<li><a href="{{ url('/home') }}">お気に入り</a></li>-->
                                    <!-- 設定画面 -->
                                    <li><a href="{{ url('/setting') }}">@lang('app.setting')</a></li>
                                    <!-- チャット画面 -->
                                    <!--<li><a href="{{ url('/chat') }}">チャット</a></li>-->
                                    <li><a href="https://goo.gl/YZLao1" target="_blank">@lang('app.help')</a></li>
                                    <!-- ログアウト -->
                                    <li><a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            @lang('app.logout')
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

    <div class="container">
        @yield('header')
        @yield('content')
    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ url('/') }}/../js/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!-- <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> -->
    @yield('scripts')
</body>
</html>