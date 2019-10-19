@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <!-- パスワードリセット(処理中) -->

            <div class="panel panel-default">
                <div class="panel-heading">
                    パスワードリセット(処理中)
                </div>
                <div class="panel-body">
                	パスワードの変更をしています。<BR>
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
    window.document.changeform.action = "{{ url('passwordchange/reset/complete') }}";
    window.document.changeform.method = "POST";
    window.document.changeform.submit();
</script>

@endsection
