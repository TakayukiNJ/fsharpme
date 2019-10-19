@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style type="text/css">
TABLE.table-list-main{
  border: inset 2px #999999;
  margin:2px;
  width:98%;
  font-size:40px;
}

TR.tr-list-main{
  border: inset 2px #999999;
  margin:2px;
  font-size:40px;
}

TD.td-list-header{
  border: inset 2px #999999;
  background-color: #d0d0d0;
  margin:2px;
  font-size:100px;
  height:50px;
  width:500px;
}
TD.td-list-main{
  border: inset 2px #999999;
  margin:2px;
  font-size:100px;
  height:200px;
}
div.submit_button {
 text-align : center ;
}
INPUT.button {
  font-size:100px;
}
</style>

<div class="jumbotron text-center" style="background-image: url(https://greatmiddleway.files.wordpress.com/2014/04/light.jpg?w=600&h=400); background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">
  <!-- 自己紹介表示画面 -->
  <img >
  <h1>優待編集画面</h1><!-- ID -->
</div>

<div class="container">
  <div class="row">
    
    <div class="col-sm-4">
    </div>
    
    <div class="col-sm-4">
      @if($collections->count())
        @foreach($collections as $row)
        <div class="panel panel-default">
            <!--<div class="panel-heading">-->
            <!--    VISION ID-->
            <!--</div>-->
            <!--<div class="panel-body">-->
            <!--	{{ $row->vision_id }}-->
            <!--</div>-->
            <div class="panel-heading">
            	優待名
            </div> 
            <div class="panel-body">
            	{{ $row->vision_title }}
            </div>
            <!--<div class="panel-heading">-->
            <!--	写真-->
            <!--</div>-->
            <!--<div class="panel-body">-->
            <!--	<image src="{{ asset('/images'). '/'. $row->image_id }}">-->
            <!--</div>-->
            <div class="panel-heading">
            	ステータス
            </div>
            <div class="panel-body">
              <font color="red">
                @if ($row->vision_status == 'open')
                公開待ち
                @elseif ($row->vision_status == 'process')
                公開中
                @elseif ($row->vision_status == 'bid')
                おみくじ判定中
                @elseif ($row->vision_status == 'close')
                受付終了
                @endif
              </font>
            </div>
            <div class="panel-heading">
            	作成日
            </div>
            <div class="panel-body">
            	{{ $row->vision_published }}
            </div>
            <div class="panel-heading">
            	詳細
            </div>
            <div class="panel-body">
            	{{ $row->vision_description }}
            </div>
            <div class="panel-heading">
            	1st目標達成金額
            </div>
            <div class="panel-body">
            	{{ $row->first_commitment_stage }}
            </div>
            <div class="panel-heading">
            	2st目標達成金額
            </div>
            <div class="panel-body">
            	{{ $row->second_commitment_stage }}
            </div>
            <div class="panel panel-default">
            <!--@foreach($row->premier_collection as $premier)-->
                <!-- リターン -->
            <!--    <div class="panel-heading">-->
            <!--        優待名：{{ $premier->title }}-->
            <!--    </div>-->
            <!--    <div class="panel-body">-->
            <!--        説明：{{ $premier->description }}-->
            <!--    </div>-->
            <!--    <div class="panel-body">-->
            <!--        状態：{{ $premier->status }}-->
            <!--    </div>-->
            <!--    <div class="panel-body">-->
            <!--        金額: 確定{{ $premier->bidder_price }} 上限{{ $premier->max_price }} ～ 下限{{ $premier->min_price }} 円-->
            <!--    </div>-->
            <!--    <div class="panel-body">-->
            <!--        残り:-->
            <!--    </div>-->
            <!--    <div class="panel-body">-->
            <!--        当選日:-->
            <!--    </div>-->
            <!--    <a href="#" onClick="E04_5_run('{{ $premier->premier_id }}')">-->
            <!--        <div class="panel-body">-->
      			   <!--     <h4>優待を編集</h4>-->
      			   <!-- </div>-->
          		<!--</a>-->
            <!--@endforeach-->
            </div>
            <button type="button" class="btn btn-primary" onClick="E01_5_run('{{ $row->vision_id }}')">VISIONの編集</button>
            <!--<button type="button" class="btn btn-primary" onClick="E04_1_run('{{ $row->vision_id }}')">優待を設定する</button>-->
            <!--<button type="button" class="btn btn-primary" onClick="">VISIONの公開開始</button>-->
            <!--<button type="button" class="btn btn-primary" onClick="">VISIONの公開終了</button>-->
        <br>
        </div>
        @endforeach
        
    @else
    <a href="#" onClick="E01_1_run()">
          <!--ラッフル機能 要編集！！！！！！！！！！！！-->
  	        <h4>新規作成</h4>
  		</a>
  		<br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
  		<br>
      <br>
      <br>
      <br>
      <br>
      <br>
      @endif
    </div>
  </div>
</div>

<!-- Contact Section -->
  <!--<div class="w3-container w3-padding-large w3-grey">-->
  <!--  <h1 id="contact"><b>Contact</b></h1>-->
  <!--  <div class="w3-row-padding w3-center w3-padding-24" style="margin:0 -16px">-->
  <!--    <div class="w3-third w3-dark-grey">-->
  <!--      <p><i class="fa fa-envelope w3-xxlarge w3-text-light-grey"></i></p>-->
  <!--      <p>email@email.com</p>-->
  <!--    </div>-->
  <!--    <div class="w3-third w3-teal">-->
  <!--      <p><i class="fa fa-map-marker w3-xxlarge w3-text-light-grey"></i></p>-->
  <!--      <p>Chicago, US</p>-->
  <!--    </div>-->
  <!--    <div class="w3-third w3-dark-grey">-->
  <!--      <p><i class="fa fa-phone w3-xxlarge w3-text-light-grey"></i></p>-->
  <!--      <p>512312311</p>-->
  <!--    </div>-->
  <!--  </div>-->
  <!--  <hr class="w3-opacity">-->
  <!--  <form action="/action_page.php" target="_blank">-->
  <!--    <div class="w3-section">-->
  <!--      <label>Name</label>-->
  <!--      <input class="w3-input w3-border" type="text" name="Name" required>-->
  <!--    </div>-->
  <!--    <div class="w3-section">-->
  <!--      <label>Email</label>-->
  <!--      <input class="w3-input w3-border" type="text" name="Email" required>-->
  <!--    </div>-->
  <!--    <div class="w3-section">-->
  <!--      <label>Message</label>-->
  <!--      <input class="w3-input w3-border" type="text" name="Message" required>-->
  <!--    </div>-->
  <!--    <button type="submit" class="w3-button w3-black w3-margin-bottom"><i class="fa fa-paper-plane w3-margin-right"></i>Send Message</button>-->
  <!--  </form>-->
  <!--</div>-->

<form name="changeform">
{{ csrf_field() }}
</form>
<script type="text/javascript">
function H01_run() {
	window.document.changeform.action = "{{ url('home/home_own_timeline') }}";
    window.document.changeform.method = "POST";
    window.document.changeform.submit();
}
/* Vision作成画面 */
function E01_1_run() {
    window.document.changeform.action = "{{ url('connect/vision_sell_regist') }}";
    window.document.changeform.method = "POST";
    window.document.changeform.submit();
}
/* 優待登録画面 */
function E04_1_run(val) {
    window.document.changeform.action = "{{ url('connect/sell_detail_regist') }}";
    window.document.changeform.method = "POST";
    make_hidden('vision_id', val, 'changeform');
    window.document.changeform.submit();
}
/* 優待更新画面 */
function E04_5_run(val) {
    window.document.changeform.action = "{{ url('connect/sell_detail_modify') }}";
    window.document.changeform.method = "POST";
    make_hidden('premier_id', val, 'changeform');
    window.document.changeform.submit();
}
/* Vision編集画面 */
function E01_5_run(val) {
    window.document.changeform.action = "{{ url('connect/vision_sell_modify') }}";
    window.document.changeform.method = "POST";
    make_hidden('vision_id', val, 'changeform');
    window.document.changeform.submit();
}
</script>
@endsection
