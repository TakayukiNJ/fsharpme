@extends('layouts.app')
@section('content')
    @include('error')

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div class="container">
<div class="page-header">
    <h1><i class="glyphicon glyphicon-plus"></i> 自己紹介 </h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="#">
            <!-- 自己紹介登録確認画面 -->
                以下の内容で登録してよいですか？<BR>
                <div class="form-group">
                    <label for="vision_status">[USERNAME]</label>
                    <p class="form-control-static">{{ Auth::user()->name }}</p>
                </div>
                <div class="form-group">
                    <label for="vision_status">[USER]</label>
                    <p class="form-control-static">{{$user}}</p>
                </div>
                <div class="form-group">
                    <label for="vision_status">[姓(漢字)]</label>
                    <p class="form-control-static">{{$user_name_sei_kanji}}</p>
                </div>
                <div class="form-group">
                    <label for="vision_status">[名(漢字)]</label>
                    <p class="form-control-static">{{$user_name_mei_kanji}}</p>
                </div>
                <div class="form-group">
                    <label for="vision_status">[姓(ローマ字)]</label>
                    <p class="form-control-static">{{$user_name_sei_roma}}</p>
                </div>
                <div class="form-group">
                    <label for="vision_status">[名(ローマ字)]</label>
                    <p class="form-control-static">{{$user_name_mei_roma}}</p>
                </div>
                <div class="form-group">
                    <label for="vision_status">[性別]</label>
					@if ($sex_type == 1)
						男(man)
					@else
						女(woman)
					@endif
                </div>
                <div class="form-group">
                    <label for="vision_status">[生年月日]</label>
                    <p class="form-control-static">{{ $birthday_year }}／{{ $birthday_month }}／{{ $birthday_day }}</p>
                </div>
                <div class="form-group">
                    <label for="vision_status">[受取人口座名]</label>
                    <p class="form-control-static">{{ $bank_account_name }}</p>
                </div>
                <div class="form-group">
                    <label for="vision_status">[銀行口座]</label>
                    <p class="form-control-static">銀行名：{{ $bank_name }}、支店名：{{ $bank_branch }}、預金科目{{ $bank_type_account }}、口座番号{{ $bank_account_number }}</p>
                </div>
                <div class="form-group">
                    <label for="vision_status">[画像]</label>
                    <p class="form-control-static"><IMG id='own_image' src='{{ $image_id }}'></p>
                </div>
            </form>
            <BR>
            <DIV class="submit_button">
                <INPUT TYPE="button" value="　登　録　" onClick="C04_run()" style="center:center">
            </DIV>
            <BR>
<BR>
<BR>
<BR>
<BR>

        </div>
    </div>
</div>
<form name="changeform">
{{ csrf_field() }}
</form>
<script type="text/javascript">
/* 自己紹介登録処理 */
function C04_run() {
    window.document.changeform.action = "{{ url('home/home_register_process') }}";
    window.document.changeform.method = "POST";
    window.document.changeform.submit();
}
</script>

@endsection
