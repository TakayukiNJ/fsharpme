@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> 優待 / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">
            <form name="changeform" method="POST">
                    <div class="form-group">
                        <label for="premier_id-field">優待 ID</label>
                        <input type="text" id="premier_id-field" name="premier_id" class="form-control" value="{{ $premier_id }}" readonly="readonly"/>
                    </div>
                    <div class="form-group @if($errors->has('title')) has-error @endif">
                        <label for="title-field">タイトル</label>
                        <input type="text" id="title-field" name="title" class="form-control" value="{{ $title }}"/>
                        @if($errors->has("title"))
                           <span class="help-block">{{ $errors->first("title") }}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('image_id')) has-error @endif">
                        <label for="img_id-field">写真</label>
                        <IMG id='own_image' src='{{ $image_id }}'>
                        <INPUT TYPE="button" id="image_upload_button" value="　画　像　" onClick="ZZ1_run('SELL')" >
                        <INPUT TYPE="button" id="image_unload_button" value="　画像消す　" onClick="alert('対応中')" >
                        @if($errors->has("image_id"))
	                        <span class="help-block">{{ $errors->first("image_id") }}</span>
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('status')) has-error @endif">
                       <label for="status-field">ステータス</label>
                       <input type="text" id="status-field" name="status" class="form-control" value="{{ $status }}" readonly="readonly"/>
                       @if($errors->has("status"))
                           <span class="help-block">{{ $errors->first("status") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('published')) has-error @endif">
                       <label for="published-field">優待作成日</label>
                       <input type="text" id="published-field" name="published" class="form-control" value="{{ $published }}" readonly="readonly"/>
                       @if($errors->has("published"))
                           <span class="help-block">{{ $errors->first("published") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('description')) has-error @endif">
                       <label for="description-field">説明</label>
                       <input type="text" id="description-field" name="description" class="form-control" value="{{ $description }}"/>
                       @if($errors->has("description"))
                           <span class="help-block">{{ $errors->first("description") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('description_detail')) has-error @endif">
                       <label for="description_detail-field">説明詳細</label>
                       <textarea class="form-control" id="description-field" rows="3" name="description_detail">{{ $description_detail }}</textarea>
                       @if($errors->has("description_detail"))
                           <span class="help-block">{{ $errors->first("description_detail") }}</span>
                       @endif
                    </div>
<!--                      <div class="form-group @if($errors->has('participants')) has-error @endif">
                       <label for="participants-field">最大受付人数</label>
                       <input type="text" id="participants-field" name="participants" class="form-control" value="{{ $participants }}"/>
                       @if($errors->has("participants"))
                        <span class="help-block">{{ $errors->first("participants") }}</span>
                       @endif
                    </div>-->
                    <div class="form-group @if($errors->has('start_dt')) has-error @endif">
                       <label for="start_dt-field">入札開始日（年 月 日 時 分 秒）</label>
                    <div class="form-group{{ $errors->has('start_dt') || $errors->has('start_dt_year') || $errors->has('start_dt_month') || $errors->has('start_dt_day') ? ' has-error' : '' }}">
                        <div class="row">
                            <div class="col-md-2" style="width:120px">
                                <select id="start_dt_year" class="form-control" name="start_dt_year">
                                <option value="">----</option>
                                @for ($i = 2018; $i <= 2025; $i++)
                                <option value="{{ $i }}"@if(old('start_dt_year') == $i) selected @endif>{{ $i }}</option>
                                @endfor
                                </select>

                                @if ($errors->has('start_dt_year'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('start_dt_year') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-2" style="width:100px">
                                <select id="start_dt_month" class="form-control" name="start_dt_month">
                                <option value="">--</option>
                                @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}"@if(old('start_dt_month') == $i) selected @endif>{{ $i }}</option>
                                @endfor
                                </select>

                                @if ($errors->has('start_dt_month'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('start_dt_month') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-2" style="width:100px">
                                <select id="start_dt_day" class="form-control" name="start_dt_day">
                                <option value="">--</option>
                                @for ($i = 1; $i <= 31; $i++)
                                <option value="{{ $i }}"@if(old('start_dt_day') == $i) selected @endif>{{ $i }}</option>
                                @endfor
                                </select>

                                @if ($errors->has('start_dt_day'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('start_dt_day') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-2" style="width:100px">
                                <select id="start_dt_hour" class="form-control" name="start_dt_hour">
                                <option value="">--</option>
                                @for ($i = 1; $i <= 24; $i++)
                                <option value="{{ $i }}"@if(old('start_dt_hour') == $i) selected @endif>{{ $i }}</option>
                                @endfor
                                </select>

                                @if ($errors->has('start_dt_hour'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('start_dt_hour') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-2" style="width:100px">
                                <select id="start_dt_min" class="form-control" name="start_dt_min">
                                <option value="">--</option>
                                @for ($i = 0; $i <= 60; $i++)
                                <option value="{{ $i }}"@if(!is_null(old('start_dt_min')) && old('start_dt_min')) == $i) selected @endif>{{ $i }}</option>
                                @endfor
                                </select>

                                @if ($errors->has('start_dt_min'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('start_dt_min') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-2" style="width:100px">
                                <select id="start_dt_sec" class="form-control" name="start_dt_sec">
                                <option value="">--</option>
                                @for ($i = 0; $i <= 60; $i++)
                                <option value="{{ $i }}"@if(!is_null(old('start_dt_min')) && old('start_dt_sec') == $i) selected @endif>{{ $i }}</option>
                                @endfor
                                </select>

                                @if ($errors->has('start_dt_sec'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('start_dt_sec') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('end_dt')) has-error @endif">
                       <label for="end_dt-field">入札終了日（年 月 日 時 分 秒）</label>
                    <div class="form-group{{ $errors->has('end_dt') || $errors->has('end_dt_year') || $errors->has('end_dt_month') || $errors->has('end_dt_day') ? ' has-error' : '' }}">
                        <div class="row">
                            <div class="col-md-2" style="width:120px">
                                <select id="end_dt_year" class="form-control" name="end_dt_year">
                                <option value="">----</option>
                                @for ($i = 2018; $i <= 2025; $i++)
                                <option value="{{ $i }}"@if(old('end_dt_year') == $i) selected @endif>{{ $i }}</option>
                                @endfor
                                </select>

                                @if ($errors->has('end_dt_year'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('end_dt_year') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-2" style="width:100px">
                                <select id="end_dt_month" class="form-control" name="end_dt_month">
                                <option value="">--</option>
                                @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}"@if(old('end_dt_month') == $i) selected @endif>{{ $i }}</option>
                                @endfor
                                </select>

                                @if ($errors->has('end_dt_month'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('end_dt_month') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-2" style="width:100px">
                                <select id="end_dt_day" class="form-control" name="end_dt_day">
                                <option value="">--</option>
                                @for ($i = 1; $i <= 31; $i++)
                                <option value="{{ $i }}"@if(old('end_dt_day') == $i) selected @endif>{{ $i }}</option>
                                @endfor
                                </select>

                                @if ($errors->has('end_dt_day'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('end_dt_day') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-2" style="width:100px">
                                <select id="end_dt_hour" class="form-control" name="end_dt_hour">
                                <option value="">--</option>
                                @for ($i = 1; $i <= 24; $i++)
                                <option value="{{ $i }}"@if(old('end_dt_hour') == $i) selected @endif>{{ $i }}</option>
                                @endfor
                                </select>

                                @if ($errors->has('end_dt_hour'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('end_dt_hour') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-2" style="width:100px">
                                <select id="end_dt_min" class="form-control" name="end_dt_min">
                                <option value="">--</option>
                                @for ($i = 0; $i <= 60; $i++)
                                <option value="{{ $i }}"@if(!is_null(old('start_dt_min')) && old('end_dt_min') == $i) selected @endif>{{ $i }}</option>
                                @endfor
                                </select>

                                @if ($errors->has('end_dt_min'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('end_dt_min') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-2" style="width:100px">
                                <select id="end_dt_sec" class="form-control" name="end_dt_sec">
                                <option value="">--</option>
                                @for ($i = 0; $i <= 60; $i++)
                                <option value="{{ $i }}"@if(!is_null(old('start_dt_min')) && old('end_dt_sec') == $i) selected @endif>{{ $i }}</option>
                                @endfor
                                </select>

                                @if ($errors->has('end_dt_sec'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('end_dt_sec') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('bidder_price')) has-error @endif">
                       <label for="bidder_price-field">確定優待販売金額</label>
                       <input type="text" id="bidder_price-field" name="bidder_price" class="form-control" value="{{ $bidder_price }}"/>
                       @if($errors->has("bidder_price"))
                        <span class="help-block">{{ $errors->first("bidder_price") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('max_price')) has-error @endif">
                       <label for="bidder_price-field">最大入札可能額</label>
                       <input type="text" id="max_price-field" name="max_price" class="form-control" value="{{ $max_price }}"/>
                       @if($errors->has("max_price"))
                        <span class="help-block">{{ $errors->first("max_price") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('min_price')) has-error @endif">
                       <label for="min_price-field">最低入札可能額</label>
                       <input type="text" id="min_price-field" name="min_price" class="form-control" value="{{ $min_price }}"/>
                       @if($errors->has("min_price"))
                        <span class="help-block">{{ $errors->first("min_price") }}</span>
                       @endif
                    </div>
<!--                <div class="form-group @if($errors->has('max_bid_participants')) has-error @endif">
                       <label for="max_bid_participants-field">入札可能最大人数</label>
                       <input type="text" id="max_bid_participants-field" name="max_bid_participants" class="form-control" value="{{ $max_bid_participants }}"/>
                       @if($errors->has("max_bid_participants"))
                        <span class="help-block">{{ $errors->first("max_bid_participants") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('min_bid_participants')) has-error @endif">
                       <label for="min_bid_participants-field">入札有効最小人数</label>
                       <input type="text" id="min_bid_participants-field" name="min_bid_participants" class="form-control" value="{{ $min_bid_participants }}"/>
                       @if($errors->has("min_bid_participants"))
                        <span class="help-block">{{ $errors->first("min_bid_participants") }}</span>
                       @endif
                    </div> -->
                <div class="well well-sm">
                    <button type="button" class="btn btn-primary" onClick="E04_2_run()">確認</button>
                    <a class="btn btn-link pull-right" onClick="H01_run()"><i class="glyphicon glyphicon-backward"></i> 戻る</a>
                </div>
{{ csrf_field() }}
            </form>

        </div>
    </div>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('.date-picker').datepicker({
    });
  </script>
<script type="text/javascript">
/* 新おみくじ登録確認画面 */
function E04_2_run() {
    window.document.changeform.action = "{{ url('connect/sell_detail_regist_confirm') }}";
    window.document.changeform.method = "POST";
    window.document.changeform.submit();
}
function H01_run() {
	window.document.changeform.action = "{{ url('home/home_own_timeline') }}";
    window.document.changeform.method = "POST";
    window.document.changeform.submit();
}
</script>
@endsection
