@extends('layouts.app')
@section('content')
    @include('error')

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div class="container">
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Visions / Modify </h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form name="changeform" method="POST">
                    <div class="form-group">
                        <!--<label for="title-field">VISION ID</label>-->
                        <input type="hidden" id="title-field" name="vision_id" class="form-control" value="{{ $vision_id }}" readonly="readonly"/>
                    </div>
                    <div class="form-group @if($errors->has('vision_title')) has-error @endif">
                        <label for="title-field">タイトル</label>
                        <input type="text" id="vision_title-field" name="vision_title" class="form-control" value="{{ $vision_title }}"/>
                        @if($errors->has("vision_title"))
                           <span class="help-block">{{ $errors->first("visiion_title") }}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('image_id')) has-error @endif">
                        <label for="img-field">写真</label>
                        <IMG id='own_image'>
                        <INPUT TYPE="button" id="image_upload_button" value="　画　像　" onClick="ZZ1_run('SELL')" >
                        <!--<INPUT TYPE="button" id="image_unload_button" value="　画像消す　" onClick="alert('対応中')" >-->
                        @if($errors->has("image_id"))
	                        <span class="help-block">{{ $errors->first("image_id") }}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('vision_statis')) has-error @endif">
                       <label for="title-field">ステータス</label>
                       <input type="text" id="title-field" name="vision_status" class="form-control" value="{{ $vision_status }}" readonly="readonly"/>
                       @if($errors->has("vision_status"))
                           <span class="help-block">{{ $errors->first("vision_status") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('vision_published')) has-error @endif">
                       <label for="title-field">VISION作成日</label>
                       <input type="text" id="title-field" name="vision_published" class="form-control" value="{{ $vision_published }}" readonly="readonly"/>
                       @if($errors->has("vision_published"))
                           <span class="help-block">{{ $errors->first("vision_published") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('vision_description')) has-error @endif">
                       <label for="msg-field">VISION詳細</label>
                    <textarea class="form-control" id="msg-field" rows="5" name="vision_description">{{ $vision_description }}</textarea>
                       @if($errors->has("vision_description"))
                        <span class="help-block">{{ $errors->first("vision_description") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('first_commitment_stage')) has-error @endif">
                       <label for="msg-field">1st目標達成金額(ビットコイン)</label>
                       <input type="text" id="first_commitment_stage-field" name="first_commitment_stage" class="form-control" value="{{ $first_commitment_stage }}"/>
                       @if($errors->has("first_commitment_stage"))
                        <span class="help-block">{{ $errors->first("first_commitment_stage") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('second_commitment_stage')) has-error @endif">
                       <label for="msg-field">2st目標達成金額(ビットコイン)</label>
                       <input type="text" id="second_commitment_stage-field" name="second_commitment_stage" class="form-control" value="{{ $second_commitment_stage }}"/>
                       @if($errors->has("second_commitment_stage"))
                        <span class="help-block">{{ $errors->first("second_commitment_stage") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="button" class="btn btn-primary" onClick="E01_6_run()">更新</button>
                    <a class="btn btn-link pull-right" onClick="H01_run()"><i class="glyphicon glyphicon-backward"></i> 戻る</a>
                </div>
{{ csrf_field() }}
            </form>

        </div>
    </div>
</div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('.date-picker').datepicker({
    });
  </script>
<script type="text/javascript">
/* Vision売却確認画面 */
function E01_6_run() {
    window.document.changeform.action = "{{ url('connect/vision_sell_modify_confirm') }}";
    window.document.changeform.method = "POST";
    window.document.changeform.submit();
}
function H01_run() {
	window.document.changeform.action = "{{ url('home') }}";
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
