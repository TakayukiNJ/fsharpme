@extends('home.common_home_lp')
@include('home.head_profile')
@include('layouts.nav_lp')
@include('layouts.script')
@section('content')
<div class="wrapper">
    <div class="page-header page-header-xs settings-background" style="background-image: url('{{ url('/') }}/../img/sections/joshua-earles.jpg');">
        <div class="filter"></div>
    </div>
    <div class="profile-content section">
        <div class="container">
            <form enctype="multipart/form-data" name="changeform" method="POST" action="{{ url('/home/home_register_update') }}">
                <div class="row">
                    <div class="profile-picture">
    					<div class="fileinput fileinput-new" data-provides="fileinput" name="image_id">
                            <div class="fileinput-new img-no-padding">
                                @if($image_id)
                                    <img src='/img/personal_info/{{ $image_id }}' alt="{{ Auth::user()->name }}">
                                @else
                                    <img src="{{ url('/') }}/../img/placeholder.jpg" alt="default">
                                @endif
                            </div>
                            <div class="fileinput-preview fileinput-exists img-no-padding"></div>
                            <div class="text-center">
                                <span class="btn btn-outline-default btn-file btn-round"><span class="fileinput-new">画像変更</span><span class="fileinput-exists">画像変更</span><input type="file" name="image_id"></span>
                                <br />
                                <a href="#cancel" class="btn btn-link btn-danger fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> キャンセル</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 ml-auto mr-auto">
                    {{-- 自己紹介・説明文 --}}
                    <div class="form-group @if($errors->has('description')) has-error @endif">
                        <label for="description-field">自己紹介（説明）文</label>
						<textarea id="description-field" name="description" class="form-control textarea-limited" placeholder="紹介文の文字数は150字までです。" rows="6", maxlength="150">{{ is_null(old("description")) ? $description : old("description") }}</textarea>
						<h5><small><span id="textarea-limited-message" class="pull-right">残り150文字</span></small></h5>
						@if($errors->has("description"))
                           <span class="help-block form-control-feedback">{{ $errors->first("description") }}</span>
                        @endif
                    </div>
                    <br>
                    <div class="text-center">
                        <button type="submit" class="btn btn-wd btn-outline-default">保存</button>
                    </div>
                </div>
                <br>
                <div class="nav-tabs-navigation">
                    <h4>以下詳細の編集(個人か法人を選択)</h4>
                    <div class="nav-tabs-wrapper">
                        <br>
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#personal" role="tab">個人</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#enterprise" role="tab">法人</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        @include('error')
                            <div class="tab-content">
                                <div class="tab-pane" id="personal" role="tabpanel">
                                    {{-- 漢字 --}}
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group @if($errors->has('user_name_sei_kanji')) has-error @endif">
                                                <label for="user_name_sei_kanji-field">姓</label>
                                                <input type="text" id="user_name_sei_kanji-field" name="user_name_sei_kanji" class="form-control border-input" placeholder="佐藤" value="{{ is_null(old("user_name_sei_kanji")) ? $user_name_sei_kanji : old("user_name_sei_kanji") }}"/>
                                                @if($errors->has("user_name_sei_kanji"))
                                                   <span class="help-block form-control-feedback">{{ $errors->first("user_name_sei_kanji") }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group @if($errors->has('user_name_mei_kanji')) has-error @endif">
                                                <label for="user_name_mei_kanji-field">名</label>
                                                <input type="text" id="user_name_mei_kanji-field" name="user_name_mei_kanji" class="form-control border-input" placeholder="一郎" value="{{ is_null(old("user_name_mei_kanji")) ? $user_name_mei_kanji : old("user_name_mei_kanji") }}"/>
                                                @if($errors->has("user_name_mei_kanji"))
                                                   <span class="help-block form-control-feedback">{{ $errors->first("user_name_mei_kanji") }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    {{-- ふりがな --}}
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group @if($errors->has('user_name_sei_kana')) has-error @endif">
                                                <label for="user_name_sei_kana-field">せい</label>
                                                <input type="text" id="user_name_sei_kana-field" name="user_name_sei_kana" class="form-control border-input" placeholder="さとう" value="{{ is_null(old("user_name_sei_kana")) ? $user_name_sei_kana : old("user_name_sei_kana") }}"/>
                                                @if($errors->has("user_name_sei_kana"))
                                                   <span class="help-block form-control-feedback">{{ $errors->first("user_name_sei_kana") }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group @if($errors->has('user_name_mei_kana')) has-error @endif">
                                                <label for="user_name_mei_kana-field">めい</label>
                                                <input type="text" id="user_name_mei_kana-field" name="user_name_mei_kana" class="form-control border-input" placeholder="いちろう" value="{{ is_null(old("user_name_mei_kana")) ? $user_name_mei_kana : old("user_name_mei_kana") }}"/>
                                                @if($errors->has("user_name_mei_kana"))
                                                   <span class="help-block form-control-feedback">{{ $errors->first("user_name_mei_kana") }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- 法人名 --}}
                                <div class="tab-pane" id="enterprise" role="tabpanel">
                                    <div class="form-group @if($errors->has('company_name')) has-error @endif">
                                        <label for="company_name-field">法人名(登録後の変更不可)</label>
                                        <input type="text" id="company_name-field" name="company_name" class="form-control border-input" placeholder="株式会社エフ・シャープ" value="{{ is_null(old("company_name")) ? Auth::user()->npo : old("company_name") }}" {{ !Auth::user()->npo ? '' : 'readonly="readonly"'}}/>
                                        @if($errors->has("company_name"))
                                           <span class="help-block form-control-feedback">{{ $errors->first("company_name") }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group @if($errors->has('company_profile_title')) has-error @endif">
                                        <label for="company_profile_title-field">よみがな</label>
                                        <input type="text" id="company_profile_title-field" name="company_profile_title" class="form-control border-input" placeholder="かぶしきがいしゃえふしゃーぷ" value="{{ is_null(old("company_profile_title")) ? $company_profile_title : old("company_profile_title") }}"/>
                                        @if($errors->has("company_profile_title"))
                                           <span class="help-block form-control-feedback">{{ $errors->first("company_profile_title") }}</span>
                                        @endif
                                    </div>
                                </div>
                                
                                
                            {{-- ユーザー名 --}}
                            <div class="form-group">
                                <label>ユーザー名</label>
                                <input type="text" class="form-control border-input" value="{{ Auth::user()->name }}" readonly="readonly"/>
                            </div>
                            {{-- メールアドレス --}}
                            <div class="form-group">
                                <label>メールアドレス</label>
                                <input type="text" class="form-control border-input" value="{{ Auth::user()->email }}" readonly="readonly"/>
                            </div>
                            {{-- 郵便番号(ハイフン無し半角英数) --}}
                            <div class="form-group @if($errors->has('post_up')) has-error @endif">
                                <label for="post_up-field">郵便番号(ハイフン無し半角英数)</label>
                                <input type="text" id="post_up-field" name="post_up" class="form-control border-input" placeholder="1010062" value="{{ is_null(old("post_up")) ? $post_up : old("post_up") }}"/>
                                @if($errors->has("post_up"))
                                <span class="help-block form-control-feedback">{{ $errors->first("post_up") }}</span>
                                @endif
                            </div>
                            {{-- 住所 --}}
                            <div class="form-group @if($errors->has('address_1')) has-error @endif">
                                <label for="address_1-field">住所</label>
                                <input type="text" id="address_1-field" name="address_1" class="form-control border-input" placeholder="東京都千代田区神田駿河台4-6 ソラシティ 3F" value="{{ is_null(old("address_1")) ? $address_1 : old("address_1") }}"/>
                                @if($errors->has("address_1"))
                                   <span class="help-block form-control-feedback">{{ $errors->first("address_1") }}</span>
                                @endif
                            </div>
                            {{-- 電話番号(ハイフン無し半角英数) --}}
                            <div class="form-group @if($errors->has('home_tel')) has-error @endif">
                                <label for="home_tel-field">電話番号(ハイフン無し半角英数)</label>
                                <input type="text" id="home_tel-field" name="home_tel" class="form-control border-input" placeholder="05054353202" value="{{ is_null(old("home_tel")) ? $home_tel : old("home_tel") }}"/>
                                @if($errors->has("home_tel"))
                                   <span class="help-block form-control-feedback">{{ $errors->first("home_tel") }}</span>
                                @endif
                            </div>
                            
                            {{-- 銀行名 --}}
                            <div class="form-group @if($errors->has('bank_name')) has-error @endif">
                                <label for="bank_name-field">銀行名</label>
                                <input type="text" id="bank_name-field" name="bank_name" class="form-control border-input" placeholder="三菱ＵＦＪ銀行" value="{{ is_null(old("bank_name")) ? $bank_name : old("bank_name") }}"/>
                                @if($errors->has("bank_name"))
                                   <span class="help-block form-control-feedback">{{ $errors->first("bank_name") }}</span>
                                @endif
                            </div>
                            {{-- 支店名 --}}
                            <div class="form-group @if($errors->has('bank_branch')) has-error @endif">
                                <label for="bank_branch-field">支店名</label>
                                <input type="text" id="bank_branch-field" name="bank_branch" class="form-control border-input" placeholder="代々木支店" value="{{ is_null(old("bank_branch")) ? $bank_branch : old("bank_branch") }}"/>
                                @if($errors->has("bank_branch"))
                                   <span class="help-block form-control-feedback">{{ $errors->first("bank_branch") }}</span>
                                @endif
                            </div>
                            {{-- 口座番号(7桁) --}}
                            <div class="form-group @if($errors->has('bank_account_number')) has-error @endif">
                                <label for="bank_account_number-field">口座番号(7桁)</label>
                                <input type="text" id="bank_account_number-field" name="bank_account_number" class="form-control border-input" placeholder="1234567" value="{{ is_null(old("bank_account_number")) ? $bank_account_number : old("bank_account_number") }}"/>
                                @if($errors->has("bank_account_number"))
                                   <span class="help-block form-control-feedback">{{ $errors->first("bank_account_number") }}</span>
                                @endif
                            </div>
                            {{-- 口座種別 --}}
                            <div class="form-group @if($errors->has('bank_type_account')) has-error @endif">
                                <label for="bank_type_account-field">口座種別</label>
                                <input type="text" id="bank_type_account-field" name="bank_type_account" class="form-control border-input" placeholder="普通預金" value="{{ is_null(old("bank_type_account")) ? $bank_type_account : old("bank_type_account") }}"/>
                                @if($errors->has("bank_type_account"))
                                   <span class="help-block form-control-feedback">{{ $errors->first("bank_type_account") }}</span>
                                @endif
                            </div>
                            {{-- 口座名義カナ(全角) --}}
                            <div class="form-group @if($errors->has('bank_account_name')) has-error @endif">
                                <label for="bank_account_name-field">口座名義カナ(全角)</label>
                                <input type="text" id="bank_account_name-field" name="bank_account_name" class="form-control border-input" placeholder="テ゛シ゛タルハリウツト゛（カ" value="{{ is_null(old("bank_account_name")) ? $bank_account_name : old("bank_account_name") }}"/>
                                @if($errors->has("bank_account_name"))
                                   <span class="help-block form-control-feedback">{{ $errors->first("bank_account_name") }}</span>
                                @endif
                            </div>
                            <span>※ 個人の場合は、姓と名の間に1文字分の全角スペースを入力してください。<span><br>
                            <span>※ 法人の場合は、カ）などの法人略語をご使用ください。<span><br>
                            <br>
                            <div class="well well-sm">
                               <button type="submit" class="btn btn-wd btn-outline-default">保存</button>
                               <a class="btn btn-link pull-right" href="/home/home_own_timeline"><i class="glyphicon glyphicon-backward"></i>  戻る</a>
                            </div>
                        {{ csrf_field() }}
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

            

<form name="subwindow">
{{ csrf_field() }}
</form>
<script type="text/javascript">
/* 自己紹介登録画面 */
function C03_run() {
    window.document.changeform.action = "{{ url('home/home_register_confirm') }}";
    window.document.changeform.method = "POST";
    window.document.changeform.submit();
}
/* 画像アップロード */
function ZZ1_run(val) {
    window.open("", "subwindow");
    window.document.subwindow.action = "{{ url('other/image_upload_index') }}";
    window.document.subwindow.target = "subwindow";
    make_hidden('mode', val, 'subwindow');
    window.document.subwindow.method = "POST";
    window.document.subwindow.submit();
}
/* 画像削除 */
function ZZ2_run(val) {
	$("input[id='image_delete_button']").hide();
    var changeCheckModule =
        $.get("{{ url('other/image_delete') }}", {target : "HOME_REGIST"}).then(function(data) {
            alert('画像を削除しました。');
        }).fail(function(){
            alert('処理に失敗しました。');
        });
}
function H01_run() {
	window.document.changeform.action = "{{ url('home') }}";
    window.document.changeform.method = "POST";
    window.document.changeform.submit();
}

$(document).ready(function() {
	// 画像の再描画
    var changeCheckModule = function() {
		$.get("{{ url('other/own_image_picture') }}", {target : "HOME_REGIST"},
			function(data){
				// 画像データのパスが取得できれば表示する
				if(data != "0") {
					$('#own_image').attr('src', data);
				}
           	});
        // 画像ボタンの押下可否判定
        var own_image = $("img[id='own_image']").attr('src');
        if (own_image) {
    		$("input[id='image_delete_button']").show();
        } else {
    		$("input[id='image_delete_button']").hide();
        }
    };
    setInterval(changeCheckModule, 1000);

});

</script>
</div>

@endsection
@include('layouts.footer')