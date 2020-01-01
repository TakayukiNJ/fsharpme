@extends('layouts.common_chat')
@include('layouts.head_chat')
@include('layouts.script')
@include('layouts.nav_lp')
@section('content')
    <div id="description-areas">
        {{--     *********    HEADERS     *********      --}}
        <div class="cd-section" id="headers">
            <div class="cd-section section-white" id="chats">
                <div class="container">
                    <div class="space-top"></div>
                    <h2 class="title">　</h2>
                    <div class="row">
                        <div class="col-md-8 ml-auto mr-auto">
                            <br>
                            <h5 class="text-center">
                                <a href="{{ url('/') }}/{{ $user_info->name }}">{{ $user_info->name }}</a>さんへのメッセージ
                            </h5>
                            <form class="contact-form" action="{{ action('ChatController@sendMessage') }}" method="POST">
                                <label>プロジェクト名</label>
                                <input name="from" class="form-control" value="{{ $project_info->npo_name }}" readonly="readonly">
                                <label>宛先</label>
                                <input name="to" class="form-control" value="{{ $user_info->name }}" readonly="readonly">
                                <label>内容</label>
                                <textarea name="message" class="form-control" rows="4" placeholder="ここに内容を記述してください。" required></textarea>
                                <div class="row">
                                    <div class="col-md-4 offset-md-4">
                                        <button class="btn btn-danger btn-lg btn-fill">送信</button>
                                    </div>
                                </div>
                                {!! csrf_field() !!}
                            </form>
                        </div>

                        <div class="col-md-8 ml-auto mr-auto">
                            <div class="media">
                            </div>
                            @for ($i = 0; $i < count($message); $i++)
                                <div class="media">
                                    <a class="pull-left" href="{{ url('/') }}/{{ $message[$i]->from }}">
                                        <div class="avatar big-avatar">
                                            @if($user_info->name == $message[$i]->from)
                                                <a href="{{ url('/') }}/home/{{ $user_info->name }}">
                                                    @if("placeholder.jpg" != $profile_pic)
                                                        <img class="media-object" alt="64x64" src="{{ asset('storage/img/personal_info/')}}/{{ $profile_pic }}">
                                                    @else
                                                        <img class="media-object" alt="64x64" src="{{ url('/') }}/../img/placeholder.jpg" alt="default">
                                                    @endif
                                                </a>
                                            @else
                                                <a href="{{ url('/'.$project_info->title.'/'.$project_info->npo_name) }}">
                                                    @if(!empty($project_info->background_pic))
                                                        <img class="media-object" alt="64x64" src="{{ asset('storage//img/project_back')}}/{{ $project_info->background_pic }}">
                                                    @else
                                                        <img class="media-object" alt="64x64" src="https://images.unsplash.com/photo-1486310662856-32058c639c65?dpr=2&auto=format&fit=crop&w=1500&h=1125&q=80&cs=tinysrgb&crop=">
                                                    @endif
                                                </a>
                                            @endif
                                        </div>
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading pull-left">{{ $message[$i]->from }} </h4>
                                        <div class="right">
                                            <br>
                                            <br><!--<a href="#paper-kit" class="btn btn-default btn-round ">　</a>-->
                                        </div>
                                        <p class="media-heading pull-left">{{ $message[$i]->message }}</p>
                                        {{--<p class="media-heading pull-left">{{ $message[$i]->created_at }}</p>--}}
                                    </div>
                                    <p> {{ $message[$i]->created_at }}</p>
                                </div>

                            @endfor
                        </div>
                    </div>
                </div>
            </div>

        </div>
        {{--
        @if($mail_message == "")
        <div class="section section-gray">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto text-center">
                        <h2 class="title">{!! nl2br(e(trans($npo_info->subtitle))) !!}に関するお問い合わせ</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto text-center">
                        <form action="/{{$npo_info->npo_name}}/send_mail" method="POST" class="contact">
                            {!! csrf_field() !!}
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="Name（お名前）" value="{{!Auth::guest() ? Auth::user()->name : ''}}">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="email" class="form-control" placeholder="Email（メールアドレス）" value="{{!Auth::guest() ? Auth::user()->email : ''}}">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" name="title" class="form-control" placeholder="Subject（タイトル）" value="{!! nl2br(e(trans($npo_info->subtitle))) !!}に関して">
                                </div>
                            </div>
                            <br>
                            <textarea class="form-control" name="message" placeholder="Message（お問い合わせ内容）" rows="7" ></textarea>
                            <br>
                            <div class="row">
                                <div class="col-md-6 ml-auto mr-auto">
                                    <button type="submit" class="btn btn-primary btn-block btn-round">送信</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @else
            {{$mail_message}}
        @endif
        --}}<br>
    </div>
@endsection
@include('layouts.footer')
