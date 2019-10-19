@extends('layouts.app')

@section('content')
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
  margin:2px;
  font-size:40px;
  width:500px;
}

TD.td-list-main{
  border: inset 2px #999999;
  margin:2px;
  font-size:40px;
  height:60px;
}

div.submit_button {
 text-align : center ;
}
</style>
<div class="container">


    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <!-- 優待更新完了画面 -->

            <div class="panel panel-default">
                <div class="panel-heading">
                    優待更新完了画面
                </div>
                <div class="panel-body">
                    優待の更新を完了しました。
                </div>
                <BR>
                <div class="submit_button">
                	<input type="button" value="自分のタイムラインに戻る" onClick="home_run()"><BR>
                </div>
                <BR>
            </div>

            </div>
        </div>
    </div>
</div>
<form name="changeform">
{{ csrf_field() }}
</form>
<script type="text/javascript">
function home_run() {
	window.document.changeform.action = "{{ url('home') }}";
    window.document.changeform.method = "POST";
    window.document.changeform.submit();
}
</script>
@endsection
