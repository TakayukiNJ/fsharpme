@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<style type="text/css">
TABLE.table-list-main{
  border: inset 2px #999999;
  margin:2px;
  width:98%;
  font-size:40px;
}

TR.tr-list-main{
  border: inset 2px #999999;
  margin:2px;
  font-size:40px;
}

TD.td-list-header{
  border: inset 2px #999999;
  background-color: #d0d0d0;
  margin:2px;
  font-size:40px;
  height:50px;
}
TD.td-list-main{
  border: inset 2px #999999;
  margin:2px;
  font-size:40px;
  height:200px;
}

div.submit_button {
 text-align : center;
}
#tableA tr:nth-child(odd) {  
  background-color: #EEEEFF;
}  
#tableA tr:nth-child(even) {  
  background-color: #FFEEFF;  
}  
#tableA tr:hover {
  background-color: #CCCCFF;    /* 行の背景色style="background-color: #FF8888;" */
}
</style>

<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:1200px">

  <!-- First Photo Grid-->
  <div class="w3-row-padding w3-padding-16 w3-center" id="food">
     @foreach($collections as $row)
    <!--<div class="w3-quarter" onClick="location.href='{{url('/'). '/'. $row->name}}'">-->
    <div class="w3-quarter">
         <img src="{{ asset('/images'). '/'. $row->image_id }}" alt="{{$row->name}}" style="width:100%">
         <p>#{{ $row->user_name_sei_roma }}{{ $row->user_name_mei_roma }}</p>
     </div>
	   @endforeach
  </div>

  <div class="w3-row-padding w3-padding-16 w3-center" id="food">
    <!--<div class="w3-quarter" onClick="location.href='{{url('/'). '/'. $row->name}}'">-->
    <div class="w3-quarter" onClick="location.href='{{url('/2hj')}}'">
      <img src="{{ url('/') }}/../img/contents/2hj.jpg" alt="Steak" style="width:100%">
      <h3>セカンドハーベストジャパン</h3>
      <p>#全ての人に、食べ物を。</p>
    </div>
  </div>

  <!-- larvelではページネーションを使う。 -->
  <div class="w3-center w3-padding-32">
    <div class="w3-bar">
      <a href="#" class="w3-bar-item w3-button w3-hover-black">«</a>
      <a href="#" class="w3-bar-item w3-black w3-button">1</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">2</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">3</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">4</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">»</a>
    </div>
  </div>
<form name="changeform">
{{ csrf_field() }}
</form>
@endsection
