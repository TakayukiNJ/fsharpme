@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <!-- 新規優待登録処理 -->

            <div class="panel panel-default">
                <div class="panel-heading">
                    新規優待登録処理
                </div>
                <div class="panel-body">
                	ただいま、登録処理中です。
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
/* 新規優待登録処理 */
window.document.changeform.action = "{{ url('connect/sell_detail_regist_complete') }}";
window.document.changeform.method = "POST";
window.document.changeform.submit();
</script>
@endsection
