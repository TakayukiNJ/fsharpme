@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Omikujis / Edit #{{$omikuji->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('omikujis.update', $omikuji->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Name</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ is_null(old("name")) ? $omikuji->name : old("name") }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('msg')) has-error @endif">
                       <label for="msg-field">Msg</label>
                    <textarea class="form-control" id="msg-field" rows="3" name="msg">{{ is_null(old("msg")) ? $omikuji->msg : old("msg") }}</textarea>
                       @if($errors->has("msg"))
                        <span class="help-block">{{ $errors->first("msg") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('price')) has-error @endif">
                       <label for="price-field">Price</label>
                    <input type="text" id="price-field" name="price" class="form-control" value="{{ is_null(old("price")) ? $omikuji->price : old("price") }}"/>
                       @if($errors->has("price"))
                        <span class="help-block">{{ $errors->first("price") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('return_big')) has-error @endif">
                       <label for="return_big-field">Return_big</label>
                    <input type="text" id="return_big-field" name="return_big" class="form-control" value="{{ is_null(old("return_big")) ? $omikuji->return_big : old("return_big") }}"/>
                       @if($errors->has("return_big"))
                        <span class="help-block">{{ $errors->first("return_big") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('return_small')) has-error @endif">
                       <label for="return_small-field">Return_small</label>
                    <input type="text" id="return_small-field" name="return_small" class="form-control" value="{{ is_null(old("return_small")) ? $omikuji->return_small : old("return_small") }}"/>
                       @if($errors->has("return_small"))
                        <span class="help-block">{{ $errors->first("return_small") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('amount_all')) has-error @endif">
                       <label for="amount_all-field">Amount_all</label>
                    <input type="text" id="amount_all-field" name="amount_all" class="form-control" value="{{ is_null(old("amount_all")) ? $omikuji->amount_all : old("amount_all") }}"/>
                       @if($errors->has("amount_all"))
                        <span class="help-block">{{ $errors->first("amount_all") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('amount_big')) has-error @endif">
                       <label for="amount_big-field">Amount_big</label>
                    <input type="text" id="amount_big-field" name="amount_big" class="form-control" value="{{ is_null(old("amount_big")) ? $omikuji->amount_big : old("amount_big") }}"/>
                       @if($errors->has("amount_big"))
                        <span class="help-block">{{ $errors->first("amount_big") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has(' amount_small')) has-error @endif">
                       <label for=" amount_small-field"> amount_small</label>
                    <input type="text" id=" amount_small-field" name=" amount_small" class="form-control" value="{{ is_null(old(" amount_small")) ? $omikuji-> amount_small : old(" amount_small") }}"/>
                       @if($errors->has(" amount_small"))
                        <span class="help-block">{{ $errors->first(" amount_small") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('published')) has-error @endif">
                       <label for="published-field">Published</label>
                    <input type="text" id="published-field" name="published" class="form-control" value="{{ is_null(old("published")) ? $omikuji->published : old("published") }}"/>
                       @if($errors->has("published"))
                        <span class="help-block">{{ $errors->first("published") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('end')) has-error @endif">
                       <label for="end-field">End</label>
                    <input type="text" id="end-field" name="end" class="form-control" value="{{ is_null(old("end")) ? $omikuji->end : old("end") }}"/>
                       @if($errors->has("end"))
                        <span class="help-block">{{ $errors->first("end") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('created_at')) has-error @endif">
                       <label for="created_at-field">Created_at</label>
                    <input type="text" id="created_at-field" name="created_at" class="form-control" value="{{ is_null(old("created_at")) ? $omikuji->created_at : old("created_at") }}"/>
                       @if($errors->has("created_at"))
                        <span class="help-block">{{ $errors->first("created_at") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('updated_at')) has-error @endif">
                       <label for="updated_at-field">Updated_at</label>
                    <input type="text" id="updated_at-field" name="updated_at" class="form-control" value="{{ is_null(old("updated_at")) ? $omikuji->updated_at : old("updated_at") }}"/>
                       @if($errors->has("updated_at"))
                        <span class="help-block">{{ $errors->first("updated_at") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('delete_flg')) has-error @endif">
                       <label for="delete_flg-field">Delete_flg</label>
                    <div class="btn-group" data-toggle="buttons"><label class="btn btn-primary"><input type="radio" value="true" name="delete_flg-field" id="delete_flg-field" autocomplete="off"> True</label><label class="btn btn-primary active"><input type="radio" name="delete_flg-field" value="false" id="delete_flg-field" autocomplete="off"> False</label></div>
                       @if($errors->has("delete_flg"))
                        <span class="help-block">{{ $errors->first("delete_flg") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('omikujis.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
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
