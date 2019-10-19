@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Mikujis / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('mikujis.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="delelt_flg" value="true">
                
                
                
                    <div class="form-group @if($errors->has('title')) has-error @endif">
                        <label for="name-field">おみくじのタイトル</label>
                        <input type="string" id="name-field" name="name" class="form-control" value="{{ old("name") }}"/>
                        @if($errors->has("name"))
                            <span class="help-block">{{ $errors->first("name") }}</span>
                        @endif
                    </div>
                    
                    <div class="form-group @if($errors->has('body')) has-error @endif">
                        <label for="msg-field">おみくじの内容</label>
                        <textarea class="form-control" id="msg-field" rows="3" name="msg">{{ old("msg") }}</textarea>
                        @if($errors->has("msg"))
                            <span class="help-block">{{ $errors->first("msg") }}</span>
                        @endif
                    </div>
                
                    <div class="form-group @if($errors->has('price')) has-error @endif">
                        <label for="price-field">一回の値段</label>
                        <input type="text" id="price-field" name="price" class="form-control" value="{{ old("price") }}"/>
                        @if($errors->has("price"))
                            <span class="help-block">{{ $errors->first("price") }}</span>
                        @endif
                    </div>
                    
                    <div class="form-group @if($errors->has('amount_all')) has-error @endif">
                        <label for="amount_all-field">おみくじの総数</label>
                        <input type="text" id="amount_all-field" name="amount_all" class="form-control" value="{{ old("amount_all") }}"/>
                        @if($errors->has("amount_all"))
                            <span class="help-block">{{ $errors->first("amount_all") }}</span>
                        @endif
                    </div>
                    
                    <div class="form-group @if($errors->has('return_big')) has-error @endif">
                        <label for="return_big-field">大当たり優待の内容</label>
                        <input type="text" id="return_big-field" name="return_big" class="form-control" value="{{ old("return_big") }}"/>
                        @if($errors->has("return_big"))
                            <span class="help-block">{{ $errors->first("return_big") }}</span>
                        @endif
                    </div>
                    
                    <div class="form-group @if($errors->has('amount_big')) has-error @endif">
                        <label for="amount_big-field">大当たり優待の数</label>
                        <input type="text" id="amount_big-field" name="amount_big" class="form-control" value="{{ old("amount_big") }}"/>
                        @if($errors->has("amount_big"))
                            <span class="help-block">{{ $errors->first("amount_big") }}</span>
                        @endif
                    </div>
                    
                    <div class="form-group @if($errors->has('return_small')) has-error @endif">
                        <label for="return_small-field">当たり優待の内容</label>
                        <input type="text" id="return_small-field" name="return_small" class="form-control" value="{{ old("return_small") }}"/>
                        @if($errors->has("return_small"))
                            <span class="help-block">{{ $errors->first("return_small") }}</span>
                        @endif
                    </div>
                    
                    <div class="form-group @if($errors->has('amount_small')) has-error @endif">
                        <label for="amount_small-field">当たり優待の数</label></label>
                        <input type="text" id="amount_small-field" name="amount_small" class="form-control" value="{{ old("amount_small") }}"/>
                        @if($errors->has("amount_small"))
                            <span class="help-block">{{ $errors->first("amount_small") }}</span>
                        @endif
                    </div>
                    
                    
                    <div class="form-group @if($errors->has('published')) has-error @endif">
                        <label for="published-field">公開日</label>
                        <input type="text" id="published-field" name="published" class="form-control" value="{{ old("published") }}"/>
                        @if($errors->has("published"))
                            <span class="help-block">{{ $errors->first("published") }}</span>
                        @endif
                    </div>
                    
                    <div class="form-group @if($errors->has('end_time')) has-error @endif">
                        <label for="end_time-field">終了日</label>
                        <input type="text" id="end_time-field" name="end_time" class="form-control" value="{{ old("end_time") }}"/>
                        @if($errors->has("end_time"))
                            <span class="help-block">{{ $errors->first("end_time") }}</span>
                        @endif
                    </div>
                    
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('mikujis.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
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
