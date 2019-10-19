@extends('layouts.app')
@section('content')
@include('error')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div class="container">
    <div class="page-header">
        <h1>新しいパスワードを入力してください。</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form name="changeform" method="POST">
                <div class="form-group @if($errors->has('newpassword')) has-error @endif">
                    <label for="title-field">新しいパスワード入力</label>
                    <input type="password" id="newpassword-field" name="newpassword" class="form-control" style="width:40%" autocomplete="off" value="{{ $newpassword }}"/>
                    @if($errors->has("newpassword"))
                       <span class="help-block">{{ $errors->first("newpassword") }}</span>
                    @endif
                </div>
                <div class="form-group @if($errors->has('newpassword_confirmation')) has-error @endif">
                    <label for="title-field">パスワードの再入力</label>
                    <input type="password" id="newpassword_confirmation-field" name="newpassword_confirmation" class="form-control" style="width:40%" autocomplete="off" value="{{ $newpassword_confirmation }}"/>
                    @if($errors->has("newpassword_confirmation"))
                       <span class="help-block">{{ $errors->first("newpassword_confirmation") }}</span>
                    @endif
                </div>

                <div class="well well-sm">
                    <button type="button" class="btn btn-primary" onClick="A02_8_run()">　確　認　</button>
                    <a class="btn btn-link pull-right" onClick="top()"><i class="glyphicon glyphicon-backward"></i> 戻る</a>
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
function A02_8_run() {
    window.document.changeform.action = "{{ url('passwordchange/reset/confirm') }}";
    window.document.changeform.method = "POST";
    window.document.changeform.submit();
}
function top() {
	window.document.changeform.action = "{{ url('/') }}";
    window.document.changeform.method = "GET";
    window.document.changeform.submit();
}

</script>
</div>

@endsection