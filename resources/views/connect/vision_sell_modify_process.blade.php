@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <!-- VISION売却処理 -->

            <div class="panel panel-default">
                <div class="panel-heading">
                    VISION更新処理
                </div>
                <div class="panel-body">
                	ただいま、VISION更新処理中です。
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
/* VISION作成完了画面 */
window.document.changeform.action = "{{ url('connect/vision_sell_modify_complete') }}";
window.document.changeform.method = "POST";
window.document.changeform.submit();
</script>
@endsection
