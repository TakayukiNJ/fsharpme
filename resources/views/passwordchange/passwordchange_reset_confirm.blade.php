@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <!-- パスワードリセット(確認画面) -->

            <div class="panel panel-default">
                <div class="panel-heading">
                    パスワードリセット(確認画面)
                </div>
                <div class="panel-body">
                	パスワードを変更しますか？<BR>
                	<input type="button" value="変更する" onClick="A02_9_run()">
                	<input type="button" value="取りやめる" onClick="top_run()"><BR>
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
function A02_9_run() {
	window.document.changeform.action = "{{ url('passwordchange/reset/process') }}";
    window.document.changeform.method = "POST";
    window.document.changeform.submit();
}
function top_run() {
	window.document.changeform.action = "{{ url('/') }}";
    window.document.changeform.method = "GET";
    window.document.changeform.submit();
}
</script>

@endsection
