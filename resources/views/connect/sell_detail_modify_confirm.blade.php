@extends('layout')
@section('header')
<div class="page-header">
        <h1>優待 / Show #{{$id}}</h1>
        <form action="{{ route('visions.destroy', $id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('visions.edit', $id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="vision_id">VISION ID</label>
                    <p class="form-control-static">{{$vision_id}}</p>
                </div>
                <div class="form-group">
                    <label for="vision_title">VISION タイトル</label>
                    <p class="form-control-static">{{$vision_title}}</p>
                </div>
                <div class="form-group">
                    <label for="premier_id">優待 ID</label>
                    <p class="form-control-static">{{$premier_id}}</p>
                </div>
                <div class="form-group">
                    <label for="premier_title">優待タイトル</label>
                    <p class="form-control-static">{{$premier_title}}</p>
                </div>
                <div class="form-group">
                    <label for="image_id">写真</label>
                    <IMG id='own_image' src='{{ $image_id }}'>
                </div>
                <div class="form-group">
                    <label for="premier_status">ステータス</label>
                    <p class="form-control-static">{{$status}}</p>
                </div>
                <div class="form-group">
                    <label for="published">優待作成日</label>
                    <p class="form-control-static">{{$published}}</p>
                </div>
                <div class="form-group">
                    <label for="description">説明</label>
                    <p class="form-control-static">{{$description}}</p>
                </div>
                <div class="form-group">
                    <label for="description_detail">説明詳細</label>
                    <p class="form-control-static">{{$description_detail}}</p>
                </div>
                <!-- <div class="form-group">
                    <label for="participants">最大受付人数</label>
                    <p class="form-control-static">{{$participants}}</p>
                </div> -->
                <div class="form-group">
                    <label for="start_dt">入札開始日</label>
                    <p class="form-control-static">{{$start_dt}}</p>
                </div>
                <div class="form-group">
                    <label for="end_dt">入札終了日</label>
                    <p class="form-control-static">{{$end_dt}}</p>
                </div>
                <div class="form-group">
                    <label for="bidder_price">確定優待販売金額</label>
                    <p class="form-control-static">{{$bidder_price}}</p>
                </div>
                <div class="form-group">
                    <label for="max_price">最大入札可能額</label>
                    <p class="form-control-static">{{$max_price}}</p>
                </div>
                <div class="form-group">
                    <label for="min_price">最低入札可能額</label>
                    <p class="form-control-static">{{$min_price}}</p>
                </div>
                <!-- <div class="form-group">
                    <label for="max_bid_participants">入札可能最大人数</label>
                    <p class="form-control-static">{{$max_bid_participants}}</p>
                </div>
                <div class="form-group">
                    <label for="min_bid_participants">入札有効最小人数</label>
                    <p class="form-control-static">{{$min_bid_participants}}</p>
                </div> -->
            </form>

            <div class="well well-sm">
                <button type="button" class="btn btn-primary" onClick="E04_7_run()">更新(審査期間:約1週間)</button>
                <a class="btn btn-link pull-right" onClick="H01_run()"><i class="glyphicon glyphicon-backward"></i> 戻る</a>
            </div>

        </div>
    </div>
<form name="changeform">
{{ csrf_field() }}
</form>
<script type="text/javascript">
/* 新VISION登録確認画面 */
function E04_7_run() {
    window.document.changeform.action = "{{ url('connect/sell_detail_modify_process') }}";
    window.document.changeform.method = "POST";
    window.document.changeform.submit();
}
function H01_run() {
	window.document.changeform.action = "{{ url('home/home_own_timeline') }}";
    window.document.changeform.method = "POST";
    window.document.changeform.submit();
}
</script>
@endsection