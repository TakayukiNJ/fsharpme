@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<br>
<div class="col-md-8 col-md-offset-2">
    <div class="container">
        <h1><span style="color: rgb(70, 70, 70);">ご利用、誠にありがとうございます。</span></h1>
        <div><br></div>
    </div>

    <div>すぐに反映されない場合がございますが、1週間以内にWebサイトに反映いたしますので、しばらくお待ちください。</div>
    <div><br></div>
    <div><a href="{{ url('home/home_own_timeline') }}">マイページに戻る</a>&nbsp;</div>
</div><br>
@endsection
