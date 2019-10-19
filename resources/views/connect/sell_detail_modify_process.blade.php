@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <!-- 優待更新処理 -->

            <div class="panel panel-default">
                <div class="panel-heading">
                    優待更新処理
                </div>
                <div class="panel-body">
                	ただいま、更新処理中です。
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
/* 自己紹介登録完了画面 */
window.document.changeform.action = "{{ url('connect/sell_detail_modify_complete') }}";
window.document.changeform.method = "POST";
window.document.changeform.submit();
</script>
@endsection
