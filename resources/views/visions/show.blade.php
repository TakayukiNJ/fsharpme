@extends('layout')
@section('header')
<div class="page-header">
        <h1>Visions / Show #{{$vision->id}}</h1>
        <form action="{{ route('visions.destroy', $vision->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('visions.edit', $vision->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                     <label for="title">タイトル</label>
                     <p class="form-control-static">{{$vision->title}}</p>
                </div>
                    <div class="form-group">
                     <label for="msg">詳細</label>
                     <p class="form-control-static">{{$vision->msg}}</p>
                </div>
                    <div class="form-group">
                     <label for="img">写真</label>
                     <p class="form-control-static">{{$vision->img}}</p>
                </div>
                    <div class="form-group">
                     <label for="published">こうかい</label>
                     <p class="form-control-static">{{$vision->published}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('visions.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection