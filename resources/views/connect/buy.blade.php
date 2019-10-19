@extends('layouts.app')

@section('content')
<div class="container">
   
    <div class="row">
       
        <div class="col-md-8 col-md-offset-2">
            
            <!-- 設定画面 -->
                
            <div class="panel panel-default">
                <div class="panel-heading">
                    購入画面
                </div>
                <!--<a href="{{ url('/home/edit') }}">-->
  			    <a href="{{ url('/connect/confirm') }}">
  			        <div class="center_column">
  			            <h2>購入</h2>
  			        <div>
  			    </a>
            </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
