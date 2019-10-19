@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <!-- 自己紹介登録完了画面 -->

            <div class="panel panel-default">
                <div class="panel-heading">
                    自己紹介登録完了画面
                </div>
                <div class="panel-body">
                	自己紹介の登録を完了しました。<BR>
                	<input type="button" value="自分のタイムラインに戻る" onClick="T01_run()"><BR>

                </div>
            </div>

            </div>
        </div>
    </div>
</div>
<form name="changeform">
{{ csrf_field() }}
</form>
<script type="text/javascript">
function T01_run() {
	window.document.changeform.action = "{{ url('home/home_own_timeline') }}";
    window.document.changeform.method = "POST";
    window.document.changeform.submit();
}
</script>

@endsection
