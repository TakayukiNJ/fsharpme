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

<br>
    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <!-- Vision売却完了画面 -->

            <div class="panel panel-default">
                <div class="panel-heading">
                    優待変更完了画面
                </div>
                <div class="panel-body">
                    優待変更を完了しました。
                </div>
                <BR>
                <div class="submit_button">
                	<input type="button" value=" 優待画面 TOP に戻る " onClick="home_run()"><BR>
                	<!--<a class="btn btn-link pull-right" onClick="H01_run()"><i class="glyphicon glyphicon-backward"></i> 優待画面TOPに戻る</a>-->
            
                </div>
                <BR>
            </div>

            </div>
        </div>
    </div>
</div>
<br><br><br><br><br><br><br>
<br><br><br><br><br><br><br>
<br><br><br><br><br><br><br>
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
