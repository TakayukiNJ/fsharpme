@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Visions / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form name="changeform" method="POST">

                <div class="form-group @if($errors->has('title')) has-error @endif">
                       <label for="title-field">タイトル</label>
                    <input type="text" id="title-field" name="title" class="form-control" value="{{ old("title") }}"/>
                       @if($errors->has("title"))
                        <span class="help-block">{{ $errors->first("title") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('msg')) has-error @endif">
                       <label for="msg-field">詳細</label>
                    <textarea class="form-control" id="msg-field" rows="3" name="description">{{ old("description") }}</textarea>
                       @if($errors->has("description"))
                        <span class="help-block">{{ $errors->first("description") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('img')) has-error @endif">
                       <label for="img-field">写真</label>
                    <input type="text" id="img-field" name="img" class="form-control" value="{{ old("img") }}"/>
                       @if($errors->has("img"))
                        <span class="help-block">{{ $errors->first("img") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="button" class="btn btn-primary" onClick="E01_2_run()">作成</button>
                    <a class="btn btn-link pull-right" onClick="H01_run()"><i class="glyphicon glyphicon-backward"></i> 戻る</a>
                </div>
{{ csrf_field() }}
            </form>

        </div>
    </div>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('.date-picker').datepicker({
    });
  </script>
<script type="text/javascript">
/* Vision売却確認画面 */
function E01_2_run() {
    window.document.changeform.action = "{{ url('connect/sell_confirm') }}";
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
