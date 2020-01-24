@extends('layouts.welcome_common')
@include('layouts.welcome_head')
@include('layouts.welcome_script')
@include('layouts.nav_lp')
@section('welcome_content')
<body class="presentation-page loading">
    <div class="page-header section-dark" style="background-image: url('/img/farid-askerov.jpg')">
    	<div class="content-center">
    		<div class="container">
    			<div class="title-brand">
    				<h1 class="presentation-title"></h1>
    				<!--<div class="type">F♯</div>-->
    			</div>
    			<h2 class="presentation-subtitle text-center">社会問題解決のためのプロジェクト資金調達サービス「F♯」</h2>
    			<div class="w3-panel w3-large">
                    <br>
                    <button type="button" class="btn-lg btn btn-neutral" data-toggle="modal" data-target="#howtoModal">
                        使い方
                    </button>
                    <div class="modal fade" id="howtoModal" tabindex="-1" role="dialog" aria-hidden="false">
                        <div class="modal-dialog modal-register">
                            <div class="modal-content">
                                <div class="modal-header no-border-header text-center">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h3 class="modal-title text-center">使い方</h3>
                                </div>
                                <div class="modal-body">
                                	<iframe class="text-center" width="392" height="220" src="https://www.youtube.com/embed/aHb0e-R-qPs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	                                <br>
	                                <br>
	                                <h5>使い方の手順</h5>
                                	<p>①ユーザー登録</p>
									<p>②団体登録</p>
									<p>③プロジェクト登録</p>
									<p>④プロジェクト編集・公開</p>
									<p>⑤拡散</p>
                                    <div class="modal-footer no-border-footer">
                                        <p>質問がございましたら、お気軽にご連絡ください→g181tg2061@dhw.ac.jp</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (Auth::guest())
                    <!--<a href="{{ url('/login') }}" class="btn-lg btn btn-outline-neutral"><span class="network-name">スタート</span></a>-->
                    <button type="button" class="btn-lg btn btn-outline-neutral" data-toggle="modal" data-target="#loginModal">
                        スタート
                    </button>
                    @if($errors->has('name') || $errors->has('email') || $errors->has('password'))
                        <br>
                    @endif
                    @if($errors->has('name'))
                        <br>
                        <span class="help-block division">
                        <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                    @if ($errors->has('email'))
                        <br>
                        <span class="help-block division">
                        <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    @if ($errors->has('password'))
                        <br>
                        <span class="help-block division">
                        <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    {{-- NPO登録をまだしていなかった場合 --}}
                    @else
                    <a href="{{ url('/home/home_own_timeline') }}" class="btn-lg btn btn-outline-neutral"><span class="network-name">スタート</span></a>
                    <!--<a href="{{ url('/npo_registers') }}" class="btn-lg btn btn-outline-neutral"><span class="network-name">スタート</span></a>-->
                    @endif
                    <br>
                    <h1 class="presentation-subtitle text-center"><a href="#features">　</a></h1>
                    <div class="title-brand">
                        <h1 class="presentation-title"></h1>
                    </div>
                    <h2 class="presentation-subtitle">【東京駅から徒歩2分】<br><b>2020年2月</b>「社会派エンジニア養成スクール」開校</h2>
                    <div class="w3-panel w3-large text-center">
                        <br>
                        <a type="button" class="btn btn-outline-neutral" href="https://gs4good.tokyo" target="_blank">
                            詳細はこちら
                        </a>
                    </div>
                </div>
    		</div>
    	</div>
    </div>

    <div id="features" class="team-5 section-image" style="background-image: url('/img/sections/martin-knize.jpg')">
        <div class="projects-1">
            <div class="container">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <h2 class="title">Features<br></h2>
                    <h5 class="description">このWebサービスでできること</h5>
                    <br><br>
                </div>
                <div class="row">
					<div class="col-md-3">
						<div class="info">
							<div class="icon icon-danger">
								<i class="nc-icon nc-palette"></i>
							</div>
							<div class="description">
								<h4 class="info-title">社会活動を可視化</h4>
								<p class="description">各ページの黒いバッジをタップすると、購入者の履歴や最新情報を確認することができます。これによって、社会貢献活動のお金と人の流れを可視化します。</p>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="info">
							<div class="icon icon-danger">
								<i class="nc-icon nc-chart-bar-32"></i>
							</div>
							<div class="description">
								<h4 class="info-title">簡単公開・簡単管理 </h4>
								<p>ログイン後、右上のメニューバーから団体登録をしてください。誰でも簡単に、ご自身の団体とプロジェクトを公開して管理ができ、資金調達をする事ができます。</p>
                            </div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="info">
							<div class="icon icon-danger">
								<i class="nc-icon nc-bulb-63"></i>
							</div>
							<div class="description">
								<h4 class="info-title"><strong>SDGs</strong>スコア</h4>
								<p>総額の<strong>1%</strong>が<strong>SDGs</strong>スコアとして溜まり、マイページで確認ができます。<strong>SDGs</strong>の内訳も見ることができ、自分がどの分野にどれくらい貢献したかを確認できます。</p>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="info">
							<div class="icon icon-danger">
								<i class="nc-icon nc-sun-fog-29"></i>
							</div>
							<div class="description">
								<h4 class="info-title">支援後のリターン</h4>
								<p>プロジェクトによっては、リターンがあるものや、個数に限りがございます。（やり取りは、メッセージで行ってください。）</p>
							</div>
						</div>
					</div>
				</div>

                <div class="col-md-8 ml-auto mr-auto text-center">
                    <h2 class="title">Project Pick Ups<br></h2>
                    <h5 class="description">登録されたプロジェクト一覧</h5>
                    <br><br>
                </div>
                {{--
                Muted Text グレー
                Primary Text 水色
                Success Text グリーン
                Info Text 青
                Warning Text 黄色
                Danger Text レッド
                --}}
                <div class="col-md-10 ml-auto mr-auto">
					<div class="row">
                    @foreach($products as $product)
                    <div class="col-md-4">
						<div class="card card-blog">
							<div class="card-image">
								<a href="/npo_registers/{{ $product->id }}">
								    @if($product->background_pic)
                                    <img class="img img-raised" src="{{ url('/') }}/../img/project_back/{{ $product->background_pic }}" />
                                    @else
                                    <img class="img img-raised" src="https://images.unsplash.com/photo-1486310662856-32058c639c65?dpr=2&auto=format&fit=crop&w=1500&h=1125&q=80&cs=tinysrgb&crop=">
                                    @endif
									{{--<img class="img img-raised" src="{{ url('/') }}/../img/sdgs-logo/sdg_icon_15_ja.png" /> --}}
								</a>
							</div>
							<div class="card-body">
								<!--<h6 class="card-category text-success">-->
								<!--	Life No Land-->
								<!--</h6>-->
								<h5 class="card-title">
									{{ $product->subtitle }}
								</h5>
                                <p class="card-description">
									金額：{{ number_format($product->support_amount) }}円<br>
									合計獲得金額：{{ number_format($product->follower) }}円<br>
                                    支援数：{{ number_format($product->buyer) }}/{{ number_format($product->support_limit) }}<br>
									@if($product->support_contents != '')
										支援特典：{{ $product->support_contents }}<br>
									@endif
                                    @if($product->support_contents_detail)
                                        期限：{{ Carbon\Carbon::parse($product->support_contents_detail)->format('Y年m月d日H:i') }}
                                    @endif
								</p>
                                <hr>
                                <div class="card-footer">
                                    <div class="author">
                                        <a href="{{ url('/') }}/home/{{ $product->manager }}">
                                            <span>{{ $product->manager }}</span>
                                        </a>
	                                </div>
                                    <div class="stats">
                                        <a href="/{{$product->title}}"><small>@ {{ $product->title }}</small></a><br>
								    </div>
	                            </div>
							</div>
						</div>
					<br>
					</div>
                    @endforeach
					</div>
				</div><!-- tabcontents　ここまで-->
                <div class="title-brand">
                    <h1 class="presentation-title"></h1>
                </div>
                <h2 class="presentation-subtitle text-center">【東京駅から徒歩2分】<br>2020年2月「社会派エンジニア養成スクール」開校</h2>
                <div class="w3-panel w3-large text-center">
                    <br>
                    <a type="button" class="btn btn-outline-neutral" href="https://gs4good.tokyo">
                        詳細はこちら
                    </a>
                </div>
            </div> <!-- container -->
        </div>
    </div>
</body>
@endsection
@include('layouts.footer')
