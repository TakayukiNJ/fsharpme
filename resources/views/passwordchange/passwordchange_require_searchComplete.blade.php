@extends('layouts.app')
@section('content')
@include('error')

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div class="container">
<div class="page-header">
    <div>
    <h1><i class="glyphicon glyphicon-plus"></i> パスワードをリセットします。 </h1>
    </div>
    <BR>
    <div class="row">
        <div class="col-md-12">
            <form action="#">
            <!-- パスワード変更問い合わせ(検索成功：メール送信) -->
            [{{$mailaddress}}]宛にパスワードをリセットする為のメールを送信してもよろしいですか？
            <BR><BR>
            <DIV class="submit_button">
                <INPUT TYPE="button" value="　送　信　" onClick="A02_5_run()" style="center:center">
            </DIV>
            </form>
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
function A02_5_run() {
    window.document.changeform.action = "{{ url('passwordchange/replaymail/send') }}" + "/" + "{{$mailaddress}}";
    window.document.changeform.method = "POST";
    window.document.changeform.submit();
}
</script>

@endsection
