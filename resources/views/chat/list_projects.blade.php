@extends('layouts.common_chat')
@include('layouts.head_chat')
@include('layouts.script')
@include('layouts.nav_lp')
@section('content')

    {{--<body class="search">--}}

    <div class="wrapper">

        <div class="main">
            <div class="section section-white section-search">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-12 ml-auto mr-auto text-center">
                            {{--<form role="search" class="form-inline search-form">--}}
                            {{--<div class="input-group no-border">--}}
                            {{--<span class="input-group-addon addon-xtreme no-border" id="basic-addon1"><i class="fa fa-search"></i></span>--}}
                            {{--<input type="text" class="form-control input-xtreme no-border" placeholder="Find Stuff" aria-describedby="basic-addon1">--}}
                            {{--</div>--}}
                            {{--</form>--}}
                            <a href="{{ url('/') }}/home/chat/list" class="btn btn-outline-default">
                                個人のチャットルームはこちら
                            </a>
                            <ul class="list-unstyled follows">
                                @for ($i = 0; $i < count($npo_registers); $i++)
                                    <li>
                                        <div class="row">
                                            {{--<div class="col-md-2 col-3">--}}
                                            {{--@if($personal_info ?? '')--}}
                                            {{--@if($personal_info->image_id)--}}
                                            {{--<img src="{{ asset('storage/img/personal_info/'.$personal_info->image_id) }}" alt="image" class="img-circle img-no-padding img-responsive">--}}
                                            {{--@else--}}
                                            {{--<img src="{{ url('/') }}/../img/placeholder.jpg" alt="default" class="img-circle img-no-padding img-responsive">--}}
                                            {{--@endif--}}
                                            {{--@else--}}
                                            {{--<img src="{{ url('/') }}/../img/placeholder.jpg" alt="default" class="img-circle img-no-padding img-responsive">--}}
                                            {{--@endif--}}
                                            {{--</div>--}}
                                            <div class="col-md-10 col-9 description">
                                                <h5>
                                                    {{ $npo_registers[$i]->subtitle }}
                                                    {{--@if(0 < $value3)--}}
                                                        {{--<small class="text-danger">未読 <b >{{ $npo_registers->title }}</b>件</small>--}}
                                                    {{--@endif--}}
                                                    <br>
{{--                                                    <small><a href="{{ url("/") }}/{{ $npo_registers->title }}">{{ $npo_registers->title }}</a></small>--}}
                                                </h5>
                                            </div>
                                            <div class="col-md-2 col-3 nav-item">
                                                {{--<span class="label label-danger notification-bubble">2</span>--}}
{{--                                                @if(0 < $value3)--}}
                                                    {{--<button type="button" class="btn btn-danger btn-just-icon btn-lg"><i class="nc-icon nc-chat-33"></i></button>--}}
                                                {{--@else--}}
                                                    <a href="{{ url('/') }}/{{ $npo_registers[$i]->title }}/{{ $npo_registers[$i]->npo_name }}/chat/list" class="btn btn-outline-default">
                                                        Go
                                                    </a>
                                                    {{--<button type="button" class="btn btn-default btn-just-icon btn-lg" onclick="location.href=''"><i class="nc-icon nc-chat-33"></i></button>--}}
                                                {{--@endif--}}
                                            </div>
                                        </div>
                                    </li>
                                @endfor
                                {{--<li>--}}
                                {{--<div class="row">--}}
                                {{--<div class="col-md-2 col-3">--}}
                                {{--<img src="../assets/img/faces/clem-onojeghuo-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">--}}
                                {{--</div>--}}
                                {{--<div class="col-md-6 col-4 description">--}}
                                {{--<h5>Oleg Clem<br /><small>Web Designer</small></h5>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-2 col-2">--}}
                                {{--<button class="btn btn-just-icon btn-round btn-outline-danger btn-tooltip" rel="tooltip" title="follow"><i class="fa fa-plus"></i></button>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</li>--}}

                            </ul>

                            {{--<div class="text-missing">--}}
                            {{--<h5 class="text-muted">If you are not finding who you’re looking for try using an email address. </h5>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    {{--</body>--}}
@endsection
@include('layouts.footer')
