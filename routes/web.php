<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Book;
use Illuminate\Http\Request;
use Stripe\Stripe;
use App\Http\Requests;

/**
 * ダッシュボード表示 */
//Route::get('/', 'BooksController@index');

/**
 * 新「本」を追加 */
//Route::post('/books', 'BooksController@store');

/**
 * 本を削除 */
//Route::post('/book/delete/{book}', function (Book $book) {
//    $book->delete();
//    return redirect('/');
//});

//更新画面
//Route::post('/booksedit/{books}', 'BooksController@edit');

//更新処理
//Route::post('/books/update', 'BooksController@update');

//scaffold
//Route::resource("tasks","TaskController"); // Add this line in routes.php

Route::get('/home/chat', 'ChatController@list');
Route::post('/home/chat', 'ChatController@list');
/*********************/
// A-0 ログイン機能
// Auth/LoginController.php
/*********************/
Auth::routes();
// Auth::post('/', 'LoginController@__construct');
//Route::get('/login', 'HomeController@home_own_timeline');
// Route::group(['middleware' => 'guest'], function () {
//     Route::get('/', function () {
//         return view('welcome');
//     });
// });

// 日付を簡単に取得できるCarbon
Route::get('/carbon', 'CarbonController@getIndex');

Route::get('/', 'BooksController@welcome');
Route::get('/cms', 'BooksController@welcome');
Route::get('teamFSHARP/company/about', 'BooksController@this_company');
//一覧
Route::get('/menu', 'BooksController@index');
Route::post('/menu', 'BooksController@index');


/*********************/
// B-0 登録退会機能
// RegistController.php
/*********************/
//Route::post('/register', 'HomeController@register');


/*********************/
// C-0 自己紹介機能
// WhoAmIController.php
/*********************/
//Route::get('/home', 'HomeController@index'); ←HomeController.phpに集約

/*********************/
// D-0 コミュニティ機能
// PostsController.php
/*********************/
Route::get('/chat', 'PostsController@list');
//Route::get('/chat', 'PostsController@list')->middleware('auth');

//いいね処理
Route::post('posts/good', 'PostsController@good');
//シェア処理
Route::post('posts/share', 'PostsController@share');
//タグ処理
Route::post('posts/tag', 'PostsController@tag');
//イベント処理
Route::post('posts/event', 'PostsController@event');
//フォロー処理
Route::post('posts/follow', 'PostsController@follow');

/*********************/
// E-0 Vision売買機能
// VisionDealController.php
/*********************/
//Vision購入画面
Route::post('/connect/buy', 'VisionDealController@buy');
//Vision購入確認画面
Route::post('/connect/buy_confirm', 'VisionDealController@buy_confirm');
//Vision購入完了画面
Route::post('/connect/buy_complete', 'VisionDealController@buy_complete');

//Vision作成画面
Route::post('/connect/vision_sell_regist', 'VisionDealController@vision_sell_regist');
Route::get('/connect/vision_sell_regist', 'VisionDealController@vision_sell_regist');
//Vision作成確認画面
Route::post('/connect/vision_sell_regist_confirm', 'VisionDealController@vision_sell_regist_confirm');
//Vision作成処理
Route::post('/connect/vision_sell_regist_process', 'VisionDealController@vision_sell_regist_process');
//Vision作成完了画面
Route::post('/connect/vision_sell_regist_complete', 'VisionDealController@vision_sell_regist_complete');
//Vision更新画面
Route::post('/connect/vision_sell_modify', 'VisionDealController@vision_sell_modify');
//Vision更新確認画面
Route::post('/connect/vision_sell_modify_confirm', 'VisionDealController@vision_sell_modify_confirm');
//Vision更新処理
Route::post('/connect/vision_sell_modify_process', 'VisionDealController@vision_sell_modify_process');
//Vision更新完了画面
Route::post('/connect/vision_sell_modify_complete', 'VisionDealController@vision_sell_modify_complete');
//VISION売却詳細画面
Route::post('/connect/sell_detail', 'VisionDealController@sell_detail');
//VISION売却詳細OPEN画面
Route::post('/connect/sell_detail_open', 'VisionDealController@sell_detail_open');
//VISION売却詳細CLOSE画面
Route::post('/connect/sell_detail_close', 'VisionDealController@sell_detail_close');
//VISION売却詳細抽選画面
Route::post('/connect/sell_detail_lottery', 'VisionDealController@sell_detail_lottery');
//VISION売却詳細抽選結果画面
Route::post('/connect/sell_detail_lottery_result', 'VisionDealController@sell_detail_lottery_result');
//新規優待登録画面
Route::post('/connect/sell_detail_regist', 'VisionDealController@sell_detail_regist');
//新規優待登録確認画面
Route::post('/connect/sell_detail_regist_confirm', 'VisionDealController@sell_detail_regist_confirm');
//新規優待登録処理
Route::post('/connect/sell_detail_regist_process', 'VisionDealController@sell_detail_regist_process');
//新規優待登録完了画面
Route::post('/connect/sell_detail_regist_complete', 'VisionDealController@sell_detail_regist_complete');
//優待編集画面
Route::post('/connect/sell_detail_modify', 'VisionDealController@sell_detail_modify');
//優待編集確認画面
Route::post('/connect/sell_detail_modify_confirm', 'VisionDealController@sell_detail_modify_confirm');
//優待編集録処理
Route::post('/connect/sell_detail_modify_process', 'VisionDealController@sell_detail_modify_process');
//優待編集完了画面
Route::post('/connect/sell_detail_modify_complete', 'VisionDealController@sell_detail_modify_complete');

/*********************/
// F-0 チャージ機能
// ChargeController.php
/*********************/
//Route::post('/Charge/charge', 'HomeController@t_masaki');

/*********************/
// G-0 推薦者募集機能
// RecommendsController.php
/*********************/

/*********************/
// H-0 ホーム画面
// HomeController.php
/*********************/
// ログイン後初期画面は、自分のホーム画面
Route::get('/home', 'HomeController@home_own_timeline');
Route::post('/home', 'HomeController@home_own_timeline');

Route::get('/home/register', 'HomeController@register');

Route::get('/home/edit', 'HomeController@edit');

Route::get('/terms', 'HomeController@terms');
Route::get('/privacy_policy', 'HomeController@privacy_policy');
Route::get('/specified_commercial_transactions_law', 'HomeController@specified_commercial_transactions_law');
Route::get('/thank_you_for_support', 'HomeController@thank_you_for_support');

//自己紹介表示画面
Route::post('/home/home_disp', 'HomeController@home_disp');
//自己紹介登録入力画面
Route::post('/home/home_register', 'HomeController@home_register');
Route::get('/home/home_register', 'HomeController@home_register');
//自己紹介登録確認画面
// Route::get('/home/home_register_update', 'HomeController@home_register_update');
Route::post('/home/home_register_update', 'HomeController@home_register_update');
Route::post('/home/home_register_confirm', 'HomeController@home_register_confirm');
//自己紹介登録処理
Route::post('/home/home_register_process', 'HomeController@home_register_process');
//自己紹介登録完了画面
Route::post('/home/home_register_complete', 'HomeController@home_register_complete');
//自己紹介編集入力画面
Route::post('/home/home_edit', 'HomeController@home_edit');
//自己紹介編集確認画面
Route::post('/home/home_edit_confirm', 'HomeController@home_edit_confirm');
//自己紹介編集登録処理
Route::post('/home/home_edit_process', 'HomeController@home_edit_process');
//自己紹介編集完了画面
Route::post('/home/home_edit_complete', 'HomeController@home_edit_complete');

//ホーム画面自分のタイムライン
Route::post('/home/home_own_timeline', 'HomeController@home_own_timeline');
Route::get('/home/home_own_timeline', 'HomeController@home_own_timeline');


Route::post('/home/{name}', 'HomeController@home_own_timeline');
Route::get('/home/{name}', 'HomeController@home_own_timeline');

// 2019年11/14追加
//Route::get('/home/chat', 'ChatController@chat_list')->middleware('auth');
Route::get('/home/chat/list', 'ChatController@list')->middleware('verified');
Route::post('/home/chat/list', 'ChatController@list')->middleware('verified');
Route::get('/home/chat/to/{title_key}/{subtitle_key}', 'ChatController@chat_to_project_redirect')->middleware('verified');
Route::get('/chat/to/{project_id}', 'ChatController@chat_to_project')->middleware('verified');
Route::get('/chat/t/{person}', 'ChatController@chat_to_person')->middleware('verified');
//Route::get('/home/{name}/chat', 'ChatController@chat_list');

Route::get('/{npo_name}/chat/list', 'ChatController@list_for_npo')->middleware('auth');
Route::get('/{npo_name}/{project}/chat/list', 'ChatController@list_for_project')->middleware('auth');
Route::get('/{npo_name}/{project}/chat/t/{person}', 'ChatController@chat_to_person')->middleware('auth');


//ホーム画面投資家や選手のタイムライン
Route::post('/home/home_outer_timeline/{folder_name}', 'HomeController@home_outer_timeline');
//検索画面
Route::post('/home/home_search_outer_member', 'HomeController@home_search_outer_member');
Route::get('/home/home_search_outer_member', 'HomeController@home_search_outer_member');
//検索実行処理
Route::post('/home/home_search_outer_member_process', 'HomeController@home_search_outer_member_process');
Route::get('/home/home_search_outer_member_process', 'HomeController@home_search_outer_member_process');
//検索結果一覧表示画面
Route::post('/home/home_search_outer_member_result', 'HomeController@home_search_outer_member_result');

/*********************/
// I-0 設定画面
// settingController.php
/*********************/
//設定画面
Route::get('/setting', 'SettingController@index');

//履歴画面
Route::get('/history', 'SettingController@history');

// Z-0 外部連携機能
// OuteriteRelationController.php

// ZZ-0 その他
// 画像イメージアップロード
Route::post('/other/image_upload_index', 'ImageUploadController@index');
Route::get('/other/image_upload_index', 'ImageUploadController@index');
Route::post('/other/image_upload', 'ImageUploadController@image_upload');
Route::get('/other/image_upload', 'ImageUploadController@image_upload');
Route::get('/other/own_image_picture', 'ImageUploadController@own_image_picture');
Route::get('/other/image_delete', 'ImageUploadController@image_delete');

// P-0 投稿画面
//投稿処理のコントローラー
Route::get('/post', 'PostsController@post');

/********************************************
Scaffoldで作ったもの(2017/12/09)
 ********************************************/
// おみくじ
Route::resource("mikujis","MikujiController");
Route::resource("omikujis","OmikujiController"); // 使えてない？->テーブルがない。
// ビジョン
Route::resource("visions","VisionController");

// Route::resource("npo_register/{npo_name}/edit","Npo_registerController@edit");
// Route::get('npo_registers/{npo_name}/edit', 'Npo_registerController@edit')->middleware('auth');

Route::resource("npo_registers","Npo_registerController");
Route::get("npo_registers","Npo_registerController@index");
//自己紹介表示画面
Route::get('/npo_register/create', 'Npo_registerController@create');
Route::post('/npo_register/create', 'Npo_registerController@create');
Route::post('/npo_register/{npo_name}/edit', 'Npo_registerController@edit');
//フォルダ名をURLに反映(2018.01.04仲条追加項目)
Route::get('/{npo}/{npo_name}','Npo_registerController@landing');
//Route::get('/{npo_name}','Npo_registerController@landing');
// Route::get('/org/{id}/{npo_name}','Npo_registerController@landing');
Route::get('/{npo_name}/edit','Npo_registerController@editing');
Route::post('/{npo_name}/payment','Npo_registerController@payment');
Route::post('/{npo_name}/payment_company','Npo_registerController@payment_company');
Route::post('/{npo_name}/payment_company_pratinum','Npo_registerController@payment_company_pratinum');
Route::post('/{npo_name}/send_mail','Npo_registerController@send_mail');
// Route::post('welcome','Npo_registerController@payment');
Route::get('/npo/{npo_name}','Npo_registerController@landing');
Route::get('/npo/{npo_name}/edit','Npo_registerController@editing');
Route::post('/npo/{npo_name}/payment','Npo_registerController@payment');
Route::post('/npo/{npo_name}/payment_company','Npo_registerController@payment_company');
Route::post('/npo/{npo_name}/payment_company_pratinum','Npo_registerController@payment_company_pratinum');
Route::post('/npo/{npo_name}/send_mail','Npo_registerController@send_mail');

// NPO
// Route::resource("npo","Npo_registerController");
// $npo = Auth::user()->npo;

Route::resource("npo_registers","Npo_registerController");
// Route::resource("npo","Npo_registerController");
Route::get("{npo}","Npo_registerController@index2");
Route::get("{npo}/create","Npo_registerController@create");
// スタブ機能
Route::post('/testviews', 'TestViewController@index');
Route::get('/testviews', 'TestViewController@index');

//[管理機能]会員検索機能
Route::post('/mastermentenance/login_user_manager', 'TestViewController@login_user_manager');

//Twitter
Route::get('auth/login/twitter', 'Auth\SocialController@getTwitterAuth');
Route::get('auth/login/callback/twitter', 'Auth\SocialController@getTwitterAuthCallback');

//Facebook
Route::get('auth/login/facebook', 'Auth\SocialController@getFacebookAuth');
Route::get('auth/login/callback/facebook', 'Auth\SocialController@getFacebookAuthCallback');

//Google
Route::get('auth/login/google', 'Auth\SocialController@getGoogleAuth');
Route::get('auth/login/callback/google', 'Auth\SocialController@getGoogleAuthCallback');

//Route::group(['prefix' => 'admin'], function () {
//    Voyager::routes();
//});

// bitflyerの履歴(購入履歴：送金履歴）
//Route::get('bitflyer/getHistorySupportTo', function()
//{
///*    $article = [
//    { "no": 1, "date1":"20180510", "date2":"20180510", "npo_or_person":"テストNPO", "amount":100000, "intermediary":"BitFlyer" , "hand_counting_material":500, "suitable_for": "送金"},
//    { "no": 2, "date1":"20180510", "date2":"20180510", "npo_or_person":"テストNPO", "amount":100000, "intermediary":"BitFlyer" , "hand_counting_material":500, "suitable_for": "送金"}
//    ];*/
//    return Response::json($article);
//});

// bitflyerの履歴(販売履歴：入金履歴)
//Route::get('bitflyer/getHistorySupportFrom', function()
//{
//    $article = ['id' => 1, 'title' => "today's dialy", 'content' => "It's a sunny day."];
//    return Response::json($article);
//});

// bitflyerの送金

/*Route::get('bitflyer/support/{id}', function()
{
    // ユーザIDを含む検索条件を取得
    $query = DB::table('vision_data');
    $query -> where('user_id', $user);

    $data['collections'] = $query->get();

    // ユーザIDをキーにデータを読み出す

    // 検索条件で絞り込む

    // JSON形式のファイルを返す
    $article = [['no' => 1, 'date1' => "20180510", 'date2' => "20180510", 'npo_or_person' => "テストNPO", 'amount' => "100000", 'intermediary' => "BitFlyer" , 'hand_counting_material' => 500, 'suitable_for' => "送金"]];
    return Response::json($article);
});
*/

Route::get('bitflyer/support/transfer/{id}', 'Bitflyer\BitflyerHistoryController@transfer');
Route::get('bitflyer/support/payment/{id}', 'Bitflyer\BitflyerHistoryController@payment');

/*********************/
// A02 パスワード変更画面
// RequireController.php
// ReplayController.php
// ResetCOntroller.php
/*********************/
// パスワード変更問い合わせ
Route::post('/passwordchange/require/inquiry', 'PasswordChange\RequireController@inquiry');
Route::get('/passwordchange/require/inquiry', 'PasswordChange\RequireController@inquiry');
Route::post('/passwordchange/require/search', 'PasswordChange\RequireController@search');
Route::post('/passwordchange/require/searchComplete', 'PasswordChange\RequireController@searchComplete');
Route::post('/passwordchange/require/notfound', 'PasswordChange\RequireController@notfound');
// パスワード変更メール
Route::post('/passwordchange/replaymail/send/{mailaddress}', 'PasswordChange\ReplayController@forgetPasswordMailSend');
Route::get('/passwordchange/replaymail/compare/{password}', 'PasswordChange\ReplayController@comparePassword');
// パスワードリセット
Route::post('/passwordchange/reset/register', 'PasswordChange\ResetController@register');
Route::get('/passwordchange/reset/register', 'PasswordChange\ResetController@register');
Route::post('/passwordchange/reset/confirm', 'PasswordChange\ResetController@confirm');
Route::post('/passwordchange/reset/process', 'PasswordChange\ResetController@process');
Route::post('/passwordchange/reset/complete', 'PasswordChange\ResetController@complete');

Route::get('/contact/form', 'ContactController@form')->name('contact');
Route::post('/contact/form', 'ContactController@send')->name('contact.send');
Route::get('/contact/result', 'ContactController@result')->name('contact.result');

// チャット機能(2019/4/7)
Route::get('chat/chat', 'ChatController@index');
Route::get('chat/messages', 'ChatController@fetchMessages');
Route::post('chat/messages', 'ChatController@sendMessage');

// フォロー機能(2019/7/21)
// フォロー一覧
// Route::get('/follow-list', 'FollowController@index');
// フォロー処理
Route::get('/follow/store/2019', 'FollowController@store');
Route::post('/follow/store/2019', 'FollowController@store');


//Auth::routes();
Auth::routes(['verify' => true]);

//Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/error', function() {
//    I_AM_BROKEN_CODE
//});
