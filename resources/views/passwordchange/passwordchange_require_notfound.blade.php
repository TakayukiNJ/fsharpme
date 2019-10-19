@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <!-- パスワード変更問い合わせ(未登録) -->

            <div class="panel panel-default">
                <div class="panel-heading">
                    パスワード変更問い合わせ(未登録)
                </div>
                <div class="panel-body">
                	メールアドレスの登録はありませんでした。
                </div>
            </div>
        	<input type="button" value="ログインページに戻る" onClick="T01_run()"><BR>

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
