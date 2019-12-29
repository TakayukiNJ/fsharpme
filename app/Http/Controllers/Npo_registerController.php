<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;
use App\Npo_register;
use App\Follow;
use App;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
//use Faker\Provider\Image;
use Image;
use Illuminate\Support\Facades\Mail;

class Npo_registerController extends Controller {

	public function __construct()
    {
        $this->middleware('auth', ['except' => ['landing', 'pieces', 'index', 'index2', 'show']]);
    }

	public function index2(string $npo)
	{
        $user_info = \DB::table('users')->where('npo', $npo)->first();
		if(!$user_info){
		    return view('/errors/503');
		}
		$name_auth = $user_info->name;
	    $npo_auth  = $user_info->npo;
	    $user_auth = $user_info->email;

        $data['personal_info'] = \DB::table('personal_info')->where('user_id', $user_auth)->first();
		// データベースからnpo_nameに該当するユーザーの情報を抜き出す
        $data['npo_info'] = \DB::table('npo_registers')->where('npo_name', $npo_auth)->first();
        // もしまだnpoを一度も登録していなかったら、createの方に誘導
        if(!$npo_auth){
	        return view('npo_registers/create', $data);
	    }
        $data['npo_owner_info'] = \DB::table('users')->where('npo', $npo_auth)->first();
        $npo_registers = Npo_register::orderBy('proval', 'desc')->where('manager', $name_auth)->paginate(9);
		// 金額を計算
		$data['project_total_price'] = 0;
		for($array_count=0; $array_count<count($npo_registers); $array_count++){
            $project_total_price = $npo_registers[$array_count]->follower;
            $data['project_total_price'] += $project_total_price;
		}
        //follow機能追加 20190725
        $data['follow_data'] = \DB::table('follows')->where('followee_id', $npo_auth)->orderBy('id','desc')->get();
        if(Auth::user()){
            $follower_id = Auth::user()->name;
            $data['this_follow'] = $data['follow_data']->where('follower_id', $follower_id)->first();
        }
        // フォロー数をカウント
        $followers = Follow::where('followee_id', $data['npo_owner_info']->npo)->where('delete_flg', 0)->get();
        $data['followers'] = $followers;
        $data['follower_count'] = count($followers);
        return view('npo_registers.index', $data, compact('npo_registers'))->with('message', 'Item created successfully.');
	}

	public function index()
	{
		$npo = Auth::user()->npo;
        $user_info = \DB::table('users')->where('npo', $npo)->first();
		if(!$user_info){
		    return view('/errors/503');
		}
		$name_auth = $user_info->name;
	    $npo_auth  = $user_info->npo;
	    $user_auth = $user_info->email;

        $data['personal_info'] = \DB::table('personal_info')->where('user_id', $user_auth)->first();
		// データベースからnpo_nameに該当するユーザーの情報を抜き出す
        $data['npo_info'] = \DB::table('npo_registers')->where('npo_name', $npo_auth)->first();
        // dd($data);
        // もしまだnpoを一度も登録していなかったら、createの方に誘導
        if(!$npo_auth){
	        return view('npo_registers/create', $data);
	    }

        $data['npo_owner_info'] = \DB::table('users')->where('npo', $npo_auth)->first();
        $npo_registers = Npo_register::orderBy('updated_at', 'desc')->where('manager', $name_auth)->paginate(9);
    	// 金額を計算
		$data['project_total_price'] = 0;
		for($array_count=0; $array_count<count($npo_registers); $array_count++){
            $project_total_price = $npo_registers[$array_count]->follower;
            $data['project_total_price'] += $project_total_price;
		}
        //follow機能追加 20190725
        $data['follow_data'] = \DB::table('follows')->where('followee_id', $npo_auth)->orderBy('id','desc')->get();
        if(Auth::user()){
            $follower_id = Auth::user()->name;
            $data['this_follow'] = $data['follow_data']->where('follower_id', $follower_id)->first();
        }
        // フォロー数をカウント
        $followers = Follow::where('followee_id', $data['npo_owner_info']->npo)->where('delete_flg', 0)->get();
        $data['followers'] = $followers;
        $data['follower_count'] = count($followers);
        return view('npo_registers.index', $data, compact('npo_registers'))->with('message', 'Item created successfully.');
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	    $npo_auth = Auth::user()->npo;
	    $user_auth = Auth::user()->email;
        $data['personal_info'] = \DB::table('personal_info')->where('user_id', $user_auth)->first();
        // データベースからnpo_nameに該当するユーザーの情報を抜き出す
        $data['npo_info'] = \DB::table('npo_registers')->where('npo_name', $npo_auth)->first();
//        dd($data);
//        return view('index');
//        return view('home/home');
        return view('npo_registers.create', $data);
//        return redirect('npo_registers/create', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$npo_register = new Npo_register();

	    $rules = [
            'subtitle'      => 'required | min:1 | max:55',
//	        'support_limit' => 'digits_between:1,9',
	    ];

        $this -> validate($request, $rules);

		$id_auth   = Auth::user()->id;
        $npo_id    = Auth::user()->npo_id;
        $name_auth = Auth::user()->name;
        $user_auth = Auth::user()->email;
        $npo_auth  = Auth::user()->npo;

        $edit_auth = $name_auth."1";

		$npo_register->npo_name = ""; // URL
		$npo_register->title    = $request->input("title"); // NPOの名前
		// NPOの名前をヘッダーに表示
		if("" == $npo_auth){
            $npo_auth = $npo_register->npo_name;
            if("home" == $npo_auth){
                return view('/errors/503');
    	    }
            Auth::user()->where('id', $id_auth)->update([
                'npo' => $npo_register->title
            ]);
        }

        // ロゴの登録
        $avater_file = $request->file('avater');
        // 画像が空かチェック
        if(!empty($avater_file)){
            // 画像の名前を取得
            $avater = $npo_auth.time().$avater_file->getClientOriginalName();
            // 画像をpublicの中に保存
            Image::make($avater_file)->resize(150, 150)->save( './img/project_logo/' . $avater );
            // $image_file->move('./img/personal_info/', $image_id); // cloud9だけかな？
            $npo_register->avater = $avater;

            \DB::table('npo_registers')
                ->where('title', $npo_auth)
                ->update(['avater' => $avater]);
        }else{
            $currentNpoInfo = \DB::table('npo_registers')->where('npo_name', $npo_auth)->first();
            // すでにプロジェクトを登録してあって
            if($currentNpoInfo){
                // ロゴも登録してあった場合
                if($currentNpoInfo->avater){
                    // ロゴを登録
                    $npo_register->avater = $npo_auth;
                }
            }
        }

        // 認定NPOだった時、certificated_npoに内閣府の法人idを追加
        $npo_register->certificated_npo        = $npo_id;

        $npo_register->subtitle                = $request->input("subtitle"); // プロジェクトの名前

        $npo_register->manager                 = $name_auth;
        $npo_register->member1                 = $name_auth;
        $npo_register->member1_twitter         = $edit_auth;
        $npo_register->blue_card_title         = "プロジェクトの目的";
        $npo_register->blue_card_body          = "ご自由にご記載ください。";
        $npo_register->green_card_title        = "期間と詳細";
        $npo_register->green_card_body         = "ご自由にご記載ください。";
        $npo_register->yellow_card_title       = "使い道とリターン";
        $npo_register->yellow_card_body        = "プロジェクト運営費、広告費（リターンは必須ではございません。） ";
        $npo_register->support_purpose         = "プロジェクト運営費";
        $npo_register->support_contents        = "";
        // $npo_register->support_contents_detail = new Carbon(Carbon::now()->addYear(1));
        $npo_register->support_limit           = "0"; // 募集寄付数
        if($request->input("support_limit")){
            $npo_register->support_limit       = $request->input("support_limit"); // 募集寄付数
        }
        $npo_register->support_amount          = "3000"; // 個人寄付額
        if($request->input("support_amount")){
            $npo_register->support_amount      = $request->input("support_amount"); // 募集寄付数
        }
        $npo_register->support_amount_gold     = "10"; // 法人寄付額
        $npo_register->support_price_gold      = "100000"; // 法人寄付額
        $npo_register->support_amount_pratinum = "1";       // 法人(プレミアム)寄付者上限数
        $npo_register->support_price_pratinum  = "1000000"; // 法人(プレミアム)寄付額
        $npo_register->proval                  = "0";
        $npo_register->created_at              = new Carbon(Carbon::now());
        $npo_register->updated_at              = new Carbon(Carbon::now());
        if($npo_register->subtitle){
            $npo_register->save();
        }
		return redirect()->route('npo_registers.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($npo_name)
	{
	    $currentNpoInfo = Npo_register::find($npo_name);
        $npo_manager    = $currentNpoInfo->manager;

        $project        = $currentNpoInfo->npo_name;
        $this_user_auth = \DB::table('users')->where('name', $npo_manager)->first();
        $org            = $this_user_auth->npo;
        $url            = './'.$org.'/'.$project;
        // dd($org);
	    if(Auth::user()){
    		$user_auth = Auth::user()->email;
            $auth_name = Auth::user()->name;
	    }else{
            return redirect($url);
        }

	    if($auth_name !== $npo_manager || $currentNpoInfo->proval > 0){
            return redirect($url);
	    }
	    $data['personal_info'] = \DB::table('personal_info')->where('user_id', $user_auth)->first();

        $currentNpoInfo = Npo_register::find($npo_name);
    // 	$currentNpoInfo     = \DB::table('npo_registers')->where('id', $npo_name)->first();
    	$currentPremierData = \DB::table('premier_data')->where('vision_id', $currentNpoInfo->npo_name)->get();
        // データベースからnpo_nameに該当するユーザーの情報をまとめて抜き出して
    // 	dd($currentPremierData);
        // $data['premier_datas'] = $currentPremierData; // これのuser_defineは、団体には教えないと。アドレスだから。→サイト上でコンタクト取れるようにしたい。
        // 何人がいくら寄付したのか、誰が寄付したのか表示
        $data['donater']          = array(0=>"Donater");// 何人がいくら寄付したのか、誰が寄付したのか表示
        $data['donater_times']    = array(0=>"Donater times");
        $data['donater_gold']     = array(0=>"Company");
        $data['donater_pratinum'] = array(0=>"Company(pratinum)");$mail_message = "";
        $parcentage = 0;
    	$buyer_count                     = 0; // 寄付した人・団体の数字
    	$currency_amount                 = 0; // 現在いくらか
    	$currency_amount_personal        = 0; // 個人寄付はいくらか         (premier_idが1の時)
    	$donater_count                   = 0; // 寄付した人は何人か
    	$company_count_gold              = 0; // 寄付した人は何人か(企業)
    	$company_count_pratinum          = 0; // 寄付した人は何人か(プラチナ企業)
    	$currency_amount_company         = 0; // 企業寄付はいくらか         (premier_idが2の時)
    	$currency_amount_company_premier = 0; // 企業プレミア寄付はいくらか (premier_idが3の時)
    	for($array_count=0; $array_count<count($currentPremierData); $array_count++){
            $buyer_count++; // 人数
            $currency_origin = $currentPremierData[$array_count]->status;
            $currency_amount += $currency_origin; // 金額
            if(1 == $currentPremierData[$array_count]->premier_id){ // 個人
                $currency_amount_personal += $currency_origin;
                $donater_count++;
                $donater_email = $currentPremierData[$array_count]->user_define;
                $donater_info  = \DB::table('users')->where('email', $donater_email)->first();
                $donater_times = $currentPremierData[$array_count]->participants;
                $donater_name  = $donater_info->name;
                $data['donater'] += array($donater_count=>$donater_name);
                $data['donater_times'] += array($donater_count=>$donater_times);
                // $data['donater'.$donater_count] = $donater_name;
            }else if(2 == $currentPremierData[$array_count]->premier_id){ // 企業
                $currency_amount_company += $currency_origin;
                $company_count_gold++;
                $donater_npo = $currentPremierData[$array_count]->user_define;
                // $donater_info  = \DB::table('users')->where('npo', $donater_npo)->first();
                // $donater_name  = $donater_info->name;
                $data['donater_gold'] += array($company_count_gold=>$donater_npo);
            }else if(3 == $currentPremierData[$array_count]->premier_id){ // 法人
                $currency_amount_company_premier += $currency_origin;
                $company_count_pratinum++;
                $donater_npo = $currentPremierData[$array_count]->user_define;
                // $donater_info  = \DB::table('users')->where('npo', $donater_npo)->first();
                // $donater_name  = $donater_info->name;
                $data['donater_pratinum'] += array($company_count_pratinum=>$donater_npo);
            }
        }
        if(0 != $buyer_count){
            $par = ($currentNpoInfo->buyer / $currentNpoInfo->support_limit) * 100; //指定値「現在いくらか」を最大値(目標値)で割った後、100を掛ける
            $parcentage = round($par,2); // 切捨て整数化
        }
        $data['mail_message'] = $mail_message;
        $data['parcentage']   = $parcentage;
        // if($currentNpoInfo->support_price){
        //     $par = ($currency_amount / $currentNpoInfo->support_price) * 100; //指定値「現在いくらか」を最大値(目標値)で割った後、100を掛ける
        //     $parcentage = round($par,2); // 切捨て整数化
        //     $data['parcentage'] = $parcentage;
        // }
        $data['buyer_data']             = $buyer_count;
        $data['donater_count']          = $donater_count;
        $data['company_count_gold']     = $company_count_gold;
        $data['company_count_pratinum'] = $company_count_pratinum;
        $data['currency_data']          = $currency_amount;
        $data['currency_data_personal'] = $currency_amount_personal;
        $data['currency_data_company']  = $currency_amount_company; // 企業寄付の合計
        $data['currency_data_company_premier'] = $currency_amount_company_premier; // 企業寄付(プラチナ)の合計
		$id_auth   = Auth::user()->id;
        $name_auth = Auth::user()->name;
        $user_auth = Auth::user()->email;
        $this->middleware('auth:api');

		// データベースからnpo_nameに該当するユーザーの情報をまとめて抜き出して
        // $currentNpoInfo = \DB::table('npo_registers')->where('id', $npo_name)->first();
        // NPOメンバーが画像を保存していれば、はめていく。
        for($i = 1; $i < 11; $i++){
            $member              = "member".$i;
            // $personal_info       = "personal_info".$i;
            $currentUserInfo     = \DB::table('users')->where('name', $currentNpoInfo->$member)->first();
        	$currentPersonalInfo = "";
            $data['personal_info_image_id'][$i] = "";
            $data['personal_info_company_name'][$i] = "";
            $data['personal_info_description'][$i] = "";
        	if($currentUserInfo){
            	$currentPersonalInfo = \DB::table('personal_info')->where('user_id', $currentUserInfo->email)->first();
            	if($currentPersonalInfo){
            	    $data['personal_info_image_id'][$i]     = $currentPersonalInfo->image_id;
            	    $data['personal_info_company_name'][$i] = $currentPersonalInfo->company_name;
            	    $data['personal_info_description'][$i] = $currentPersonalInfo->description;
            	}
            }
        }

        //連想配列に入れtBladeテンプレートに渡しています。
        $data['npo_info'] = $currentNpoInfo;
        if($currentNpoInfo->proval > 0){
            return redirect('/'.$currentNpoInfo->npo_name);
        }

        if($name_auth === $currentNpoInfo->manager){
    		return view('npo_registers.show', $data);
        }
        // member1~10の_twitterカラムに権限があれば見れる処理
        for($i = 1; $i < 11; $i++){
            // "member".$i."_twitter"がAuth::user()->nameに1が付いていたら、権限を持たす
            $member_auth = $name_auth."1";
            $check_auth  = "member".$i."_twitter";
            if($member_auth === $currentNpoInfo->$check_auth){
                return view('npo_registers.show', $data);
                //return view('npo_registers.show', $data, compact('npo_register'))->with('message', 'こちらは、Preview画面です。');
                // return view('npo_registers.edit', $data);
            }
        }
        // これ以外だったら、errorを返す。
        return view('/errors/503');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    // トップページ
    public function landing(string $npo, string $npo_name)
    {
        // nav部分、ユーザーがアカウント設定をしていたら取得
        if(Auth::user()){
            $user_auth = Auth::user()->email;
            $data['personal_info'] = \DB::table('personal_info')->where('user_id', $user_auth)->first();
        }
        // 本番環境の時にここと、paymentの3パターンを変える
        $stripe_key = "pk_test_tfM2BWAFRlYSPO939BW5jIj5";
        $data['stripe_key'] = $stripe_key;
        // データベースからnpo_nameに該当するユーザーの情報をまとめて抜き出して
    	$currentNpoInfo     = \DB::table('npo_registers')->where('npo_name', $npo_name)->first();
    	$currentPremierData = \DB::table('premier_data')->where('vision_id', $npo_name)->get();
        if(!$currentNpoInfo){
		    return view('/errors/503');
		}
		// フォロー数をカウント
        $followers = Follow::where('followee_id', $currentNpoInfo->title)->where('delete_flg', 0)->get();
        $data['follower_count'] = count($followers);
        // messagesテーブルからメッセージを取ってくる（6/3の開発合宿で追加）
        $messageData     = \DB::table('messages')->where('to', $npo_name)->orderBy('id','desc')->get();
        $data['from']    = array(0=>"from");
        $data['to']      = array(0=>"to");
        $data['message'] = array(0=>"message");
        $data['created'] = array(0=>"created");
        $data['fromPic'] = array(0=>"fromPic");
        $from_pic        = "";
        for($message_count=0; $message_count <count($messageData); $message_count++){
            $from_origin    = $messageData[$message_count]->from;
            $to_origin      = $messageData[$message_count]->to;
            $message_origin = $messageData[$message_count]->message;
            $created_origin = $messageData[$message_count]->created_at;
            $from_user_info = \DB::table('users')->where('name', $from_origin)->first();
            $from_user_pic  = \DB::table('personal_info')->where('user_id', $from_user_info->email)->first();
            if($from_user_pic){
                $from_pic = $from_user_pic->image_id;
            }else{
                $from_pic = "placeholder.jpg";
            }
            // dd($from_user_pic->image_id);

            $data['from']    += array($message_count+1 => $from_origin);
            $data['to']      += array($message_count+1 => $to_origin);
            $data['message'] += array($message_count+1 => $message_origin);
            $data['created'] += array($message_count+1 => $created_origin);
            $data['fromPic'] += array($message_count+1 => $from_pic);
            // dd($data);
        }
        // $data['premier_datas'] = $currentPremierData; // これのuser_defineは、団体には教えないと。アドレスだから。→サイト上でコンタクト取れるようにしたい。
        // 何人がいくら寄付したのか、誰が寄付したのか表示
        $data['donater']          = array(0=>"Donater");
        $data['donater_times']    = array(0=>"Donater times");
        $data['donater_gold']     = array(0=>"Company");
        $data['donater_pratinum'] = array(0=>"Company(pratinum)");
        $mail_message = "";
        $parcentage = 0;
    	$buyer_count                     = 0; // 寄付した人・団体の数字
    	$currency_amount                 = 0; // 現在いくらか
    	$currency_amount_personal        = 0; // 個人寄付はいくらか         (premier_idが1の時)
    	$donater_count                   = 0; // 寄付した人は何人か
    	$company_count_gold              = 0; // 寄付した人は何人か(企業)
    	$company_count_pratinum          = 0; // 寄付した人は何人か(プラチナ企業)
    	$currency_amount_company         = 0; // 企業寄付はいくらか         (premier_idが2の時)
    	$currency_amount_company_premier = 0; // 企業プレミア寄付はいくらか (premier_idが3の時)
    	for($array_count=0; $array_count<count($currentPremierData); $array_count++){
            $buyer_count++; // 人数
            $currency_origin = $currentPremierData[$array_count]->status;
            $currency_amount += $currency_origin; // 金額
            if(1 == $currentPremierData[$array_count]->premier_id){ // 個人
                $currency_amount_personal += $currency_origin;
                $donater_count++;
                $donater_email = $currentPremierData[$array_count]->user_define;
                $donater_info  = \DB::table('users')->where('email', $donater_email)->first();
                $donater_times = $currentPremierData[$array_count]->participants;
                $donater_name  = $donater_info->name;
                $data['donater'] += array($donater_count=>$donater_name);
                $data['donater_times'] += array($donater_count=>$donater_times);
                // $data['donater'.$donater_count] = $donater_name;
            }else if(2 == $currentPremierData[$array_count]->premier_id){ // 企業
                $currency_amount_company += $currency_origin;
                $company_count_gold++;
                $donater_npo = $currentPremierData[$array_count]->user_define;
                // $donater_info  = \DB::table('users')->where('npo', $donater_npo)->first();
                // $donater_name  = $donater_info->name;
                $data['donater_gold'] += array($company_count_gold=>$donater_npo);
            }else if(3 == $currentPremierData[$array_count]->premier_id){ // 法人
                $currency_amount_company_premier += $currency_origin;
                $company_count_pratinum++;
                $donater_npo = $currentPremierData[$array_count]->user_define;
                // $donater_info  = \DB::table('users')->where('npo', $donater_npo)->first();
                // $donater_name  = $donater_info->name;
                $data['donater_pratinum'] += array($company_count_pratinum=>$donater_npo);
            }
        }
        if(0 != $buyer_count){
            $par = ($currentNpoInfo->buyer / $currentNpoInfo->support_limit) * 100; //指定値「現在いくらか」を最大値(目標値)で割った後、100を掛ける
            $parcentage = round($par,2); // 切捨て整数化
        }
        $data['mail_message']           = $mail_message;
        $data['parcentage']             = $parcentage;
        $data['buyer_data']             = $buyer_count;
        $data['donater_count']          = $donater_count;
        $data['company_count_gold']     = $company_count_gold;
        $data['company_count_pratinum'] = $company_count_pratinum;
        $data['currency_data']          = $currency_amount;
        $data['currency_data_personal'] = $currency_amount_personal;
        $data['currency_data_company']  = $currency_amount_company; // 企業寄付の合計
        $data['currency_data_company_premier'] = $currency_amount_company_premier; // 企業寄付(プラチナ)の合計

    	// NPOメンバーが画像を保存していれば、はめていく。
        for($i = 1; $i < 11; $i++){
            $member              = "member".$i;
            // $personal_info       = "personal_info".$i;
            $currentUserInfo     = \DB::table('users')->where('name', $currentNpoInfo->$member)->first();
        	$currentPersonalInfo = "";
            $data['personal_info_image_id'][$i] = "";
            $data['personal_info_company_name'][$i] = "";
            $data['personal_info_description'][$i] = "";
        	if($currentUserInfo){
            	$currentPersonalInfo = \DB::table('personal_info')->where('user_id', $currentUserInfo->email)->first();
            	if($currentPersonalInfo){
            	    $data['personal_info_image_id'][$i]     = $currentPersonalInfo->image_id;
            	    $data['personal_info_company_name'][$i] = $currentPersonalInfo->company_name;
            	    $data['personal_info_description'][$i] = $currentPersonalInfo->description;
            	}
            }
        }
        $data['npo_info'] = $currentNpoInfo;
        if($currentNpoInfo->proval < 1){
            // 未公開だった時の処理
            if(Auth::user()){
                $name_auth = Auth::user()->name;
            }else{
                return view('/errors/503');
            }
            if($name_auth === $currentNpoInfo->manager){
                return view('npo_registers.show', $data);
                //return view('npo_registers.show', $data, compact('npo_register'))->with('message', 'こちらは、Preview画面です。');
            }
            // member1~10の_twitterカラムに権限があれば見れる処理
            for($i = 1; $i < 11; $i++){
                // "member".$i."_twitter"がAuth::user()->nameに1が付いていたら、権限を持たす
                $member_auth = $name_auth."1";
                $check_auth  = "member".$i."_twitter";
                if($member_auth === $currentNpoInfo->$check_auth){
                    return view('npo_registers.show', $data);
                    //return view('npo_registers.show', $data, compact('npo_register'))->with('message', 'こちらは、Preview画面です。');
                    // return view('npo_registers.edit', $data);
                }
            }
            return view('/errors/503');
    	}
        // フォロー数をカウント
        $followers = Follow::where('followee_id', $currentNpoInfo->title)->where('delete_flg', 0)->get();
        $data['followers'] = $followers;
        $data['follow_data'] = $followers;
        $data['follower_count'] = count($followers);

        //follow機能追加 20190724
//        $data['follow_data'] = \DB::table('follows')->where('followee_id', $currentNpoInfo->title)->orderBy('id','desc')->get();
//        $data['follower_count'] = count($data['follow_data']);
        if(Auth::user()){
            $follower_id = Auth::user()->name;
            $data['this_follow'] = $followers->where('follower_id', $follower_id)->first();
        }
        return view('npo.npo_landing_page', $data);
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $npo_name)
	{
		$npo_register = Npo_register::findOrFail($npo_name);

 		$name_auth = Auth::user()->name;
        $npo_id    = Auth::user()->npo_id;
        // $npo_register->support_price = $request->input("support_price"); // 目標金額
        if($npo_register->buyer == 0){
    		$npo_register->proval = $request->input("proval"); // 1だったら公開
        }else if($npo_register->proval == 0){
        	$npo_register->proval = 1;
        }
    	// 公開時のバリデーション
    	if($npo_register->published){
		    $rules = [
                'title'                   => 'required | min:1 | max:55',
                'support_limit'           => 'digits_between:1,9',
                'support_amount'          => 'required | digits_between:1,6', // 個人寄付の金額
                'support_price_gold'      => 'required | digits_between:5,7', // 企業寄付の金額
                'support_amount_gold'     => 'required | digits_between:1,2', // 企業寄付の定員数
                'support_price_pratinum'  => 'required | digits_between:6,8', // 企業（プラチナ）寄付の金額
    	        'support_amount_pratinum' => 'required | digits_between:1,2', // 企業（プラチナ）寄付の定員数
                //'url'                     => 'url',
                // 'npo_name'                => 'alpha_dash',
    		];
		}else{
    		if($npo_register->proval < 1){
    		    // 未公開の時
        		$rules = [
                    'title'                   => 'required | min:1 | max:55',
//        		    'support_contents_detail' => 'date | after:tomorrow',
                    'support_limit'           => 'digits_between:1,9 | integer',
                    'support_amount'          => 'required | digits_between:1,6', // 個人寄付の金額
                    'support_price_gold'      => 'required | digits_between:5,7', // 企業寄付の金額
                    'support_amount_gold'     => 'required | digits_between:1,2', // 企業寄付の定員数
                    'support_price_pratinum'  => 'required | digits_between:6,8', // 企業（プラチナ）寄付の金額
        	        'support_amount_pratinum' => 'required | digits_between:1,2', // 企業（プラチナ）寄付の定員数
                    //'url'                     => 'url',
                    // 'npo_name'                => 'unique:npo_registers|alpha_dash',
        		];
    		}else{
    		    $rules = [
                    'title'                   => 'required | min:1 | max:55',
        		    'support_amount'          => 'digits_between:1,10 | integer',
                    'support_limit'           => 'digits_between:1,9 | integer',
        	        'support_price_gold'      => 'required | digits_between:5,7', // 企業寄付の金額
                    'support_amount_gold'     => 'required | digits_between:1,2', // 企業寄付の定員数
                    'support_price_pratinum'  => 'required | digits_between:6,8', // 企業（プラチナ）寄付の金額
        	        'support_amount_pratinum' => 'required | digits_between:1,2', // 企業（プラチナ）寄付の定員数
                    //'url'                     => 'url',
                    // 'npo_name'                => 'unique:npo_registers|required | alpha_dash',
        	    ];
        	}
		}
        $this -> validate($request, $rules);

        $npo_register->support_limit = $request->input("support_limit"); // 募集寄付数

		// 画像に関して(1月28日追加)
        $background_file = $request->file('background_pic');
        // 画像が空かチェック
        if(!empty($background_file)){
            // 画像の名前を取得
            $background_pic = time()."_".$background_file->getClientOriginalName();
            dd($background_file);
            // 画像をpublicの中に保存
            Image::make($background_file)->save( './img/project_back/' . $background_pic );
            // $image_file->move('./img/personal_info/', $image_id); // cloud9だけかな？
            $npo_register->background_pic = $background_pic;
        }else{
            $background_pic = "";
        }
        for($i = 1; $i < 4; $i++){
            $code = "code".$i;
            $code_file = $request->file($code);
            // 画像が空かチェック
            if(!empty($code_file)){
                // 画像の名前を取得
                $code_avater = $npo_register->title."_".$code_file->getClientOriginalName();
                // 画像をpublicの中に保存
                Image::make($code_file)->save( './img/project_code/' . $code_avater );
                // $image_file->move('./img/personal_info/', $image_id); // cloud9だけかな？
                $npo_register->$code = $code_avater;
            }else{
                $code_avater = "";
            }
        }

        // 認定NPOだった時、certificated_npoに内閣府の法人idを追加
        if($npo_id && $npo_register->manager == $name_auth){
            $npo_register->certificated_npo = $npo_id;
        }

		$npo_register->sdgs1 = $request->input("sdgs1");
		$npo_register->sdgs2 = $request->input("sdgs2");
		$npo_register->sdgs3 = $request->input("sdgs3");
		$npo_register->sdgs4 = $request->input("sdgs4");
		$npo_register->sdgs5 = $request->input("sdgs5");
		$npo_register->sdgs6 = $request->input("sdgs6");

		$npo_register->title             = $request->input("title"); // npo name
        $npo_register->subtitle          = $request->input("subtitle"); //project name
        $npo_register->embed_youtube     = $request->input("embed_youtube");
        $npo_register->blue_card_title   = $request->input("blue_card_title");
        $npo_register->blue_card_body    = $request->input("blue_card_body");
        $npo_register->green_card_title  = $request->input("green_card_title");
        $npo_register->green_card_body   = $request->input("green_card_body");
        $npo_register->yellow_card_title = $request->input("yellow_card_title");
        $npo_register->yellow_card_body  = $request->input("yellow_card_body");

        // メンバーには、サイトに登録済みの「ユーザー名」を入れてください。
        for($i = 1; $i < 11; $i++){
            $member           = "member".$i;
            $member_pos       = $member."_pos";
            $member_detail    = $member."_detail";
            $member_edit_auth = $member."_auth"; // 権限を付けたいだけに変数を作成（名前+1）
            $member_twitter   = $member."_twitter";
            $member_facebook  = $member."_facebook";
            $member_linkedin  = $member."_linkedin";
            $currentUserInfo  = \DB::table('users')->where('name', $request->input($member))->first();
            // 一旦なしで。後々は、メールアドレスでメッセージを送って承認の流れでバリデーションかけたい。(2019年1月21日)
            if($currentUserInfo){
                if($currentUserInfo->name == $request->input($member)){
                    $npo_register->$member          = $request->input($member);
                    $npo_register->$member_pos      = $request->input($member_pos);
                    $npo_register->$member_detail   = $request->input($member_detail);
                    $member_edit_auth               = $request->input($member_twitter);
                    $npo_register->$member_twitter  = $member_edit_auth;
                    $npo_register->$member_facebook = $request->input($member_facebook);
                    $npo_register->$member_linkedin = $request->input($member_linkedin);
                }else{
                    // メンバーがいなかったら、登録させない。
                    \Validator::make(
                        [$member => $request[$member]],
                        [$member => 'mimes']
                    )->validate();
                }
            }
        }
        // スポンサー設定
        $npo_register->support_purpose = $request->input("support_purpose"); // 資金の使い道
        $npo_register->support_contents = $request->input("support_contents"); // 購入者への特典(リターン)
        $npo_register->support_contents_detail = $request->input("support_contents_detail"); // 特典有効期限
        $npo_register->support_amount = $request->input("support_amount"); // 寄付金額
        // if ($npo_register->support_amount == $npo_register['support_amount']) {
        //     $npo_register->proval = 0;
        // }
        // $npo_register->support_price = $request->input("support_price"); // 目標金額

        $npo_register->support_contents_gold = $request->input("support_contents_gold");
        $npo_register->support_contents_detail_gold = $request->input("support_contents_detail_gold");
        $npo_register->support_amount_gold = $request->input("support_amount_gold");
        $npo_register->support_price_gold = $request->input("support_price_gold"); //法人寄付の値段*公開後変更不可

        $npo_register->support_contents_pratinum = $request->input("support_contents_pratinum"); //プラチナ寄付リターンの内容
        $npo_register->support_contents_detail_pratinum = $request->input("support_contents_detail_pratinum"); //プラチナ寄付リターンの詳細URL（無しでも可能）
        $npo_register->support_amount_pratinum = $request->input("support_amount_pratinum"); //プラチナ寄付の募集数
        $npo_register->support_price_pratinum = $request->input("support_price_pratinum"); //法人寄付の値段(プラチナ寄付)*公開後変更不可

        $npo_register->body = $request->input("body");
        $npo_register->url  = $request->input("url");
        $npo_register->updated_at = new Carbon(Carbon::now());
         $npo_register->proval = $request->input("proval");

        if($npo_register->proval != 0){
            $npo_register->published = new Carbon(Carbon::now());
            $npo_register->npo_name = $npo_name + 10000; // URL
        }
		$npo_register->save();
		// return view('npo.npo_landing_page', compact('npo_register'));
// 		if($npo_register->published){
// 		    return view('npo.npo_landing_page', compact('npo_register'));
// 		}
        $this_url = "/".$npo_register->title."/".$npo_register->npo_name;
        if($npo_register->proval != 0){
            // return view('/npo/npo_landing_page');
            return redirect($this_url)->with('message', 'Item updated successfully.');
        }
        return redirect()->route('npo_registers.show', compact('npo_register'))->with('message', 'Item updated successfully.');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function destroy($id)
	{
		$npo_register = Npo_register::findOrFail($id);
		$npo_register->delete();

		return redirect()->route('npo_registers.index')->with('message', 'Item deleted successfully.');
	}

    // 公開をしている時（下のも同時に編集する必要あり）
    public function editing(string $npo_name)
    {
        $id_auth   = Auth::user()->id;
        $name_auth = Auth::user()->name;
        $user_auth = Auth::user()->email;
        $data['personal_info'] = \DB::table('personal_info')->where('user_id', $user_auth)->first();

        $this->middleware('auth:api');

		// データベースからnpo_nameに該当するユーザーの情報をまとめて抜き出して
        $currentNpoInfo = \DB::table('npo_registers')->where('npo_name', $npo_name)->first();
// 		$currentNpoInfo  = Npo_register::find($npo_name);

		//連想配列に入れtBladeテンプレートに渡しています。
        $data['npo_info'] = $currentNpoInfo;

        // currentNpoInfoの中からmemberのpersonalInfoを抜き出す必要あり。

        if($name_auth === $currentNpoInfo->manager){
            return view('npo_registers.edit', $data);
        }
        // member1~10の_twitterカラムに権限があれば見れる処理
        for($i = 1; $i < 11; $i++){
            // "member".$i."_twitter"がAuth::user()->nameに1が付いていたら、権限を持たす
            $member_auth = $name_auth."1";
            $check_auth  = "member".$i."_twitter";
            if($member_auth === $currentNpoInfo->$check_auth){
                return view('npo_registers.edit', $data);
            }
        }
        // これ以外だったら、errorを返す。
        return view('/errors/503');
    }

    // 公開をしていない時（上のも同時に編集する必要あり）
    // npo_registers/{$id}/edit で開く。まだ公開していない時に使用
    public function edit(string $npo_name)
    {
		$id_auth   = Auth::user()->id;
        $name_auth = Auth::user()->name;
        $user_auth = Auth::user()->email;
        $data['personal_info'] = \DB::table('personal_info')->where('user_id', $user_auth)->first();

        $this->middleware('auth:api');

		// データベースからnpo_nameに該当するユーザーの情報をまとめて抜き出して
        // $currentNpoInfo = \DB::table('npo_registers')->where('id', $npo_name)->first();
		$currentNpoInfo  = Npo_register::find($npo_name);

		//連想配列に入れtBladeテンプレートに渡しています。
        $data['npo_info'] = $currentNpoInfo;

        if($name_auth === $currentNpoInfo->manager){
            return view('npo_registers.edit', $data);
        }
        // member1~10の_twitterカラムに権限があれば見れる処理
        for($i = 1; $i < 11; $i++){
            // "member".$i."_twitter"がAuth::user()->nameに1が付いていたら、権限を持たす
            $member_auth = $name_auth."1";
            $check_auth  = "member".$i."_twitter";
            if($member_auth === $currentNpoInfo->$check_auth){
                return view('npo_registers.edit', $data);
            }
        }
        // これ以外だったら、errorを返す。
        return view('/errors/503');
    }

    public function payment(Request $request, string $npo_name) {
        $this->middleware('auth');
        $user_request_email = $request->stripeEmail;
        $auth      = Auth::user();
        $npo_id    = Auth::user()->npo_id;
        $name_auth = Auth::user()->name;
        $user_auth = Auth::user()->email;
        $npo_auth  = Auth::user()->npo;

        // 個人の寄付データ取ってくる
        $currentPremierData = \DB::table('premier_data')
            ->where('vision_id', $npo_name)
            ->where('user_define', $user_request_email)
            ->where('premier_id', 1)
            ->first();
        $currentUserInfo = Auth::user()->where('name', $name_auth)->first();
        $currentNpoInfo  = \DB::table('npo_registers')->where('npo_name', $npo_name)->first();
        // すでに募集購入数を上回っていたらエラーを返す。
        if($currentNpoInfo->buyer >= $currentNpoInfo->support_limit){
            return view('/errors/503');
        }
        // ストライプ側の処理
        \Stripe\Stripe::setApiKey("sk_test_FoGhfwb6NnvDUnFHoeufcBss");

        // Get the credit card details submitted by the form
        $token = $_POST['stripeToken'];
        // Create a charge: this will charge the user's card
        $the_price = $currentNpoInfo->support_amount;
        // $total = $currentNpoInfo->support_amount*1.0375;
        $point = $the_price/100;
        $the_point = floor($point);
        $sdgs_count = 0;
        $sdgs_num = [];
        for($i = 1; $i < 7; $i++){
            $sdgs_i = 'sdgs'.$i;
            if($currentNpoInfo->$sdgs_i){
                $sdgs_count++;
                $sdgs_num[$i] = $currentNpoInfo->$sdgs_i;
            }else{
                $sdgs_num[$i] = "";
            }
        }
        //
        if($sdgs_count == 0){
            $sdgs_count = 17;
        }
        $sdgs_point = round($point/$sdgs_count, 2);
        $sdgs_point_box = [];
        if($sdgs_count == 17){
            for($i = 1; $i < 18; $i++){
                $sdgs_point_box[$i] = $sdgs_point;
            }
        }
        for($j = 1; $j < 18; $j++){
            $sdgs_j = 'sdgs'.$j;
            $sdgs_point_box[$j] = 0;
            $j_ja  = '0'.$j.'_ja';
            $j_ja2 = $j.'_ja';
            $j_ja_2 = $j.'_ja_2';
            for($k = 1; $k < 7; $k++){
                if($sdgs_num[$k] == $j_ja || $sdgs_num[$k] == $j_ja2 || $sdgs_num[$k] == $j_ja_2){
                    $sdgs_point_box[$j] = $sdgs_point;
                }
            }
        }

        try {
            $customer = \Stripe\Customer::create(array(
                'email' => $user_request_email
            ));
            $charge = \Stripe\Charge::create(array(
                "amount"      => $the_price, // 課金額はココで調整
                "currency"    => "jpy",
                "description" => $npo_name,
                "source"      => $token
            ));
        } catch (\Stripe\Error\Card $e) {
            return view('/errors/503');
        }

        // F#側の処理
        // titleとvision_idとpremier_idで判別
        if($currentPremierData != null){
            \DB::table('premier_data')
                ->where('vision_id', $npo_name)
                ->where('user_define', $user_request_email)
                ->where('premier_id', 1)
                ->update([
                    'status'      => $currentPremierData->status + $currentNpoInfo->support_amount,
                    'participants'=> $currentPremierData->participants + 1,
                    'updated_at'  => new Carbon(Carbon::now())
                ]);
        }else{
            \DB::table('premier_data')->insert([
                'user_id'     => $token,                          // 誰が寄付したのかemailで管理
                'vision_id'   => $npo_name,                       // どのプロジェクトに寄付したのかURLで管理
                'premier_id'  => 1,                               // 通常の寄付なら1、企業からの寄付なら2、企業からのプレミア寄付なら3
                'user_define' => $user_request_email,             // 寄付した団体名（これは使わないかな。）
                'status'      => $currentNpoInfo->support_amount, // いくら寄付したのか
                'published'   => new Carbon(Carbon::now()),       // これも使わなそうだけど一応
                // 'description' => $user_company_auth,              // 寄付をした法人名
                'participants'=> 1,                               // 購入回数
                'delflg'      => 0,                               // 1だったら非表示。未実装
                'created_at'  => new Carbon(Carbon::now()),       // 寄付した時刻
                'updated_at'  => new Carbon(Carbon::now())        // 寄付した時刻
            ]);
        }
        // デポジットに追加（NPOテーブル）
        \DB::table('npo_registers')->where('npo_name', $npo_name)->update([
            'deposit'  => $currentNpoInfo->deposit + $the_price,
            'follower' => $currentNpoInfo->follower + $currentNpoInfo->support_amount, // いくら寄付したかの合計
            'buyer'    => $currentNpoInfo->buyer + 1 // 購入した数
        ]);
        // デポジット・ポイントに追加（ユーザーテーブル）
        $user_deposit = floor($the_price*0.9); // 10%の手数料発生
        $npoUserInfo = \DB::table('users')->where('npo', $currentNpoInfo->title)->first();
        if($sdgs_count != 0){
            \DB::table('users')
                ->where('npo', $currentNpoInfo->title)
                ->update([
                    'point' => $npoUserInfo->point + $the_point,
                    'sdgs1' => $npoUserInfo->sdgs1 + $sdgs_point_box[1],
                    'sdgs2' => $npoUserInfo->sdgs2 + $sdgs_point_box[2],
                    'sdgs3' => $npoUserInfo->sdgs3 + $sdgs_point_box[3],
                    'sdgs4' => $npoUserInfo->sdgs4 + $sdgs_point_box[4],
                    'sdgs5' => $npoUserInfo->sdgs5 + $sdgs_point_box[5],
                    'sdgs6' => $npoUserInfo->sdgs6 + $sdgs_point_box[6],
                    'sdgs7' => $npoUserInfo->sdgs7 + $sdgs_point_box[7],
                    'sdgs8' => $npoUserInfo->sdgs8 + $sdgs_point_box[8],
                    'sdgs9' => $npoUserInfo->sdgs9 + $sdgs_point_box[9],
                    'sdgs10' => $npoUserInfo->sdgs10 + $sdgs_point_box[10],
                    'sdgs11' => $npoUserInfo->sdgs11 + $sdgs_point_box[11],
                    'sdgs12' => $npoUserInfo->sdgs12 + $sdgs_point_box[12],
                    'sdgs13' => $npoUserInfo->sdgs13 + $sdgs_point_box[13],
                    'sdgs14' => $npoUserInfo->sdgs14 + $sdgs_point_box[14],
                    'sdgs15' => $npoUserInfo->sdgs15 + $sdgs_point_box[15],
                    'sdgs16' => $npoUserInfo->sdgs16 + $sdgs_point_box[16],
                    'sdgs17' => $npoUserInfo->sdgs17 + $sdgs_point_box[17],
                    'total_deposit' => $npoUserInfo->total_deposit + $user_deposit
                ]);
        }

        // ポイント
        Auth::user()->where('name', $name_auth)->update([
            'point' => $currentUserInfo->point + $the_point,
            'sdgs1' => $currentUserInfo->sdgs1 + $sdgs_point_box[1],
            'sdgs2' => $currentUserInfo->sdgs2 + $sdgs_point_box[2],
            'sdgs3' => $currentUserInfo->sdgs3 + $sdgs_point_box[3],
            'sdgs4' => $currentUserInfo->sdgs4 + $sdgs_point_box[4],
            'sdgs5' => $currentUserInfo->sdgs5 + $sdgs_point_box[5],
            'sdgs6' => $currentUserInfo->sdgs6 + $sdgs_point_box[6],
            'sdgs7' => $currentUserInfo->sdgs7 + $sdgs_point_box[7],
            'sdgs8' => $currentUserInfo->sdgs8 + $sdgs_point_box[8],
            'sdgs9' => $currentUserInfo->sdgs9 + $sdgs_point_box[9],
            'sdgs10' => $currentUserInfo->sdgs10 + $sdgs_point_box[10],
            'sdgs11' => $currentUserInfo->sdgs11 + $sdgs_point_box[11],
            'sdgs12' => $currentUserInfo->sdgs12 + $sdgs_point_box[12],
            'sdgs13' => $currentUserInfo->sdgs13 + $sdgs_point_box[13],
            'sdgs14' => $currentUserInfo->sdgs14 + $sdgs_point_box[14],
            'sdgs15' => $currentUserInfo->sdgs15 + $sdgs_point_box[15],
            'sdgs16' => $currentUserInfo->sdgs16 + $sdgs_point_box[16],
            'sdgs17' => $currentUserInfo->sdgs17 + $sdgs_point_box[17]
        ]);
//        dd($auth);
//        dd($currentUserInfo);
        // 購入者にメール送信処理（/views/emails/payment-from.blade.phpにデータを送る）
        $subject_payment_from = $npo_name."への支払いが完了しました。";
        Mail::send(['text' => 'emails.payment-from'], [
                'auth_before'   => $auth, // 購入前のauthデータ
                'auth_after'    => $currentUserInfo, // 購入後のauthデータ
                'npo_user_info' => $npoUserInfo,
                'npo_info'      => $currentNpoInfo,
                'npo_name'      => $npo_name
            ]
            , function($message) use($user_request_email, $subject_payment_from) {
                $message
                ->from('g181tg2061@dhw.ac.jp')
                ->to($user_request_email)
                ->bcc('nj.takayuki@gmail.com')
                ->subject($subject_payment_from);
            }
        );

        // NPO管理者にメール送信処理（/views/emails/payment-from.blade.phpにデータを送る）
        $subject_payment_to = $name_auth."さんから".$npo_name."への支払いがありました。";
        Mail::send(['text' => 'emails.payment-to'], [
                'auth_before'   => $auth, // 購入前のauthデータ
                'auth_after'    => $currentUserInfo, // 購入後のauthデータ
                'npo_user_info' => $npoUserInfo,
                'npo_info'      => $currentNpoInfo,
                'npo_name'      => $npo_name
            ]
            , function($message) use($npoUserInfo, $subject_payment_to) {
                $message
                    ->from('g181tg2061@dhw.ac.jp')
                    ->to($npoUserInfo->email)
                    ->bcc('nj.takayuki@gmail.com')
                    ->subject($subject_payment_to);
            }
        );

        // return view('/thank_you_for_support');
        return back();
    }

    public function send_mail(Request $request, string $npo_name) {

        // $npo_register->subtitle = $request->input("subtitle"); // プロジェクトの名前
        // return view('/thank_you_for_support');
        $name = $request->name;
        $email = $request->email;
        $title = $request->title;
        $message = $request->message;
        mb_language("Japanese");
        mb_internal_encoding("UTF-8");
        if(mb_send_mail($email, $title, $message)){
            mb_send_mail($email, $title, $message);
            $mail_message = "alart(メールの送信に成功しました)";
        } else {
            dd("alart(メールの送信に失敗しました)");
        };
        // dd($request);
        // $dat['mail_message'] = $mail_message;
        return back();
    }
}
