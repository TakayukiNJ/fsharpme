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

            <form action="{{ route('visions.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('title')) has-error @endif">
                       <label for="title-field">タイトル</label>
                    <input type="text" id="title-field" name="title" class="form-control" value="{{ old("title") }}"/>
                       @if($errors->has("title"))
                        <span class="help-block">{{ $errors->first("title") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('msg')) has-error @endif">
                       <label for="msg-field">詳細</label>
                    <textarea class="form-control" id="msg-field" rows="3" name="msg">{{ old("msg") }}</textarea>
                       @if($errors->has("msg"))
                        <span class="help-block">{{ $errors->first("msg") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('img')) has-error @endif">
                       <label for="img-field">写真</label>
                    <input type="text" id="img-field" name="img" class="form-control" value="{{ old("img") }}"/>
                       @if($errors->has("img"))
                        <span class="help-block">{{ $errors->first("img") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('published')) has-error @endif">
                       <label for="published-field">Published</label>
                    <input type="text" id="published-field" name="published" class="form-control" value="{{ old("published") }}"/>
                       @if($errors->has("published"))
                        <span class="help-block">{{ $errors->first("published") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">作成</button>
                    <a class="btn btn-link pull-right" href="{{ route('visions.index') }}"><i class="glyphicon glyphicon-backward"></i> 戻る</a>
                </div>
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
@endsection
