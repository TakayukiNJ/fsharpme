@extends('layouts.app')
@section('content')
    @include('error')

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div class="container">
<div class="page-header">
    <div class="row">
@if ($switch == 'yes')
　　リンクの検証に成功しました！
@else
    リンクに問題があります。期限切れではありませんか？リンクの有効期限は24時間です。<BR>
    メールの送信後24時間が経過している場合は、パスワードリセットメールの再送をお願いいたします。<BR>
@endif
        <input type="button" value="トップページに戻る" onClick="T01_run()"><BR>
    </div>
</div>
<form name="changeform">
{{ csrf_field() }}
</form>
<script type="text/javascript">
@if ($switch == 'yes')
	window.document.changeform.action = "{{ url('passwordchange/reset/register') }}";
    window.document.changeform.method = "POST";
    window.document.changeform.submit();
@else
function T01_run() {
	window.document.changeform.action = "{{ url('/') }}";
    window.document.changeform.method = "GET";
    window.document.changeform.submit();
}
@endif
</script>

@endsection
