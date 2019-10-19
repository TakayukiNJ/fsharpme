@extends('layout')
@section('header')
<div class="page-header">
        <h1>Mikujis / Show #{{$mikuji->id}}</h1>
        <form action="{{ route('mikujis.destroy', $mikuji->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('mikujis.edit', $mikuji->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                    <label for="nome">ID</label>
                    <p class="form-control-static"></p>
                </div>
                <div class="form-group">
                     <label for="name">おみくじのタイトル</label>
                     <p class="form-control-static">{{$mikuji->name}}</p>
                </div>
                <div class="form-group">
                     <label for="msg">おみくじの内容</label>
                     <p class="form-control-static">{{$mikuji->msg}}</p>
                </div>
                <div class="form-group">
                     <label for="price">一回の値段</label>
                     <p class="form-control-static">{{$mikuji->price}}</p>
                </div>
                <div class="form-group">
                     <label for="amount_all-field">おみくじの総数</label>
                     <p class="form-control-static">{{$mikuji->amount_all}}</p>
                </div>
                <div class="form-group">
                     <label for="return_big-field">大当たり優待の内容</label>
                     <p class="form-control-static">{{$mikuji->return_big}}</p>
                </div>
                <div class="form-group">
                     <label for="amount_big-field">大当たり優待の数</label>
                     <p class="form-control-static">{{$mikuji->amount_big}}</p>
                </div>
                <div class="form-group">
                     <label for="return_small-field">当たり優待の内容</label>
                     <p class="form-control-static">{{$mikuji->return_small}}</p>
                </div>
                <div class="form-group">
                     <label for="amount_small-field">当たり優待の数</label>
                     <p class="form-control-static">{{$mikuji->amount_small}}</p>
                </div>
                
                <div class="form-group">
                     <label for="published">PUBLISHED</label>
                     <p class="form-control-static">{{$mikuji->published}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('mikujis.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection