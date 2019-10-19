@extends('layouts.app')
@section('content')
@include('error')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div class="container">
    <div class="page-header">
        <h1>登録したメールアドレスを入力して確認ボタンを押して下さい。</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form name="changeform" method="POST">
                <div class="form-group @if($errors->has('mailaddress')) has-error @endif">
                    <label for="title-field">メールアドレス</label>
                    <input type="text" id="mailaddress-field" name="mailaddress" class="form-control" style="width:40%" autocomplete="off" value="{{ $mailaddress }}"/>
                    @if($errors->has("mailaddress"))
                       <span class="help-block">{{ $errors->first("mailaddress") }}</span>
                    @endif
                </div>

                <div class="well well-sm">
                    <button type="button" class="btn btn-primary" onClick="A02_2_run()">　確　認　</button>
                    <a class="btn btn-link pull-right" onClick="history.back()"><i class="glyphicon glyphicon-backward"></i> 戻る</a>
                </div>
{{ csrf_field() }}
<BR>
<BR>
<BR>
<BR>
            </form>
        </div>
    </div>
</div>

<form name="subwindow">
{{ csrf_field() }}
</form>
<script type="text/javascript">
function A02_2_run() {
    window.document.changeform.action = "{{ url('passwordchange/require/search') }}";
    window.document.changeform.method = "POST";
    window.document.changeform.submit();
}
function H01_run() {
	window.document.changeform.action = "{{ url('home') }}";
    window.document.changeform.method = "POST";
    window.document.changeform.submit();
}

</script>
</div>

@endsection