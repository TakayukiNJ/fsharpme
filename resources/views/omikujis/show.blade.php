@extends('layout')
@section('header')
<div class="page-header">
        <h1>Omikujis / Show #{{$omikuji->id}}</h1>
        <form action="{{ route('omikujis.destroy', $omikuji->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('omikujis.edit', $omikuji->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                     <label for="name">NAME</label>
                     <p class="form-control-static">{{$omikuji->name}}</p>
                </div>
                    <div class="form-group">
                     <label for="msg">MSG</label>
                     <p class="form-control-static">{{$omikuji->msg}}</p>
                </div>
                    <div class="form-group">
                     <label for="price">PRICE</label>
                     <p class="form-control-static">{{$omikuji->price}}</p>
                </div>
                    <div class="form-group">
                     <label for="return_big">RETURN_BIG</label>
                     <p class="form-control-static">{{$omikuji->return_big}}</p>
                </div>
                    <div class="form-group">
                     <label for="return_small">RETURN_SMALL</label>
                     <p class="form-control-static">{{$omikuji->return_small}}</p>
                </div>
                    <div class="form-group">
                     <label for="amount_all">AMOUNT_ALL</label>
                     <p class="form-control-static">{{$omikuji->amount_all}}</p>
                </div>
                    <div class="form-group">
                     <label for="amount_big">AMOUNT_BIG</label>
                     <p class="form-control-static">{{$omikuji->amount_big}}</p>
                </div>
                    <div class="form-group">
                     <label for=" amount_small"> AMOUNT_SMALL</label>
                     <p class="form-control-static">{{$omikuji-> amount_small}}</p>
                </div>
                    <div class="form-group">
                     <label for="published">PUBLISHED</label>
                     <p class="form-control-static">{{$omikuji->published}}</p>
                </div>
                    <div class="form-group">
                     <label for="end">END</label>
                     <p class="form-control-static">{{$omikuji->end}}</p>
                </div>
                    <div class="form-group">
                     <label for="created_at">CREATED_AT</label>
                     <p class="form-control-static">{{$omikuji->created_at}}</p>
                </div>
                    <div class="form-group">
                     <label for="updated_at">UPDATED_AT</label>
                     <p class="form-control-static">{{$omikuji->updated_at}}</p>
                </div>
                    <div class="form-group">
                     <label for="delete_flg">DELETE_FLG</label>
                     <p class="form-control-static">{{$omikuji->delete_flg}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('omikujis.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection