@extends('layouts.app')

@section('content')
<div class="container">
   
    <div class="row">
       
        <div class="col-md-8 col-md-offset-2">
            
            <br>
            <!-- 設定画面 -->
                
            <div class="panel panel-default">
                <div class="panel-heading">
                    設定
                </div>
                <div class="panel-body">
                    <a href="{{ url('/home/home_register') }}">
                        マイページ編集
                    </a>
                    <br>
                    その他<!--各種設定画面を用意-->
                </div>
                <div class="panel-heading">
                    履歴（入手金）
                </div>
                <div class="panel-body">
                    <a href="{{ url('/history') }}">
                       詳細 
                    </a>
                </div>
            </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
