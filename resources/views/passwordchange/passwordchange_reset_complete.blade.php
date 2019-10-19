@extends('layouts.app')
@section('content')
    @include('error')

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div class="container">
<div class="page-header">
    <h1><i class="glyphicon glyphicon-plus"></i> パスワードの変更が完了しました。 </h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="#">
            <DIV class="submit_button">
                <INPUT TYPE="button" value="ログインページに戻る" onClick="T01_run()" style="center:center">
            </DIV>
            <BR>
            </form>
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
