@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <!-- パスワード変更問い合わせ(検索中) -->

            <div class="panel panel-default">
                <div class="panel-heading">
                    パスワード変更問い合わせ(検索中)
                </div>
                <div class="panel-body">
                	ただいま、検索中です。
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
if ("{{ $switch }}" == "find") {
    window.document.changeform.action = "{{ url('passwordchange/require/searchComplete') }}";
    window.document.changeform.method = "POST";
    window.document.changeform.submit();
} else {
    window.document.changeform.action = "{{ url('passwordchange/require/notfound') }}";
    window.document.changeform.method = "POST";
    window.document.changeform.submit();
}
</script>
@endsection
