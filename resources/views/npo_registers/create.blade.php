@extends('layouts.common_nav_lp')
@include('layouts.head_npo_create')
@include('layouts.script')
@include('layouts.nav_lp')
@section('content')
<div class="cd-section" id="headers">
    <div class="page-header" style="background-image: url('https://images.unsplash.com/photo-1486310662856-32058c639c65?dpr=2&auto=format&fit=crop&w=1500&h=1125&q=80&cs=tinysrgb&crop=');">
        <div class="filter"></div>
            <div class="content-center">
                <div class="container">
                    <form enctype="multipart/form-data" action="{{ route('npo_registers.store') }}" method="POST">
                        <div class="row">
                            <div class="col-md-7 content-center">
                                {{--
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <br>
                                    <div class="fileinput-new thumbnail img-no-padding" style="max-width: 100px; max-height: 100px;">
                                        @if($npo_info)
                                            @if($npo_info->avater)
                                            <img src='/img/project_logo/{{ $npo_info->avater }}' alt="{{ Auth::user()->npo }}">
                                            @else
                                            <img src="{{ url('/') }}/../img/placeholder.jpg" alt="default">
                                            @endif
                                        @else
                                            <img src="{{ url('/') }}/../img/placeholder.jpg" alt="default">
                                        @endif
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail img-no-padding" style="max-width: 100px; max-height: 100px;"></div>
                                    <div>
                                        <span class="btn btn-outline-neutral btn-round btn-file"><span class="fileinput-new">ロゴ変更</span><span class="fileinput-exists">ロゴ変更</span><input type="file" name="avater"></span>
                                        <a href="#paper-kit" class="btn btn-link btn-danger fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> 削除</a>
                                    </div>
                                    <br>
                                </div>
                                --}}

                                @include('error')

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    @if ((Auth::user()->npo) == "")
                                    <div class="form-group @if($errors->has('title')) has-error @endif">
                                        <label for="title-field">団体名(半角英数) ※あとで変更不可</label>
                                        @if($errors->has("title"))
                                            <br><span class="help-block">{{ $errors->first("title") }}</span>
                                        @endif
                                        <input type="text" id="title-field" name="title" class="form-control text-center" value="{{ old("title") }}"/>
                                    </div>
                                    @else
                                    <div class="form-group @if($errors->has('subtitle')) has-error @endif">
                                        <label for="subtitle-field">プロジェクト名</label>
                                        @if($errors->has("subtitle"))
                                            <br><span class="help-block">{{ $errors->first("subtitle") }}</span>
                                        @endif
                                        <input type="text" id="subtitle-field" name="subtitle" class="form-control text-center" value="{{ old("subtitle") }}" required/>
                                    </div>
                                    <input type="hidden" id="title-field" name="title" class="form-control text-center" value="{{ Auth::user()->npo }}"/>
                                    {{-- 一口の値段 --}}
                                    {{--<div class="form-group @if($errors->has('support_amount')) has-error @endif">--}}
                                        {{--<label for="support_amount-field">一口の値段（6桁まで）</label>--}}
                                        {{--@if($errors->has("support_amount"))--}}
                                            {{--<br><span class="help-block">{{ $errors->first("support_amount") }}</span>--}}
                                        {{--@endif--}}
                                        {{--<input type="text" id="support_amount-field" name="support_amount" class="form-control text-center" value="{{ old("support_amount") }}"/>--}}
                                    {{--</div>--}}
                                    {{-- 募集支援数 --}}
                                    {{--<div class="form-group @if($errors->has('support_limit')) has-error @endif">--}}
                                        {{--<label for="support_limit-field">最大支援数（9桁まで）</label>--}}
                                        {{--@if($errors->has("support_limit"))--}}
                                            {{--<br><span class="help-block">{{ $errors->first("support_limit") }}</span>--}}
                                        {{--@endif--}}
                                        {{--<input type="text" id="support_limit-field" name="support_limit" class="form-control text-center" value="{{ old("support_limit") }}"/>--}}
                                    {{--</div>--}}
                                    @endif
                                <div class="well well-sm">
                                    <button type="submit" class="btn btn-outline-neutral btn-fill">作成</button>
                                </div>
                                {!! csrf_field() !!}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('.date-picker').datepicker({
    });
  </script>
@endsection
@include('layouts.footer')
