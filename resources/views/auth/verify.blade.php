@extends('layouts.common_chat')
@include('layouts.head_chat')
@include('layouts.script')
@include('layouts.nav_lp')
@section('content')

<div class="page-header section-dark" style="background-image: url('/img/farid-askerov.jpg')">
    <div class="content-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">メール認証をしてください。<br>{{ __('Verify Your Email Address') }}</div>



                        <div class="card-body">
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">

                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                            @endif
                            登録したメールアドレスに、認証用のメールを送りましたのでご確認ください。もし届いていない場合、
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">こちらをクリックしてください。</button>.
                            </form>
                            <br>
                            {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email') }},
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@include('layouts.footer')
