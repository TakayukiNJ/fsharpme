@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <!-- パスワード変更問い合わせ(未登録) -->

            <div class="panel panel-default">
                <div class="panel-heading">
                    パスワード変更メール(送信)
                </div>
                <div class="panel-body">
                	パスワードをリセットする為のメールを送りました。メールをご確認ください。<BR>
                	何度やってもメールが届かない場合は管理者(g181tg2061@dhw.ac.jp)宛にご相談ください。<BR>
                	※24時間以内に再送を行った場合はメールは送信されません。24時間おいてから再度操作してください。<BR>
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
