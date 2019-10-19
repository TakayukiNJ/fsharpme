@extends('layouts.app')

@section('content')

<div class="jumbotron text-center">
  <!-- 自己紹介表示画面 -->
  <h1>{{ $id }}</h1><!-- ID -->
  <p>{{ $user }}</p><!-- USER -->
  <a href="http://fb.me" target="_blank"><i class="fa fa-facebook-official" style="font-size:36px;color:blue"></i></a>
  <i class="fa fa-twitter" style="font-size:36px"></i>
  <i class="fa fa-instagram" style="font-size:36px"></i>
  <i class="fa fa-youtube-play" style="font-size:36px"></i>
  <i class="fa fa-linkedin-square" style="font-size:36px"></i>
  <i class="fa fa-globe" style="font-size:36px"></i>
</div>

<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/obhdJ6-4CY4"></iframe>
      </div>
      <p>目標調達金額: <i class="fa fa-bitcoin" style="font-size:24px"></i>100.000000</p>
      <p>現在の調達金額:<i class="fa fa-bitcoin" style="font-size:24px;color:red"></i>59.484000</p>
      <p>フォロワー数:<i class="fa fa-users" style="font-size:24px"></i>744人<button style="font-size:24px">フォローする <i class="fa fa-user"></i></button></p>
      <p>購入者数:<i class="fa fa-users" style="font-size:24px;color:red"></i></i>30人<button style="font-size:24px">くじを買う <i class="fa fa-ticket"></i></button></p>
    </div>
    
    <div class="col-sm-4">
      <h2>このくじのついて</h2>
		        <div class="panel-body">
                優待内容: うまい棒1年分
            </div>
            <div class="panel-body">
                金額: 0.001BTC
            </div>
            <div class="panel-body">
                残り: 10個
            </div>
            <div class="panel-body">
                当選日: 2017年12月31日
            </div>
            <a href="{{ url('connect/buy') }}">
                <div class="panel-body">
      			       <!--<button style="font-size:24px">くじを買う <i class="fa fa-ticket"></i></button>-->
          		  </div>
      			</a>
      <h3>前回の当選者</h3>
      <div class="panel-body">
        該当なし
      </div>
    </div>
    
    <div class="col-sm-4">
      <h3>詳細</h3>
      <div class="panel-body">
        <p>世界の人々との交流を通じ、相互理解に基づく友情を深めながら、それぞれが抱える課題の解決や夢の実現に向けて協力の輪を広げ活動できるグローバルな人材の育成を目指しています。</p>
        <p>１．関係を深め、２．一緒に学習し、３．一緒に行動する。この順番を大切にしています。</p>
        <p><strong>学習が目的</strong>カンボジアに移動してからよく見聞きすることば、「ボランツアーリズム」。ボランティアと観光（ツアーリズム）を合わせたツアーのことをいいます。「ボランティア」と称し、実は現地の役に立たないばかりか、貧困生活を「見物」することに留まるツアーが増えています。先進国の若者の「経験」を豊かにするために、現地の人々と暮らしを搾取することになり兼ねないのです。プロジェクトフレンズのスタツア自体、見直すことになりました。「ボランティア」ということばは使わないことにしました。スタツアの目的は「学習」。これに徹するために、プログラムの内容を変えました。「学習」することのスリルと価値をしっかりと身につけられるスタツアを心がけています。</p>
        <p><strong>寄り添う活動</strong>　さらに、傷の多い孤児院の子どもたちの心をケアしてあげるために、短期孤児院訪問はしないことになりました。できるだけ安定した規律正しい生活を送って欲しいです。お客さんに必要以上にべったりする子どもたちもいます。そして悲しいお別れ。愛着形成が未熟な子どもたちの心の傷を更に深めてしまうのです。プロジェクトフレンズは、施設を出た若者に寄り添う活動に絞っています。そして、「家庭」の中ですくすくと子どもたちが成長できる未来に少しでも貢献できたらと願っています。</p>
      </div>
    </div>
    
  </div>
</div>

@endsection