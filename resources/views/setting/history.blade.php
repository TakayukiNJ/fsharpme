@extends('layouts.app')

@section('content')
<div class="container">
   
    <div class="row">
       
        <div class="col-md-8 col-md-offset-2">
            
            <!-- 設定画面 -->
                
            <div class="panel panel-default">
                
                <div class="panel-heading">
                    履歴（入出金）
                </div>
                <div class="panel-body">
                    <a href="{{ url('/history') }}">
                       なし 
                    </a>
                </div>
                
            </div>
                
        </div>
    </div>
</div>
@endsection