@extends('layouts.app')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection

@section('content')
    @include('error')
 
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Return / Create </h1>
    </div>
    <div class="row">
        
        <div class="col-md-12">

            <form action="#">
                <!--<div class="form-group">-->
                <!--    <label for="vision_id">ID</label>-->
                <!--    <p class="form-control-static">{{$vision_id}}</p>-->
                <!--</div>-->
                <div class="form-group">
                    <label for="vision_title">タイトル</label>
                    <p class="form-control-static">{{$vision_title}}</p>
                </div>
                <!--<div class="form-group">-->
                <!--    <label for="img">写真</label>-->
                <!--    <IMG id='own_image'>-->
                <!--</div>-->
                <div class="form-group">
                    <label for="vision_status">ステータス</label>
                    <p class="form-control-static">{{$vision_status}}</p>
                </div>
                <div class="form-group">
                    <label for="vision_published">作成日</label>
                    <p class="form-control-static">{{$vision_published}}</p>
                </div>
                <div class="form-group">
                    <label for="vision_description">優待の詳細・目的</label>
                    <p class="form-control-static">{{$vision_description}}</p>
                </div>
                <div class="form-group">
                    <label for="first_commitment_stage">1st目標達成金額</label>
                    <p class="form-control-static">{{$first_commitment_stage}}</p>
                </div>
                <div class="form-group">
                    <label for="second_commitment_stage">2st目標達成金額</label>
                    <p class="form-control-static">{{$second_commitment_stage}}</p>
                </div>
            </form>

            <div class="well well-sm">
                <button type="button" class="btn btn-primary" onClick="E01_3_run()">　登　録　</button>
                <a class="btn btn-link pull-right" onClick="H01_run()"><i class="glyphicon glyphicon-backward"></i> 戻る</a>
            </div>

        </div>
    </div>
    
<form name="changeform">
{{ csrf_field() }}
</form>

<script type="text/javascript">
/* Vision売却処理 */
function E01_3_run() {
	window.document.changeform.action = "{{ url('connect/vision_sell_regist_process') }}";
    window.document.changeform.method = "POST";
    window.document.changeform.submit();
}
function H01_run() {
	window.document.changeform.action = "{{ url('home/home_own_timeline') }}";
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