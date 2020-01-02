@extends('home.common_home_lp')
@include('home.head_profile')
@include('layouts.nav_lp')
@include('layouts.script')
@section('content')
<div class="wrapper">
    <div class="page-header page-header-small" style="background-image: url('{{ url('/') }}/../img/sections/joshua-earles.jpg');">
        <div class="filter"></div>
    </div>
    <div class="profile-content section">
        <div class="container">
            <div class="row">
                <div class="profile-picture">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new img-no-padding text-center">
                            @if($this_personal_info)
                                @if($this_personal_info->image_id)
                                    <img src="{{ asset('storage/img/personal_info/'.$this_personal_info->image_id) }}" alt="{{ $this_auth->name }}">
                                @else
                                    <img src="{{ url('/') }}/../img/placeholder.jpg" alt="default">
                                @endif
                            @else
                                @if(Auth::user())
                                @if(Auth::user()->name != $this_auth->name)
                                <br><br><br>
                                @endif
                                @else
                                <br><br><br>
                                @endif
                            @endif
                        </div>
                        <div class="name">
                            <h4 class="title text-center">{{ $this_auth->name }}'s Page @if($this_personal_info)<br><small>{{ $this_personal_info->description }}</small>@endif</h4>
                            @if($this_auth->point != 0)
                            <div class="text-center">
                                <button type="button" class="btn btn-outline-default" data-toggle="modal" data-target="#SDGscore">
                                    SDGsスコア
                                </button>
                            </div>
                            <div class="modal fade" id="SDGscore" tabindex="-1" role="dialog" aria-hidden="false">
                                <div class="modal-dialog modal-register">
                                    <div class="modal-content">
                                        <div class="modal-header no-border-header text-center">
                                            <div class="chart-container" style="position: relative; height:100vh">
                                                <canvas id="myPieChart"></canvas>
                                            </div>
                                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
                                            <script>
                                                var ctx = document.getElementById("myPieChart");
                                                var myPieChart = new Chart(ctx, {
                                                    type: 'pie',
                                                    cutoutPercentage: 50,
                                                    data: {
                                                        labels: [
                                                            @if($this_auth->sdgs1 != 0)
                                                            "貧困をなくそう",
                                                            @endif
                                                            @if($this_auth->sdgs2 != 0)
                                                            "飢餓をゼロに",
                                                            @endif
                                                            @if($this_auth->sdgs3 != 0)
                                                            "すべての人に福祉と健康を",
                                                            @endif
                                                            @if($this_auth->sdgs4 != 0)
                                                            "質の高い教育をみんなに",
                                                            @endif
                                                            @if($this_auth->sdgs5 != 0)
                                                            "ジェンダー平等を実現しよう",
                                                            @endif
                                                            @if($this_auth->sdgs6 != 0)
                                                            "安全な水とトイレを世界中に",
                                                            @endif
                                                            @if($this_auth->sdgs7 != 0)
                                                            "エネルギーをみんなに そしてクリーンに",
                                                            @endif
                                                            @if($this_auth->sdgs8 != 0)
                                                            "働きがいも 経済成長も",
                                                            @endif
                                                            @if($this_auth->sdgs9 != 0)
                                                            "産業と技術革新の基盤をつくろう",
                                                            @endif
                                                            @if($this_auth->sdgs10 != 0)
                                                            "人や国の不平等を無くそう",
                                                            @endif
                                                            @if($this_auth->sdgs11 != 0)
                                                            "住み続けられるまちづくりを",
                                                            @endif
                                                            @if($this_auth->sdgs12 != 0)
                                                            "つくる責任 つかう責任",
                                                            @endif
                                                            @if($this_auth->sdgs13 != 0)
                                                            "気候変動に具体的な対策を",
                                                            @endif
                                                            @if($this_auth->sdgs14 != 0)
                                                            "海の豊かさを守ろう",
                                                            @endif
                                                            @if($this_auth->sdgs15 != 0)
                                                            "陸の豊かさも守ろう",
                                                            @endif
                                                            @if($this_auth->sdgs16 != 0)
                                                            "平和と公正をすべての人に",
                                                            @endif
                                                            @if($this_auth->sdgs17 != 0)
                                                            "パートナーシップで目標を達成しよう"
                                                            @endif
                                                        ],
                                                        datasets: [{
                                                            backgroundColor: [
                                                                @if($this_auth->sdgs1 != 0)
                                                                "#eb1c2d",
                                                                @endif
                                                                @if($this_auth->sdgs2 != 0)
                                                                "#d3a029",
                                                                @endif
                                                                @if($this_auth->sdgs3 != 0)
                                                                "#279b48",
                                                                @endif
                                                                @if($this_auth->sdgs4 != 0)
                                                                "#c31f33",
                                                                @endif
                                                                @if($this_auth->sdgs5 != 0)
                                                                "#ef402b",
                                                                @endif
                                                                @if($this_auth->sdgs6 != 0)
                                                                "#00aed9",
                                                                @endif
                                                                @if($this_auth->sdgs7 != 0)
                                                                "#fdb714",
                                                                @endif
                                                                @if($this_auth->sdgs8 != 0)
                                                                "#911838",
                                                                @endif
                                                                @if($this_auth->sdgs9 != 0)
                                                                "#f36d25",
                                                                @endif
                                                                @if($this_auth->sdgs10 != 0)
                                                                "#e11384",
                                                                @endif
                                                                @if($this_auth->sdgs11 != 0)
                                                                "#f99d26",
                                                                @endif
                                                                @if($this_auth->sdgs12 != 0)
                                                                "#cf8d2a",
                                                                @endif
                                                                @if($this_auth->sdgs13 != 0)
                                                                "#48773e",
                                                                @endif
                                                                @if($this_auth->sdgs14 != 0)
                                                                "#017dbc",
                                                                @endif
                                                                @if($this_auth->sdgs15 != 0)
                                                                "#3db049",
                                                                @endif
                                                                @if($this_auth->sdgs16 != 0)
                                                                "#02558b",
                                                                @endif
                                                                @if($this_auth->sdgs17 != 0)
                                                                "#183667"
                                                                @endif
                                                            ],
                                                            data: [
                                                                @for ($s = 1; $s < 18; $s++)
                                                                <?php $sdgs = "sdgs".$s ?>
                                                                    @if($this_auth->$sdgs != 0)
                                                                    {{$this_auth->$sdgs}},
                                                                    @endif
                                                                @endfor
                                                            ]
                                                        }]
                                                    },
                                                    options: {
                                                        cutoutPercentage: 55,
                                                        maintainAspectRatio: false,
                                                        title: {
                                                            display: true,
                                                            text: 'SDGsスコア：{{ $this_auth->point }}'
                                                        }
                                                    }
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @if(Auth::user())
                @if(Auth::user()->name == $this_auth->name)
                    @if(Auth::user()->email_verified_at)
                        <div class="row">
                            <div class="col-md-6 ml-auto mr-auto text-center">
                                <!--<p>An artist of considerable range, Chet Faker — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music, giving it a warm, intimate feel with a solid groove structure. </p>-->
                                <!--<br />-->
                                <a href="{{ url('/home/home_register') }}" class="btn btn-outline-default btn-round"><i class="fa fa-cog"></i> マイページ設定</a>
                            </div>
                        </div>
                    @else
                        @if (session('resent'))
                            <div class="alert alert-success text-center" role="alert">
                                新しい認証のリンクを、登録したメールアドレスに送信しました。
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6 ml-auto mr-auto text-center">
                                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-default btn-round">メール認証</button>.
                                </form>
                            </div>
                        </div>
                    @endif
                @endif
            @endif

            <br/>
            <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                    <ul class="nav nav-tabs" role="tablist">
                        @if(Auth::user())
                        @if(Auth::user()->name == $this_auth->name)
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#new" role="tab">新着</a>
                        </li>
                        @endif
                        @endif
                        @if($this_auth->npo != "")
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#myProjects" role="tab">団体</a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#supporting" role="tab">バッジ</a>
                        </li>
                        @if($follower_count != 0)
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#follow" role="tab">フォロー</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
            {{-- Tab panes --}}
            <div class="tab-content">
                @if($follower_count != 0)
                <div class="tab-pane" id="follow" role="tabpanel">
                    <div class="row">
                        <div class="col-md-6 ml-auto mr-auto">
                            <ul class="list-unstyled follows">
                                @for($i = 0; $i < $follower_count; $i++)
                                <li>
                                    <div class="row">
                                        <div class="col-md-1 col-2">
                                        <!-- {{$i + 1}} -->
                                            <!--<img src="../assets/img/faces/clem-onojeghuo-3.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">-->
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <h6>{{ $followers[$i]->followee_id }}
                                                {{--<small>--}}
                                                    {{--<br><a href="/{{ $npo_info_proval[$i]->title }}">@ {{ $npo_info_proval[$i]->title }}</a>--}}
                                                    {{--<br>金額：{{ number_format($npo_info_proval[$i]->support_amount) }}円--}}
                                                    {{--<br>支援数：{{ number_format($npo_info_proval[$i]->buyer) }}/{{ number_format($npo_info_proval[$i]->support_limit) }}--}}
                                                    {{--@if($npo_info_proval[$i]->support_contents != '')--}}
                                                        {{--<br>リターン：{{ $npo_info_proval[$i]->support_contents }}--}}
                                                    {{--@endif--}}
                                                    {{--@if($npo_info_proval[$i]->support_contents_detail)--}}
                                                        {{--<br>期限：{{ Carbon\Carbon::parse($npo_info_proval[$i]->support_contents_detail)->format('Y年m月d日H:i') }}--}}
                                                    {{--@endif--}}
                                                {{--</small>--}}
                                            </h6>
                                        </div>
                                        <div class="col-md-3 col-2">
                                            <a class="btn btn-outline-default" href="/{{ $followers[$i]->followee_id }}">GO!</a>
                                        </div>
                                    </div>
                                </li>
                                <hr />
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
                <div class="tab-pane" id="supporting" role="tabpanel">
                    <div class="row">
                        <div class="col-md-6 ml-auto mr-auto">
                            <ul class="list-unstyled follows">
                                @if($npo_info_enterprise)
                                    <h4 class="text-muted text-center">【法人バッジ（履歴）】</h4>
                                    <br>
                                    @for($i = 0; $i < count($npo_info_enterprise); $i++)
                                        <li>
                                            <div class="row">
                                                <div class="col-md-2 col-3">
                                                    {{$i + 1}}
                                                    <!--<img src="../assets/img/faces/clem-onojeghuo-3.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">-->
                                                </div>
                                                <div class="col-md-7 col-4">
                                                    <h6><a href="/{{$npo_info_enterprise[$i]->title}}/{{ $npo_info_enterprise[$i]->npo_name }}">{{ $npo_info_enterprise[$i]->subtitle }}</a><br><small>{{ $npo_info_enterprise[$i]->title }}</small></h6></h6>
                                                </div>
                                                <div class="col-md-3 col-2">
                                                    <a class="btn btn-outline-default" href="/{{$npo_info_enterprise[$i]->title}}/{{ $npo_info_enterprise[$i]->npo_name }}">GO!</a>
                                                    @if($npo_info_enterprise[$i]->url)
                                                    <br><br><a class="btn btn-xs btn-outline-default" href="/{{ $npo_info_enterprise[$i]->url }}" target="_blank">外部LINK</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                        <hr>
                                    @endfor
                                    <br>
                                @endif
                                @if($npo_info_personal)
                                    <!--<h4 class="text-muted text-center">【個人バッジ（履歴）】</h4>-->
                                    <br><br><br><br>
                                    @for($i = 0; $i < count($npo_info_personal); $i++)
                                        <li>
                                            <div class="row">
                                                <div class="col-md-6 col-5">
                                                <br>
                                                    <a href="/{{ $npo_info_personal[$i]->title }}/{{ $npo_info_personal[$i]->npo_name }}" class="badge" data-toggle="modal" data-target="#{{ $npo_info_personal[$i]->npo_name }}" aria-label="Close">
                                                        <svg viewBox="0 0 210 210">
                                                            <g stroke="none" fill="none">
                                                                <path d="M22,104.5 C22,58.9365081 58.9365081,22 104.5,22 C150.063492,22 187,58.9365081 187,104.5" id="top"></path>
                                                                <path d="M22,104.5 C22,150.063492 58.9365081,187 104.5,187 C150.063492,187 187,150.063492 187,104.5" id="bottom"></path>
                                                            </g>
                                                    		<circle cx="105" cy="105" r="62" stroke="currentColor" stroke-width="1" fill="none" />
                                                            <text width="80" font-size="8" fill="currentColor">
                                                                <textPath startOffset="50%" text-anchor="middle" alignment-baseline="middle" xlink:href="#top">
                                                                    {{$npo_info_personal[$i]->npo_name}}
                                                                </textPath>
                                                            </text>
                                                            <text width="80" font-size="8" fill="currentColor">
                                                                <textPath startOffset="50%" text-anchor="middle" alignment-baseline="middle" xlink:href="#bottom">
                                                                    @if($npo_info_personal[$i]->support_contents_detail)
                                                                    利用期限:{{ Carbon\Carbon::parse($npo_info_personal[$i]->support_contents_detail)->format('Y年m月d日H:i') }}
                                                                    @endif
                                                                </textPath>
                                                            </text>
                                                        </svg>
                                                        <span><b>{{ $premierData_personal[$i]->participants }}</b>口保有</b></span>
                                                    </a>
                                                    {{-- ポップアップの中身 --}}
                                                    <div class="modal fade" id="{{ $npo_info_personal[$i]->npo_name }}" tabindex="-1" role="dialog" aria-hidden="false">
                                                        <div class="modal-dialog modal-register">
                                                            <div class="modal-content">
                                                                <div class="modal-header no-border-header text-center">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                      <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                    <h3 class="modal-title text-center">{{ $npo_info_personal[$i]->subtitle }}</h3>
                                                                    <p>{{ $npo_info_personal[$i]->title }}</p>
                                                                </div>
                                                                {{-- SNS share --}}
                                                                <div class="containersns">
                                                                    {{-- Facebook --}}
                                                                    <div class="fb-like" data-href="https://fsharp.me/{{ $npo_info_personal[$i]->npo_name }}" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
                                                                    <script async defer src="https://connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v3.2&appId=1545608625538119&autoLogAppEvents=1"></script>
                                                                    <div>　</div>
                                                                    {{-- Twitter --}}
                                                                    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw&text={!! $npo_info_personal[$i]->title !!} {!! $npo_info_personal[$i]->subtitle !!}の支援のために。ひとりでも多くの方に広めてください♪" class="twitter-share-button" data-show-count="false"></a>
                                                                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                                                                    <div>　</div>
                                                                    {{-- LINE --}}
                                                                    <div class="line-it-button" data-lang="ja" data-type="share-a" data-ver="2" data-url="https://fsharp.me/{{ $npo_info_personal[$i]->npo_name }}" style="display: none;"></div>
                                                                    <script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>
                                                                </div>
                                                                <style type="text/css">
                                                                    .containersns {
                                                                      display: flex;
                                                                      justify-content: center;
                                                                      align-items: center;
                                                                    }
                                                                </style>
                                                                {{-- SDGs --}}
                                                                <div class="containersns">
                                                                    <div class="avatar">
                                                                        <br>
                                                                        @if($npo_info_personal[$i]->certificated_npo)
                                                                        <a href="https://www.npo-homepage.go.jp/npoportal/detail/{{ $npo_info_personal[$i]->certificated_npo }}" target="_blank">
                                                                            <img src="/img/sdgs-logo/certificated_npo.jpeg" class="img-thumbnail img-responsive media-object" alt="Rounded Image" width="72" height="72">
                                                                        </a>
                                                                        @endif
                                                                        @for ($j = 1; $j < 7; $j++)
                                                                            <?php $sdgs = "sdgs".$j ?>
                                                                            @if($npo_info_personal[$i]->$sdgs)
                                                                            <img src="/img/sdgs-logo/sdg_icon_{{$npo_info_personal[$i]->$sdgs}}.png" class="img-thumbnail img-responsive media-object" alt="Rounded Image" width="72" height="72">
                                                                            @endif
                                                                        @endfor
                                                                    </div>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <label>管理者：<b><a href="{{ url('/home') }}/{{ $npo_info_personal[$i]->manager }}">{{ $npo_info_personal[$i]->manager }}</a>さん</b></label><br>
                                                                    <label>{{$this_auth->name}}さんの合計支援回数：<b>{{ number_format($premierData_personal[$i]->participants) }}口</b></label><br>
                                                                    <label>{{$this_auth->name}}さんの合計支援金額：<b>{{ number_format($premierData_personal[$i]->status) }}円</b></label><br>
                                                                    <label>{{$this_auth->name}}さんの最終支援日時：<b>{{ Carbon\Carbon::parse($premierData_personal[$i]->updated_at)->format('Y年m月d日H:i') }}</b></label><br>
                                                                    <label><b>支援者</b></label>
                                                                    <p>
                                                                        @for($d = 1; $d < count($donater[$i]); $d++)
                                                                            @if($d > 1)
                                                                                、
                                                                            @endif
                                                                            @if(($this_auth->name) == $donater[$i][$d] && Auth::user())
                                                                                <b><a href="{{ url('/home') }}/{{ $donater[$i][$d] }}">{{$donater[$i][$d]}}</a>さん@if(Auth::user()->name == $this_auth->name)（あなた）@endif @if($donater_times[$i][$d] > 1)<small>×{{$donater_times[$i][$d]}}</small>@endif</font></b>
                                                                            @else
                                                                                <a href="{{ url('/home') }}/{{ $donater[$i][$d] }}">{{$donater[$i][$d]}}</a>さん@if($donater_times[$i][$d] > 1)<small>×{{$donater_times[$i][$d]}}</small>@endif
                                                                            @endif
                                                                        @endfor
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-3">
                                                    <b>{{ $npo_info_personal[$i]->subtitle }}</b><br>
                                                    <small><h6><a href="/{{$npo_info_personal[$i]->title }}">{{ $npo_info_personal[$i]->title }}</a></small><br>
                                                    <small>金額：{{ number_format($npo_info_personal[$i]->support_amount) }}円</small><br>
                                                    <small>現在合計：{{ number_format($npo_info_personal[$i]->follower) }}円</small><br>
                                                    <small>支援数：{{ number_format($npo_info_proval[$i]->buyer) }}/{{ number_format($npo_info_proval[$i]->support_limit) }}</small><br>
                                                    <small>募集数：{{ $npo_info_personal[$i]->support_limit }}</small><br>
                                                    @if($npo_info_personal[$i]->support_contents != "")
                                                    <small>リターン:{{ $npo_info_personal[$i]->support_contents }}</small><br>
                                                    @endif
                                                    @if($npo_info_personal[$i]->support_contents_detail)
                                                    <small>期限:{{ Carbon\Carbon::parse($npo_info_personal[$i]->support_contents_detail)->format('Y年m月d日H:i') }}</small><br>
                                                    @endif
                                                    <!--<small>現在:{{ $npo_info_personal[$i]->follower }}円</small><br>-->
                                                    <!--<small>現在:{{ $npo_info_personal[$i]->follower }}円</small><br>-->
                                                    </h6></h6><br>
                                                </div>
                                                <div class="col-md-1 col-1">
                                                    <a class="btn btn-outline-default" href="/{{ $npo_info_personal[$i]->title }}/{{ $npo_info_personal[$i]->npo_name }}">GO!</a>
                                                    @if($npo_info_personal[$i]->url)
                                                    <br><br><a class="btn btn-xs btn-success" href="{{ $npo_info_personal[$i]->url }}" target="_blank">外部LINK</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                        <hr><br><br>
                                    @endfor
                                @elseif(!$npo_info_enterprise)
                                    <p class="text-muted text-center">まだどこにも支援していないようです。</p>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="myProjects" role="tabpanel">
                    <div class="text-center">
                    @if($this_auth->npo)
                        <a href="{{ url('/'.$this_auth->npo) }}" class="btn btn-outline-default">{{$this_auth->npo}} Page</a>
                        @if($followee_count != 0)
                            <button type="button" class="btn btn-outline-default" data-toggle="modal" data-target="#followerModal">
                                フォロワ一覧 <small>({{ $followee_count }})</small>
                            </button>
                            <div class="modal fade" id="followerModal" tabindex="-1" role="dialog" aria-hidden="false">
                                <div class="modal-dialog modal-register">
                                    <div class="modal-content">
                                        <div class="modal-header no-border-header text-center">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h3 class="modal-title text-center">フォロワ一覧</h3>
                                            <p>ユーザー名をタップで詳細確認可能</p>
                                        </div>
                                        <div class="modal-body">
                                            @for ($j = 0; $j < $followee_count; $j++)
                                                @if($j != 0)

                                                @endif
                                                <a href="{{ url('/home') }}/{{ $followees[$j]->follower_id }}">{{ $followees[$j]->follower_id }}</a>
                                            @endfor
                                            {{--<div class="modal-footer no-border-footer">--}}
                                            {{--<p>すでにご登録済みの方は <a href="{{ url('/login') }}">こちら</a></p>--}}
                                            {{--</div>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <br><br>
                    @else
                        <h3 class="text-muted">まずは団体登録！</h3>
                        <br>
                        <a href="{{ url('/npo_registers') }}" class="btn btn-warning btn-round">プロジェクト作成</a>
                        <br>
                        <br>
                    @endif
                    </div>
                    <div class="row">
                        <div class="col-md-6 ml-auto mr-auto">
                            <div class="text-center">
                                <p>▼ Projects</p>
                            </div>
                            <hr />
                            <ul class="list-unstyled follows">
                                @for($i = 0; $i < count($this_user_npo_info_proval); $i++)
                                <li>
                                    <div class="row">
                                        <div class="col-md-1 col-2">
                                            <!-- {{$i + 1}} -->
                                            <!--<img src="../assets/img/faces/clem-onojeghuo-3.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">-->
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <h6>{{ $this_user_npo_info_proval[$i]->subtitle }}
                                            <small>
        										<br><a href="/{{ $this_user_npo_info_proval[$i]->title }}">@ {{ $this_user_npo_info_proval[$i]->title }}</a>
                                                <br>金額：{{ number_format($this_user_npo_info_proval[$i]->support_amount) }}円
                                                <br>支援数：{{ number_format($this_user_npo_info_proval[$i]->buyer) }}/{{ number_format($this_user_npo_info_proval[$i]->support_limit) }}
        										@if($this_user_npo_info_proval[$i]->support_contents != '')
            										<br>リターン：{{ $this_user_npo_info_proval[$i]->support_contents }}
        										@endif
                                                @if($this_user_npo_info_proval[$i]->support_contents_detail)
                                                    <br>期限：{{ Carbon\Carbon::parse($this_user_npo_info_proval[$i]->support_contents_detail)->format('Y年m月d日H:i') }}
                                                @endif

        									</small></h6>
                                        </div>
                                        <div class="col-md-3 col-2">
                                            <a class="btn btn-outline-default" href="/{{$this_user_npo_info_proval[$i]->title}}/{{ $this_user_npo_info_proval[$i]->npo_name }}">GO!</a>
                                        </div>
                                    </div>
                                </li>
                                <hr />
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
                @if(Auth::user())
                @if(Auth::user()->name == $this_auth->name)
                <div class="tab-pane active" id="new" role="tabpanel">
                    <div class="row">
                        <div class="col-md-6 ml-auto mr-auto">
                            <ul class="list-unstyled follows">
                                @for($i = 0; $i < count($npo_info_proval); $i++)
                                <li>
                                    <div class="row">
                                        <div class="col-md-1 col-2">
                                            <!-- {{$i + 1}} -->
                                            <!--<img src="../assets/img/faces/clem-onojeghuo-3.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">-->
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <h6>{{ $npo_info_proval[$i]->subtitle }}
                                            <small>
        										<br><a href="/{{ $npo_info_proval[$i]->title }}">@ {{ $npo_info_proval[$i]->title }}</a>
                                                <br>金額：{{ number_format($npo_info_proval[$i]->support_amount) }}円
                                                <br>支援数：{{ number_format($npo_info_proval[$i]->buyer) }}/{{ number_format($npo_info_proval[$i]->support_limit) }}
        										@if($npo_info_proval[$i]->support_contents != '')
            										<br>リターン：{{ $npo_info_proval[$i]->support_contents }}
        										@endif
                                                @if($npo_info_proval[$i]->support_contents_detail)
                                                    <br>期限：{{ Carbon\Carbon::parse($npo_info_proval[$i]->support_contents_detail)->format('Y年m月d日H:i') }}
                                                @endif
        									</small></h6>
                                        </div>
                                        <div class="col-md-3 col-2">
                                            <a class="btn btn-outline-default" href="/{{$npo_info_proval[$i]->title}}/{{ $npo_info_proval[$i]->npo_name }}">GO!</a>
                                        </div>
                                    </div>
                                </li>
                                <hr />
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
                @endif
            </div>
        </div>
    </div>
</div>
{{--
<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>
<form name="changeform">
{{ csrf_field() }}
</form>
<script type="text/javascript">
/* 画像アップロード */
function ZZ1_run(val) {
    window.open("", "subwindow");
    window.document.subwindow.action = "{{ url('/../other/image_upload_index') }}";
    window.document.subwindow.target = "subwindow";
    make_hidden('mode', val, 'subwindow');
    window.document.subwindow.method = "POST";
    window.document.subwindow.submit();
}
/* 画像アップロード */
function ZZ1_run(val) {
    window.open("", "subwindow");
    window.document.subwindow.action = "{{ url('other/image_upload_index') }}";
    window.document.subwindow.target = "subwindow";
    make_hidden('mode', val, 'subwindow');
    window.document.subwindow.method = "POST";
    window.document.subwindow.submit();
}
/* 検索画面 */
function H03_1_run() {
    window.document.changeform.action = "{{ url('home/home_search_outer_member') }}";
    window.document.changeform.method = "POST";
    window.document.changeform.submit();
}
/* 自己紹介登録画面 */
function C02_run() {
    window.document.changeform.action = "{{ url('home/home_register') }}";
    window.document.changeform.method = "POST";
    window.document.changeform.submit();
}
/* 自己紹介登録画面 */
function H03_1_run() {
    window.document.changeform.action = "{{ url('home/home_search_outer_member') }}";
    window.document.changeform.method = "POST";
    window.document.changeform.submit();
}
/* Vision売却画面 */
function E01_1_run() {
    window.document.changeform.action = "{{ url('connect/sell') }}";
    window.document.changeform.method = "POST";
    window.document.changeform.submit();
}
/* 新おみくじ登録画面 */
function E04_1_run(val) {
    window.document.changeform.action = "{{ url('connect/sell_detail_regist') }}";
    window.document.changeform.method = "POST";
    make_hidden('omikuji_id', val, 'changeform');
    window.document.changeform.submit();
}
$(document).ready(function() {
	// 画像の再描画
    var changeCheckModule = function() {
		$.get("{{ url('other/own_image_picture') }}", {target : "HOME_REGIST"},
			function(data){
				// 画像データのパスが取得できれば表示する
				if(data != "0") {
					$('#own_image').attr('src', data);
				}
           	});
        // 画像ボタンの押下可否判定
        var own_image = $("img[id='own_image']").attr('src');
        if (own_image) {
    		$("input[id='image_delete_button']").show();
        } else {
    		$("input[id='image_delete_button']").hide();
        }
    };
    setInterval(changeCheckModule, 1000);
});
</script>
--}}
@endsection
@include('layouts.footer')
