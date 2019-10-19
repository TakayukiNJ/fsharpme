@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <!-- ログインユーザ管理 -->

            <div class="panel panel-default">
                <div class="panel-heading">
                    ログインユーザ管理
                </div>
                <div class="panel-body">
        			@foreach($list as $item)
        				{{ $item->id }} {{ $item->name }}<BR>
        			@endforeach
                </div>
            </div>

            </div>
        </div>
    </div>
</div>
@endsection
