@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <!-- フォロー処理 -->

            <div class="panel panel-default">
                <div class="panel-heading">
                    フォロー処理
                </div>
                <div class="panel-body">
                    ID:{{ $id }}
                    USER:{{ $user }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
