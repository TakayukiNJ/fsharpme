@extends('layouts.app')

@section('content')
<div class="container">

    <!--<div class="row">-->

        <!--<div class="col-md-8 col-md-offset-2">-->

            <!-- 検索実行処理 -->

            <!--<div class="panel panel-default">-->
                <!--<div class="panel-heading">-->
                    <!--検索実行処理-->
                <!--</div>-->
                <!--<div class="panel-body">-->
                    検索中
                    <!--ID:{{ $id }}-->
                    <!--USER:{{ $user }}-->
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->
    <!--</div>-->
<form name="changeform">
{{ csrf_field() }}
</form>
<script type="text/javascript">
    window.document.changeform.action = "{{ url('home/home_search_outer_member_result') }}";
    window.document.changeform.method = "POST";
    window.document.changeform.submit();
</script>
</div>
@endsection
