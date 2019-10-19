@extends('layouts.welcome_common')
@include('layouts.welcome_head')
@include('layouts.welcome_script')
@include('layouts.nav_lp')
@include('layouts.welcome_script')
@section('welcome_content')
<body class="full-screen register">
    <div class="wrapper">
        <div class="page-header" style="background-image: url('../img/farid-askerov.jpg');">
            <div class="filter"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7 col-12 ml-auto">
                        <div class="info info-horizontal">
                            <div class="icon">
                                <i class="fa fa-umbrella"></i>
                            </div>
                            <div class="description">
                                <h3> 人とお金の流れを変える </h3>
                                <p>寄付をすると、ユーザー名（もしくは法人名）がそのページに記載されます。集まった寄付金は団体登録者にお渡しします。</p>
                            </div>
                        </div>
                        <div class="info info-horizontal">
                            <div class="icon">
                                <i class="fa fa-map-signs"></i>
                            </div>
                            <div class="description">
                                <h3> プロジェクトに参画・公開 </h3>
                                <p>世界中の解決すべき課題に真剣に取り組むプロジェクトに関わることができます。また、自分でプロジェクトを作って簡単に公開ができます。</p>
                            </div>
                        </div>
                        <div class="info info-horizontal">
                            <div class="icon">
                                <i class="fa fa-user-secret"></i>
                            </div>
                            <div class="description">
                                <h3> <strong>NPO版 ふるさと納税</strong> </h3>
                                <p><a href="https://www.npo-homepage.go.jp/npoportal" target="_blank">内閣府公式サイト</a>に掲載されている認定NPO法人に、仮に毎月<strong>1,000</strong>円の寄付をした場合、最大<strong>5,000</strong>円が確定申告で税務署から戻ってきます。</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-5 col-12 mr-auto">
                        <div class="card card-register">
                            {{--
                            <a href="" class="btn btn-round btn-facebook">
                                <i class="fa fa-facebook" aria-hidden="true"></i> Facebook で 登録
                            </a>
                            <div class="division">
                                <div class="line l"></div>
                                <span>or</span>
                                <div class="line r"></div>
                            </div>
                            --}}
                            <form class="register-form" role="form" method="POST" action="{{ url('/register') }}">
                                {{ csrf_field() }}
                                {{-- ユーザー名 --}}
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <input id="name" type="text" class="form-control" name="name" placeholder="ユーザー名" value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block division">
                                        <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                {{-- メールアドレス --}}
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input id="email" type="email" class="form-control" name="email" placeholder="メールアドレス" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block division">
                                        <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                {{-- パスワード --}}
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input id="password" type="password" class="form-control" placeholder="パスワード" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block division">
                                        <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                {{-- パスワード確認 --}}
                                <div class="form-group division">
                                    <input id="password-confirm" type="password" class="form-control" placeholder="パスワード確認" name="password_confirmation" required>
                                </div>
                                {{-- 利用規約とプライバシーポリシー --}}
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" required>
                                        <span class="form-check-sign">
                                            <strong><a href="{{ url('/terms') }}" target="_blank"> 利用規約 および</a></strong><strong><a href="{{ url('/privacy_policy') }}" target="_blank"> プライバシーポリシー に同意する(チェックを入れる)</a></strong>
                                        </span>
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-block btn-primary btn-round">登録</button>
                            </form>
                            <div class="login">
                                <p>Already have an account? <a href="#0">Log in</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
@include('layouts.footer')