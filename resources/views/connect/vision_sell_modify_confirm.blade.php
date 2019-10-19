@extends('layouts.app')
@section('content')
    @include('error')

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div class="container">
<div class="page-header">
        <h1>Return / show {{$vision_title}}</h1>
    </div>
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="vision_title">[タイトル]</label>
                    <p class="form-control-static">{{$vision_title}}</p>
                </div>
                <!--<div class="form-group">-->
                <!--    <label for="img">写真</label>-->
                <!--    <IMG id='own_image'>-->
                <!--</div>-->
                <div class="form-group">
                    <label for="vision_status">[ステータス]</label>
                    <p class="form-control-static">{{$vision_status}}</p>
                </div>
                <div class="form-group">
                    <label for="vision_published">[VISION作成日]</label>
                    <p class="form-control-static">{{$vision_published}}</p>
                </div>
                <div class="form-group">
                    <label for="vision_description">[VISION詳細]</label>
                    <p class="form-control-static">{{$vision_description}}</p>
                </div>
                <div class="form-group">
                    <label for="first_commitment_stage">[1st目標達成金額]</label>
                    <p class="form-control-static">{{$first_commitment_stage}}</p>
                </div>
                <div class="form-group">
                    <label for="second_commitment_stage">[2st目標達成金額]</label>
                    <p class="form-control-static">{{$second_commitment_stage}}</p>
                </div>
            </form>

            <div class="well well-sm">
                <button type="button" class="btn btn-primary" onClick="E01_7_run()">　更 新　</button>
                <!--<a class="btn btn-link pull-right" onClick="H01_run()"><i class="glyphicon glyphicon-backward"></i> 戻る</a>-->
            </div>

        </div>
    </div>
</div>
<form name="changeform">
{{ csrf_field() }}
</form>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('.date-picker').datepicker({
    });
  </script>
<script type="text/javascript">
/* Vision売却処理 */
function E01_7_run() {
	window.document.changeform.action = "{{ url('connect/vision_sell_modify_process') }}";
    window.document.changeform.method = "POST";
    window.document.changeform.submit();
}
$(document).ready(function() {
	// 画像の再描画
    var changeCheckModule = function() {
		$.get("{{ url('other/own_image_picture') }}", {target : 'VISION_SELL_REGIST'},
			function(data){
				// 画像データのパスが取得できれば表示する
				if(data == "0") {
					;
				} else {
					$('#own_image').attr('src', data);
				}
           	});
    };
    setInterval(changeCheckModule, 1000);
});
</script>
@endsection