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

<div class="container">


    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <!-- ホーム画面投資家や選手のタイムライン -->

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $disp_outer_user_name }}さんのタイムラインです。
                </div>
                <div class="panel-body">
                    <input type="button" class="btn btn-default" value="いいね" onClick="alert('対応中')">&nbsp;
                    <input type="button" class="btn btn-default" value="シェア" onClick="alert('対応中')">&nbsp;
                    <input type="button" class="btn btn-default" value="フォロー" onClick="alert('対応中')">&nbsp;
                    <input type="button" class="btn btn-default" value="投稿" onClick="H01_run()"><BR>
                    <input type="button" class="btn btn-default" value="自分のタイムラインに戻る" onClick="H01_run()"><BR>
                    <table class="table-list-main"><tr><td>
                    @foreach($collections as $row)
                    	<table class="table-list-main">
                            <tr class="tr-list-main">
                            	<td class="td-list-header">タイトル</td>
                                <td class="td-list-main">{{ $row->title }}</td>
                            </tr>
                            <tr class="tr-list-main">
                                <td class="td-list-header">状態</td>
                                <td class="td-list-main">
                                    @if ($row->status == 'open')
                                    公開待ち
                                    @elseif ($row->status == 'process')
                                    公開中
                                    @elseif ($row->status == 'bid')
                                    おみくじ判定中
                                    @elseif ($row->status == 'close')
                                    受付終了
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="td-list-header">作成日時</td>
                                <td class="td-list-main">{{ $row->omikuji_published }}</td>
                            </tr>
                            <tr>
                            	<td class="td-list-header">説明</td>
                                <td class="td-list-main">{{ $row->description }}</td>
                            </tr>
                            <tr><td>
                                <input type="button" class="button" value="このVisionのくじを閲覧する" onClick="H02_run()"><BR>
                            </td></tr>
                        </table>
                        <BR>
	                @endforeach
	                </td></tr></table>
                </div>
            </div>
        </div>
    </div>
</div>
<form name="changeform">
{{ csrf_field() }}
</form>
<script type="text/javascript">
function H01_run() {
	window.document.changeform.action = "{{ url('home/home_own_timeline') }}";
    window.document.changeform.method = "POST";
    window.document.changeform.submit();
}
</script>
@endsection
