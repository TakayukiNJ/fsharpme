@section('nav_lp')
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute">
        <div class="container">
            <div class="navbar-translate">
                <div class="navbar-header">
                    @if (Auth::guest())
                    <a class="navbar-brand" href="{{ url('/') }}">F♯</a>
                    @elseif (Auth::user()->npo)
                    <a class="navbar-brand" href="/{{ Auth::user()->npo }}">{{ Auth::user()->npo }}</a>
                    @else
                    <a class="navbar-brand" href="{{ url('/') }}">F♯</a>
                    {{--<a class="navbar-brand" href="{{ url('/') }}/{{ Auth::user()->npo }}">F♯</a>--}}
                    @endif
                </div>
                <button class="navbar-toggler navbar-burger" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar"></span>
                    <span class="navbar-toggler-bar"></span>
                    <span class="navbar-toggler-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ml-auto">
                    {{--
                    <form class="form-inline" action="{{ url('/npo_registers') }}">
                        <input class="form-control mr-sm-2 no-border" type="text" placeholder="Search" name="search">
                        <button type="submit" class="btn btn-primary btn-just-icon btn-round"><i class="nc-icon nc-zoom-split"></i></button>
                    </form>
                    --}}

                    @if (Auth::guest())
                        <li class="nav-item">
                            <a class="nav-link" data-scroll="true" href="{{ url('/login') }}">
                                @lang('app.login')
                            </a>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="btn btn-round btn-danger" data-toggle="modal" data-target="#loginModal">
                                @lang('app.register')
                            </button>
                            <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="false">
                                <div class="modal-dialog modal-register">
                                    <div class="modal-content">
                                        <div class="modal-header no-border-header text-center">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h3 class="modal-title text-center">&nbsp;ようこそ！</h3>
                                            <p>まずはご登録をお願いします。</p>
                                        </div>
                                        <div class="modal-body">
                                            <form class="register-form" role="form" method="POST" action="{{ url('/register') }}">
                                                {{ csrf_field() }}
                                                {{-- ニックネーム(半角英数) --}}
                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label for="name">ニックネーム(半角英数)</label>
                                                    <input id="name" type="text" class="form-control" name="name" placeholder="@lang('fsharpTaro')" value="{{ old('name') }}" required autofocus>
                                                    @if ($errors->has('name'))
                                                        <span class="help-block division">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                {{-- メールアドレス --}}
                                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                    <label for="email">メールアドレス</label>
                                                    <input id="email" type="email" class="form-control" name="email" placeholder="@lang('******@gmail.com')" value="{{ old('email') }}" required>
                                                    @if ($errors->has('email'))
                                                        <span class="help-block division">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                {{-- パスワード --}}
                                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                    <label for="password">パスワード (8文字以上)</label>
                                                    <input id="password" type="password" class="form-control" placeholder="********" name="password" required>
                                                    @if ($errors->has('password'))
                                                        <span class="help-block division">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                {{-- パスワード確認 --}}
                                                <div class="form-group division">
                                                    <label for="password">パスワード (確認)</label>
                                                    <input id="password-confirm" type="password" class="form-control" placeholder="********" name="password_confirmation" required>
                                                </div>
                                                {{-- 利用規約とプライバシーポリシー --}}
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" required>
                                                        <span class="form-check-sign">
                                                            本サイトの<strong><a href="{{ url('/terms') }}" target="_blank"> 利用規約 </a>および</strong><strong><a href="{{ url('/privacy_policy') }}" target="_blank"> プライパシーポリシー </a></strong>に同意する（チェックを入れる）
                                                        </span>
                                                    </label>
                                                </div>
                                                <button type="submit" class="btn btn-block btn-primary btn-round">@lang('register')</button>
                                            </form>
                                            <div class="modal-footer no-border-footer">
                                                <p>すでにご登録済みの方は <a href="{{ url('/login') }}">こちら</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @else
                        @if ((Auth::user()->npo) == "")
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle"  data-toggle="dropdown" href="javascript:void(0)">{{ Auth::user()->name }}</a>
                            <ul class="dropdown-menu dropdown-menu-right dropdown-danger">
                                <a class="dropdown-item" href="{{ url('/npo_registers/create') }}"><i class="nc-icon nc-money-coins"></i>&nbsp;@lang('app.registerOrg')</a>
                                {{--<a target="_blank" class="dropdown-item" href="https://form.run/@fsharp"><i class="nc-icon nc-money-coins"></i>&nbsp; 団体登録</a>--}}
                        @else
                        {{-- ここ自動化しないとな。 --}}
                        @if(Auth::user()->total_deposit)
                        <li class="nav-item">
                            <a class="nav-link" href="https://goo.gl/YZLao1" target="_blank">出金金額（月末）：{{Auth::user()->total_deposit}}円</a>
                        </li>
                        @endif

                        <!-- message 用編集 -->
                        <!--GRAY-->
                        <li class="nav-item">
                            <a href="{{ url('/') }}/chat" class="btn btn-just-icon">
                                <i class="nc-icon nc-email-85"></i>
                            </a>
                        </li>
                        <!--RED-->
                        {{--

                            <li class="nav-item dropdown">
                                <a class="btn btn-just-icon btn-danger  " data-toggle="dropdown">
                                    <i class="nc-icon nc-email-85"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right dropdown-wide dropdown-notification">
                                    <li class="dropdown-header">
                                        You have 7 unread notifications
                                    </li>
                                    <li>
                                        <ul class="dropdown-notification-list scroll-area">
                                            <a href="#paper-kit" class="notification-item">
                                                <div class="notification-text">
                                                    <span class="label label-icon label-success"><i class="nc-icon nc-chat-33"></i></span>
                                                    <span class="message"><b>Patrick</b> mentioned you in a comment.</span>
                                                    <br />
                                                    <span class="time">20min ago</span>

                                                    <button class="btn btn-just-icon read-notification btn-round">
                                                        <i class="nc-icon nc-check-2"></i>
                                                    </button>
                                                </div>
                                            </a>


                                            <a href="#paper-kit" class="notification-item">
                                               <div class="notification-text">
                                                    <span class="label label-icon label-info"><i class="nc-icon nc-alert-circle-i"></i></span>

                                                    <span class="message">Our privacy policy changed!</span>
                                                    <br />
                                                    <span class="time">1day ago</span>
                                                </div>
                                            </a>

                                            <a href="#paper-kit" class="notification-item">
                                                <div class="notification-text">
                                                    <span class="label label-icon label-warning"><i class="nc-icon nc-ambulance"></i></span>

                                                    <span class="message">Please confirm your email address.</span>
                                                    <br />
                                                    <span class="time">2days ago</span>
                                                </div>
                                            </a>
                                            <a href="#paper-kit" class="notification-item">
                                                <div class="notification-text">
                                                    <span class="label label-icon label-primary"><i class="nc-icon nc-paper"></i></span>
                                                    <span class="message">Have you thought about marketing?</span>
                                                    <br />
                                                    <span class="time">3days ago</span>
                                                </div>
                                            </a>
                                        </ul>
                                    </li>
                                    <!-- end scroll area -->
                                    <li class="dropdown-footer">
                                        <ul class="dropdown-footer-menu">
                                            <li>
                                                <a href="#paper-kit">Mark all as read</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>

                                <!--<span class="label label-danger notification-bubble">2</span>-->
                            </li>
                            --}}

                        <li class="nav-item dropdown">
                            @if($personal_info ?? '')
                                @if($personal_info->image_id)
                                    <a href="#paper-kit" class="nav-link navbar-brand" data-toggle="dropdown" width="30" height="30" style="margin-left:17px">
                                        <div class="profile-photo-small">
                                            <img src="{{ asset('storage/img/personal_info/'.$personal_info->image_id) }}" alt="{{ Auth::user()->name }}" class="img-circle img-responsive img-no-padding">
                                        </div>
                                    </a>
                                @else
                                    <a class="nav-link dropdown-toggle"  data-toggle="dropdown" href="javascript:void(0)">{{ Auth::user()->name }}</a>
                                @endif
                            @else
                                <a class="nav-link dropdown-toggle"  data-toggle="dropdown" href="javascript:void(0)">{{ Auth::user()->name }}</a>
                            @endif

                            <ul class="dropdown-menu dropdown-menu-right dropdown-danger">
                                <a class="dropdown-item" href="{{ url('/') }}/{{ Auth::user()->npo }}"><i class="nc-icon nc-money-coins"></i>{{ Auth::user()->npo }}</a>
                        @endif
                                <a class="dropdown-item" href="{{ url('home') }}/{{ Auth::user()->name }}"><i class="nc-icon nc-badge"></i> @lang('app.mypage')</a>
                                <a class="dropdown-item" href="{{ url('home/home_register') }}"><i class="nc-icon nc-settings"></i> @lang('setting')</a>
                                <a class="dropdown-item" href="{{ url('/logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();"><i class="nc-icon nc-spaceship"></i> @lang('app.logout')</a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endsection
