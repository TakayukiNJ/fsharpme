@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon"></i> Search </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">
            <form name="changeform" method="POST">
                    <div class="form-group">
                        <label for="name-field">ユーザー名</label>
                        <input type="text" id="name-field" name="name" class="form-control" value=""/>
                    </div>
                    <div class="form-group">
                        <label for="user_name_sei_kanji_id-field">姓(漢字)</label>
                        <input type="text" id="user_name_sei_kanji_id-field" name="user_name_sei_kanji_id" class="form-control" value=""/>
                    </div>
                    <div class="form-group">
                        <label for="user_name_sei_kanji_id-field">名(漢字)</label>
                        <input type="text" id="user_name_mei_kanji_id-field" name="user_name_mei_kanji_id" class="form-control" value=""/>
                    </div>
                    <div class="form-group">
                        <label for="user_name_sei_kanji_id-field">姓(ローマ字)</label>
                        <input type="text" id="user_name_sei_roma_id-field" name="user_name_sei_roma_id" class="form-control" value=""/>
                    </div>
                    <div class="form-group">
                        <label for="user_name_mei_roma_id-field">名(ローマ字)</label>
                        <input type="text" id="user_name_mei_roma_id-field" name="user_name_mei_roma_id" class="form-control" value=""/>
                    </div>
                <DIV class="submit_button">
                <INPUT TYPE="button" value="　検　索　" onClick="H03_2_run()" style="center:center">
                </DIV>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('.date-picker').datepicker({
    });
  </script>
<form name="changeform">
{{ csrf_field() }}
</form>
<script type="text/javascript">
/* 検索実行処理 */
function H03_2_run() {
    window.document.changeform.action = "{{ url('home/home_search_outer_member_process') }}";
    window.document.changeform.method = "POST";
    window.document.changeform.submit();
}
</script>
@endsection
