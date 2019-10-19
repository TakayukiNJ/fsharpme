<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Vision;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Carbon\Carbon;
use Validator;
use App\User;

class VisionDealController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except' => ['buy', 'sell', 'confirm']]);
        //$this->middleware('auth');
    }
    // Vision購入画面
    public function buy()
    {
        return view('connect/buy');
    }
    // Vision購入確認画面
    public function buy_confirm(Request $request)
    {
        $id=$request->input('id');
        $user=$request->input('user_id');
        return view('connect/buy_confirm')->with('id', $id)->with('user', $user);
    }
    // Vision購入完了画面
    public function buy_complete(Request $request)
    {
        $id=$request->input('id');
        $user=$request->input('user_id');
        return view('connect/buy_complete')->with('id', $id)->with('user', $user);
    }
    public function confirm()
    {
        return view('connect/confirm');
    }
    // Vision作成画面
    public function vision_sell_regist()
    {
        $id = Auth::user()->id;
        $user = Auth::user()->email;

        session(['vision_id' => '未発行']);
        session(['vision_title' => '']);
        session(['image_id' => '']);
        session(['vision_status' => 'open']);
        session(['vision_published' => '']);
        session(['vision_description' => '']);
        session(['first_commitment_stage' => '']);
        session(['second_commitment_stage' => '']);

        return view('connect/vision_sell_regist')
        ->with('vision_id', '未発行')
        ->with('vision_title', '')
        ->with('image_id', '')
        ->with('vision_status', 'open')
        ->with('vision_published', '')
        ->with('vision_description', '')
        ->with('first_commitment_stage', '')
        ->with('second_commitment_stage', '');
    }
    // Vision作成確認画面
    public function vision_sell_regist_confirm(Request $request)
    {
        $id = Auth::user()->id;
        $user = Auth::user()->email;

        $validator = Validator::make($request->all(),[
            'vision_title' => 'required|string|between:1,255',
            'vision_description' => 'required|string|between:1,4000',
            'first_commitment_stage' => 'required|integer|digits_between:4,13',
            'second_commitment_stage' => 'required|integer|digits_between:4,13',
            ]);

        if ($validator->fails()){
            $user = User::find(auth()->id());
            return view('connect/vision_sell_regist', compact('user'))
            ->with('id', $id)
            ->with('user', $user)
            ->with('vision_id', $request->vision_id)
            ->with('vision_title', $request->vision_title)
            ->with('vision_status', $request->vision_status)
            ->with('vision_published', $request->vision_published)
            ->with('vision_description', $request->vision_description)
            ->with('first_commitment_stage', $request->first_commitment_stage)
            ->with('second_commitment_stage', $request->second_commitment_stage)
            ->withErrors($validator);
        } else {
            session(['vision_id' => $request->vision_id]);
            session(['vision_title' => $request->vision_title]);
            session(['vision_status' => $request->vision_status]);
            session(['vision_published' => $request->vision_published]);
            session(['vision_description' => $request->vision_description]);
            session(['first_commitment_stage' => $request->first_commitment_stage]);
            session(['second_commitment_stage' => $request->second_commitment_stage]);

            return view('connect/vision_sell_regist_confirm')
            ->with('id', $id)
            ->with('user', $user)
            ->with('vision_id', $request->vision_id)
            ->with('vision_title', $request->vision_title)
            ->with('vision_status', $request->vision_status)
            ->with('vision_published', $request->vision_published)
            ->with('vision_description', $request->vision_description)
            ->with('first_commitment_stage', $request->first_commitment_stage)
            ->with('second_commitment_stage', $request->second_commitment_stage);
        }
    }

    // Vision作成処理
    public function vision_sell_regist_process(Request $request)
    {
        $id = Auth::user()->id;
        $user = Auth::user()->email;

        // Visionの登録件数を調べる
        $query = DB::table('vision_data');
        $query->where('user_id', $user);
        $result = $query->count();

        $next_vision_id = 0;
        if ($result == 0) {
            $next_vision_id = 1;
        } else {
            // 現在のおみくじ番号の最大値を取得する
            $query = DB::table('vision_data');
            $query->select('vision_id');
            $query->where('user_id', $user);
            $result = $query->max('vision_id');
            $next_vision_id = $result + 1;
        }

        // データの登録
        $data_tbl = [
            'user_id' => $user,
             'vision_id' => $next_vision_id,
             'vision_title' => session('vision_title'),
             'image_id' => session('image_id'),
             'vision_status' => 'open',
             'vision_published' => Carbon::now(),
             'vision_description' => session('vision_description'),
             'first_commitment_stage' => session('first_commitment_stage'),
             'second_commitment_stage' => session('second_commitment_stage'),
             'delflg' => '0'
        ];

        $cli = DB::table('vision_data')->insert($data_tbl);

        return view('connect/vision_sell_regist_process')->with('id', $id)->with('user', $user);
    }


    // Vision作成完了画面
    public function vision_sell_regist_complete(Request $request)
    {
        $id = Auth::user()->id;
        $user = Auth::user()->email;

        return view('connect/vision_sell_regist_complete')->with('id', $id)->with('user', $user);
    }

    // Vision更新画面
    public function vision_sell_modify(Request $request)
    {
        $id = Auth::user()->id;
        $user = Auth::user()->email;

        $query = DB::table('vision_data');
        $query -> where('user_id', $user);
        $query -> where('vision_id', $request->vision_id);
        $count = $query -> count();

        if ($count <> 0) {
            $query = DB::table('vision_data');
            $query -> where('user_id', $user);
            $query -> where('vision_id', $request->vision_id);
            $vision_data = $query -> first();

            session(['vision_id' => $vision_data->vision_id]);
            session(['vision_title' => $vision_data->vision_title]);
            session(['image_id' => $vision_data->image_id]);
            session(['vision_status' => $vision_data->vision_status]);
            session(['vision_published' => $vision_data->vision_published]);
            session(['vision_description' => $vision_data->vision_description]);
            session(['first_commitment_stage' => $vision_data->first_commitment_stage]);
            session(['second_commitment_stage' => $vision_data->second_commitment_stage]);
        } else {
            session(['vision_id' => '']);
            session(['vision_title' => '']);
            session(['image_id' => '']);
            session(['vision_status' => '']);
            session(['vision_published' => '']);
            session(['vision_description' => '']);
            session(['first_commitment_stage' => '']);
            session(['second_commitment_stage' => '']);

        }

        return view('connect/vision_sell_modify')
        ->with('id', $id)
        ->with('user', $user)
        ->with('vision_id', session('vision_id'))
        ->with('vision_title', session('vision_title'))
        ->with('image_id', session('image_id'))
        ->with('vision_status', session('vision_status'))
        ->with('vision_published', session('vision_published'))
        ->with('vision_description', session('vision_description'))
        ->with('first_commitment_stage', session('first_commitment_stage'))
        ->with('second_commitment_stage', session('second_commitment_stage'));

    }
    // Vision更新確認画面
    public function vision_sell_modify_confirm(Request $request)
    {
        $id = Auth::user()->id;
        $user = Auth::user()->email;
        $validator = Validator::make($request->all(),[
            'vision_title' => 'required|string|between:1,255',
            'vision_description' => 'required|string|between:1,4000',
            'first_commitment_stage' => 'required|integer|digits_between:4,13',
            'second_commitment_stage' => 'required|integer|digits_between:4,13',
        ]);

        if ($validator->fails()){
            $user = User::find(auth()->id());
            return view('connect/vision_sell_modify', compact('user'))
            ->with('id', $id)
            ->with('user', $user)
            ->with('vision_id', $request->vision_id)
            ->with('vision_title', $request->vision_title)
            ->with('vision_status', $request->vision_status)
            ->with('vision_published', $request->vision_published)
            ->with('vision_description', $request->vision_description)
            ->with('first_commitment_stage', $request->first_commitment_stage)
            ->with('second_commitment_stage', $request->second_commitment_stage)
            ->withErrors($validator);
        } else {
            session(['vision_id' => $request->vision_id]);
            session(['vision_title' => $request->vision_title]);
            session(['image_id' => $request->image_id]);
            session(['vision_status' => $request->vision_status]);
            session(['vision_published' => $request->vision_published]);
            session(['vision_description' => $request->vision_description]);
            session(['first_commitment_stage' => $request->first_commitment_stage]);
            session(['second_commitment_stage' => $request->second_commitment_stage]);

            return view('connect/vision_sell_modify_confirm')
            ->with('id', $id)
            ->with('user', $user)
            ->with('vision_id', $request->vision_id)
            ->with('vision_title', $request->vision_title)
            ->with('image_id', $request->image_id)
            ->with('vision_status', $request->vision_status)
            ->with('vision_published', $request->vision_published)
            ->with('vision_description', $request->vision_description)
            ->with('first_commitment_stage', $request->first_commitment_stage)
            ->with('second_commitment_stage', $request->second_commitment_stage);
        }
    }

    // Vision更新処理
    public function vision_sell_modify_process(Request $request)
    {
        $id = Auth::user()->id;
        $user = Auth::user()->email;

        // データの更新
        $data_tbl = [
            'user_id' => $user,
            'vision_title' => session('vision_title'),
            'image_id' => session('image_id'),
            'vision_status' => session('vision_status'),
            'vision_description' => session('vision_description'),
            'first_commitment_stage' => session('first_commitment_stage'),
            'second_commitment_stage' => session('second_commitment_stage'),
            'delflg' => '0'
        ];

        $cli = DB::table('vision_data')->where('vision_id', session('vision_id'))->update($data_tbl);

        return view('connect/vision_sell_modify_process');
    }


    // Vision更新完了画面
    public function vision_sell_modify_complete(Request $request)
    {
        return view('connect/vision_sell_modify_complete');
    }


    //VISION売却詳細画面
    public function sell_detail(Request $request)
    {
        $id=$request->input('id');
        $user=$request->input('user_id');
        return view('connect/sell_detail')->with('id', $id)->with('user', $user);
    }
    //VISION売却詳細OPEN画面
    public function sell_detail_open(Request $request)
    {
        $id=$request->input('id');
        $user=$request->input('user_id');
        return view('connect/sell_detail_open')->with('id', $id)->with('user', $user);
    }
    //VISION売却詳細CLOSE画面
    public function sell_detail_close(Request $request)
    {
        $id=$request->input('id');
        $user=$request->input('user_id');
        return view('connect/sell_detail_close')->with('id', $id)->with('user', $user);
    }
    //VISION売却詳細抽選画面
    public function sell_detail_lottery(Request $request)
    {
        $id=$request->input('id');
        $user=$request->input('user_id');
        return view('connect/sell_detail_lottery')->with('id', $id)->with('user', $user);
    }
    //VISION売却詳細抽選結果画面
    public function sell_detail_lottery_result(Request $request)
    {
        $id=$request->input('id');
        $user=$request->input('user_id');
        return view('connect/sell_detail_lottery_result')->with('id', $id)->with('user', $user);
    }
    //優待登録画面
    public function sell_detail_regist(Request $request)
    {
        $id = Auth::user()->id;
        $user = Auth::user()->email;
        session(['vision_id' => $request->input('vision_id')]);
        session(['premier_id' => '']);
        session(['title' => '']);
        session(['image_id' => '']);
        session(['status' => '']);
        session(['published' => '']);
        session(['description' => '']);
        session(['description_detail' => '']);
        session(['participants' => '']);
        session(['start_dt_year' => '']);
        session(['start_dt_month' => '']);
        session(['start_dt_day' => '']);
        session(['start_dt_hour' => '']);
        session(['start_dt_min' => '']);
        session(['start_dt_sec' => '']);
        session(['end_dt_year' => '']);
        session(['end_dt_month' => '']);
        session(['end_dt_day' => '']);
        session(['end_dt_hour' => '']);
        session(['end_dt_min' => '']);
        session(['end_dt_sec' => '']);
        session(['bidder_price' => '']);
        session(['max_price' => '']);
        session(['min_price' => '']);
        session(['max_bid_participants' => '']);
        session(['min_bid_participants' => '']);

        return view('connect/sell_detail_regist')
        ->with('id', $id)
        ->with('vision_id', $request->input('vision_id'))
        ->with('premier_id', '')
        ->with('title', '')
        ->with('image_id', '')
        ->with('status', 'open')
        ->with('published', '')
        ->with('description', '')
        ->with('description_detail', '')
        ->with('participants', '')
        ->with('start_dt_year', '')
        ->with('start_dt_month', '')
        ->with('start_dt_day', '')
        ->with('start_dt_hour', '')
        ->with('start_dt_min', '')
        ->with('start_dt_sec', '')
        ->with('end_dt_year', '')
        ->with('end_dt_month', '')
        ->with('end_dt_day', '')
        ->with('end_dt_hour', '')
        ->with('end_dt_min', '')
        ->with('end_dt_sec', '')
        ->with('bidder_price', '')
        ->with('max_price', '')
        ->with('min_price', '')
        ->with('max_bid_participants', '')
        ->with('min_bid_participants', '');
    }
    //優待登録確認画面
    public function sell_detail_regist_confirm(Request $request)
    {
        $id = Auth::user()->id;
        $user = Auth::user()->email;

        $validator = Validator::make($request->all(),[
            'title' => 'required|string|between:1,255',
            'description' => 'required|string|between:1,255',
            'description_detail' => 'required|string|between:1,4000',
            'start_dt_year' => 'required|integer|digits_between:1,13',
            'start_dt_month' => 'required|integer|digits_between:1,13',
            'start_dt_day' => 'required|integer|digits_between:1,13',
            'start_dt_hour' => 'required|integer|digits_between:1,13',
            'start_dt_min' => 'required|integer|digits_between:1,13',
            'start_dt_sec' => 'required|integer|digits_between:1,13',
            'end_dt_year' => 'required|integer|digits_between:1,13',
            'end_dt_month' => 'required|integer|digits_between:1,13',
            'end_dt_day' => 'required|integer|digits_between:1,13',
            'end_dt_hour' => 'required|integer|digits_between:1,13',
            'end_dt_min' => 'required|integer|digits_between:1,13',
            'end_dt_sec' => 'required|integer|digits_between:1,13',
            'bidder_price' => 'required|integer|digits_between:1,13',
            'max_price' => 'required|integer|digits_between:1,13',
            'min_price' => 'required|integer|digits_between:1,13',
        ]);

        if ($validator->fails()){
            return view('connect/sell_detail_regist')
            ->with('id', $id)
            ->with('vision_id', $request->input('vision_id'))
            ->with('premier_id', $request->input('premier_id'))
            ->with('title', $request->input('title'))
            ->with('image_id', $request->input('image_id'))
            ->with('status', 'open')
            ->with('published', $request->input('published'))
            ->with('description', $request->input('description'))
            ->with('description_detail', $request->input('description_detail'))
            ->with('participants', $request->input('participants'))
            ->with('start_dt_year', $request->input('start_dt_year'))
            ->with('start_dt_month', $request->input('start_dt_month'))
            ->with('start_dt_day', $request->input('start_dt_day'))
            ->with('start_dt_hour', $request->input('start_dt_hour'))
            ->with('start_dt_min', $request->input('start_dt_min'))
            ->with('start_dt_sec', $request->input('start_dt_sec'))
            ->with('end_dt_year', $request->input('end_dt_year'))
            ->with('end_dt_month', $request->input('end_dt_month'))
            ->with('end_dt_day', $request->input('end_dt_day'))
            ->with('end_dt_hour', $request->input('end_dt_hour'))
            ->with('end_dt_min', $request->input('end_dt_min'))
            ->with('end_dt_sec', $request->input('end_dt_sec'))
            ->with('bidder_price', $request->input('bidder_price'))
            ->with('max_price', $request->input('max_price'))
            ->with('min_price', $request->input('min_price'))
            ->with('max_bid_participants', $request->input('max_bid_participants'))
            ->with('min_bid_participants', $request->input('min_bid_participants'))
            ->withErrors($validator);
        } else {
            session(['premier_id' => $request->input('premier_id')]);
            session(['title' => $request->input('title')]);
            session(['image_id' => $request->input('image_id')]);
            session(['status' => $request->input('status')]);
            session(['published' => $request->input('published_year'). $request->input('published_month'). $request->input('published_day'). ' '. $request->input('published_hour'). $request->input('published_min'). $request->input('published_sec')]);
            session(['description' => $request->input('description')]);
            session(['description_detail' => $request->input('description_detail')]);
            if(empty($request->input('participants'))) {
                session(['participants' => '0']);
            } else {
                session(['participants' => $request->input('participants')]);
            }
            session(['start_dt' => $request->input('start_dt_year'). '/'. $request->input('start_dt_month'). '/'. $request->input('start_dt_day'). ' '. $request->input('start_dt_hour'). ':'. $request->input('start_dt_min'). ':'. $request->input('start_dt_sec')]);
            session(['end_dt' => $request->input('end_dt_year'). '/'. $request->input('end_dt_month'). '/'. $request->input('end_dt_day'). ' '. $request->input('end_dt_hour'). ':'. $request->input('end_dt_month'). ':'. $request->input('end_dt_day')]);
            if(empty($request->input('bidder_price'))) {
                session(['bidder_price' => '0']);
            } else {
                session(['bidder_price' => $request->input('bidder_price')]);
            }
            if(empty($request->input('max_price'))){
                session(['max_price' => '0']);
            } else {
                session(['max_price' => $request->input('max_price')]);
            }
            if(empty($request->input('min_price'))) {
                session(['min_price' => '0']);
            } else {
                session(['min_price' => $request->input('min_price')]);
            }
            if(empty($request->input('min_price'))) {
                session(['max_bid_participants' => '0']);
            } else {
                session(['max_bid_participants' => $request->input('max_bid_participants')]);
            }
            if(empty($request->input('min_price'))) {
                session(['min_bid_participants' => '0']);
            } else {
                session(['min_bid_participants' => $request->input('min_bid_participants')]);
            }

            // VISIONタイトルを取得
            $query = DB::table('vision_data')->where('vision_id', session('vision_id'))->first();

            return view('connect/sell_detail_regist_confirm')
            ->with('id', $id)
            ->with('vision_id', session('vision_id'))
            ->with('vision_title', $query->vision_title)
            ->with('premier_id', '採番中')
            ->with('premier_title', $request->input('title'))
            ->with('image_id', $request->input('image_id'))
            ->with('status', $request->input('status'))
            ->with('published', $request->input('published'))
            ->with('description', $request->input('description'))
            ->with('description_detail', $request->input('description_detail'))
            ->with('participants', session('participants'))
            ->with('start_dt', $request->input('start_dt_year'). '/'. $request->input('start_dt_month'). '/'. $request->input('start_dt_day'). ' '. $request->input('start_dt_hour'). ':'. $request->input('start_dt_min'). ':'. $request->input('start_dt_sec'))
            ->with('end_dt', $request->input('end_dt_year'). '/'. $request->input('end_dt_month'). '/'. $request->input('end_dt_day'). ' '. $request->input('end_dt_hour'). ':'. $request->input('end_dt_min'). ':'. $request->input('end_dt_sec'))
            ->with('bidder_price', session('bidder_price'))
            ->with('max_price', session('max_price'))
            ->with('min_price', session('min_price'))
            ->with('max_bid_participants', session('max_bid_participants'))
            ->with('min_bid_participants', session('min_bid_participants'));
        }

    }
    //優待登録処理
    public function sell_detail_regist_process(Request $request)
    {
        $id = Auth::user()->id;
        $user = Auth::user()->email;

        // 一番大きなomikuji_sub_idを取得する
        // 対象とするビジョンの、おみくじの登録件数を調べる
        $query = DB::table('premier_data');
        $query->where('user_id', $user)->where('vision_id', session('vision_id'));
        $result = $query->count();

        // おみくじ番号を設定する
        $next_premier_id = 0;
        if ($result == 0) {
            $next_premier_id = 1;
        } else {
            // 対象とするビジョンの、現在の優待番号の最大値を取得する
            $query = DB::table('premier_data');
            $query->select('premier_id');
            $query->where('user_id', $user)->where('vision_id', session('vision_id'));
            $result = $query->max('premier_id');
            $next_premier_id = $result + 1;
        }

        $data_tbl = [
            'user_id' => $user,
            'vision_id' => session('vision_id'),
            'premier_id' => $next_premier_id,
            'title' => session('title'),
            'image_id' => session('image_id'),
            'status' => session('status'),
            'published' => Carbon::now(),
            'description' => session('description'),
            'description_detail' => session('description_detail'),
            'participants' => session('participants'),
            'start_dt' => session('start_dt'),
            'end_dt' => session('end_dt'),
            'bidder_price' => session('bidder_price'),
            'max_price' => session('max_price'),
            'min_price' => session('min_price'),
            'max_bid_participants' => session('max_bid_participants'),
            'min_bid_participants' => session('min_bid_participants'),
            'participants' => session('participants'),
            'delflg' => '0'
        ];

        $cli = DB::table('premier_data')->insert($data_tbl);

        return view('connect/sell_detail_regist_process')->with('id', $id)->with('user', $user);
    }
    //優待登録完了画面
    public function sell_detail_regist_complete(Request $request)
    {
        $id=$request->input('id');
        $user=$request->input('user_id');
        return view('connect/sell_detail_regist_complete')->with('id', $id)->with('user', $user);
    }
    //優待更新画面
    public function sell_detail_modify(Request $request)
    {
        $id = Auth::user()->id;
        $user = Auth::user()->email;

        // 優待を取得
        $query = DB::table('premier_data')->where('premier_id', $request->input('premier_id'))->first();

        // VISIONタイトルを取得
        $query_vision = DB::table('vision_data')->where('vision_id', $query->vision_id)->first();

        session(['vision_id' => $query->vision_id]);
        session(['vision_title' => $query_vision->vision_title]);
        session(['premier_id' => $query->premier_id]);
        session(['premier_title' => $query->title]);
        session(['image_id' => $query->image_id]);
        session(['status' => $query->status]);
        session(['published' => $query->published]);
        session(['description' => $query->description]);
        session(['description_detail' => $query->description_detail]);
        session(['participants' => $query->participants]);
        session(['start_dt' => $query->start_dt]);
        $start_dt_str = $query->start_dt;
        logger("start_dt_year[". substr($start_dt_str,0,4). "]");
        logger("start_dt_month[".substr($start_dt_str,5,2). "]");
        logger("start_dt_day[". substr($start_dt_str,8,2). "]");
        logger("start_dt_hour[". substr($start_dt_str,9,2). "]");
        logger("start_dt_min[". substr($start_dt_str,11,2). "]");
        logger("start_dt_sec[". substr($start_dt_str,13,2). "]");
        session(['start_dt_year' => substr($start_dt_str,0,4)]);
        session(['start_dt_month' => substr($start_dt_str,5,2)]);
        session(['start_dt_day' => substr($start_dt_str,8,2)]);
        session(['start_dt_hour' => substr($start_dt_str,9,2)]);
        session(['start_dt_min' => substr($start_dt_str,11,2)]);
        session(['start_dt_sec' => substr($start_dt_str,13,2)]);
        session(['end_dt_year' => $query->end_dt]);
        session(['end_dt_month' => $query->end_dt]);
        session(['end_dt_day' => $query->end_dt]);
        session(['end_dt_hour' => $query->end_dt]);
        session(['end_dt_min' => $query->end_dt]);
        session(['end_dt_sec' => $query->end_dt]);
        session(['bidder_price' => $query->bidder_price]);
        session(['max_price' => $query->max_price]);
        session(['min_price' => $query->min_price]);
        session(['max_bid_participants' => $query->max_bid_participants]);
        session(['min_bid_participants' => $query->min_bid_participants]);

        return view('connect/sell_detail_modify')
        ->with('id', $id)
        ->with('vision_id', $query->vision_id)
        ->with('vision_title', $query_vision->vision_title)
        ->with('premier_id', $query->premier_id)
        ->with('premier_title', $query->title)
        ->with('image_id', $query->image_id)
        ->with('status', $query->status)
        ->with('published', $query->published)
        ->with('description', $query->description)
        ->with('description_detail', $query->description_detail)
        ->with('participants', $query->participants)
        ->with('start_dt_year', substr($start_dt_str,0,4))
        ->with('start_dt_month', substr($start_dt_str,5,2))
        ->with('start_dt_day', substr($start_dt_str,8,2))
        ->with('start_dt_hour', substr($start_dt_str,9,2))
        ->with('start_dt_min', substr($start_dt_str,11,2))
        ->with('start_dt_sec', substr($start_dt_str,13,2))
        ->with('end_dt', $query->end_dt)
        ->with('bidder_price', $query->bidder_price)
        ->with('max_price', $query->max_price)
        ->with('min_price', $query->min_price)
        ->with('max_bid_participants', $query->max_bid_participants)
        ->with('min_bid_participants', $query->min_bid_participants);

    }
    //優待更新確認画面
    public function sell_detail_modify_confirm(Request $request)
    {
        $id = Auth::user()->id;
        $user = Auth::user()->email;

        $validator = Validator::make($request->all(),[
            'premier_title' => 'required|string|between:1,255',
            'description' => 'required|string|between:1,255',
            'description_detail' => 'required|string|between:1,4000',
            'start_dt_year' => 'required|integer|digits_between:1,13',
            'start_dt_month' => 'required|integer|digits_between:1,13',
            'start_dt_day' => 'required|integer|digits_between:1,13',
            'start_dt_hour' => 'required|integer|digits_between:1,13',
            'start_dt_min' => 'required|integer|digits_between:1,13',
            'start_dt_sec' => 'required|integer|digits_between:1,13',
            'end_dt_year' => 'required|integer|digits_between:1,13',
            'end_dt_month' => 'required|integer|digits_between:1,13',
            'end_dt_day' => 'required|integer|digits_between:1,13',
            'end_dt_hour' => 'required|integer|digits_between:1,13',
            'end_dt_min' => 'required|integer|digits_between:1,13',
            'end_dt_sec' => 'required|integer|digits_between:1,13',
            'bidder_price' => 'required|integer|digits_between:1,13',
            'max_price' => 'required|integer|digits_between:1,13',
            'min_price' => 'required|integer|digits_between:1,13',
        ]);

        if ($validator->fails()){
            return view('connect/sell_detail_modify')
            ->with('id', $id)
            ->with('vision_id', $request->input('vision_id'))
            ->with('premier_id', $request->input('premier_id'))
            ->with('premier_title', $request->input('premier_title'))
            ->with('vision_title', $request->input('vision_title'))
            ->with('image_id', $request->input('image_id'))
            ->with('status', 'open')
            ->with('published', $request->input('published'))
            ->with('description', $request->input('description'))
            ->with('description_detail', $request->input('description_detail'))
            ->with('participants', $request->input('participants'))
            ->with('start_dt_year', $request->input('start_dt_year'))
            ->with('start_dt_month', $request->input('start_dt_month'))
            ->with('start_dt_day', $request->input('start_dt_day'))
            ->with('start_dt_hour', $request->input('start_dt_hour'))
            ->with('start_dt_min', $request->input('start_dt_min'))
            ->with('start_dt_sec', $request->input('start_dt_sec'))
            ->with('end_dt_year', $request->input('end_dt_year'))
            ->with('end_dt_month', $request->input('end_dt_month'))
            ->with('end_dt_day', $request->input('end_dt_day'))
            ->with('end_dt_hour', $request->input('end_dt_hour'))
            ->with('end_dt_min', $request->input('end_dt_min'))
            ->with('end_dt_sec', $request->input('end_dt_sec'))
            ->with('bidder_price', $request->input('bidder_price'))
            ->with('max_price', $request->input('max_price'))
            ->with('min_price', $request->input('min_price'))
            ->with('max_bid_participants', $request->input('max_bid_participants'))
            ->with('min_bid_participants', $request->input('min_bid_participants'))
            ->withErrors($validator);
        } else {
            session(['premier_id' => $request->input('premier_id')]);
            session(['premier_title' => $request->input('premier_title')]);
            session(['image_id' => $request->input('image_id')]);
            session(['status' => $request->input('status')]);
            session(['published' => $request->input('published')]);
            session(['description' => $request->input('description')]);
            session(['description_detail' => $request->input('description_detail')]);
            if(empty($request->input('participants'))) {
                session(['participants' => '0']);
            } else {
                session(['participants' => $request->input('participants')]);
            }
            session(['start_dt' => $request->input('start_dt')]);
            session(['end_dt' => $request->input('end_dt')]);
            if(empty($request->input('bidder_price'))) {
                session(['bidder_price' => '0']);
            } else {
                session(['bidder_price' => $request->input('bidder_price')]);
            }
            if(empty($request->input('max_price'))){
                session(['max_price' => '0']);
            } else {
                session(['max_price' => $request->input('max_price')]);
            }
            if(empty($request->input('min_price'))) {
                session(['min_price' => '0']);
            } else {
                session(['min_price' => $request->input('min_price')]);
            }
            if(empty($request->input('min_price'))) {
                session(['max_bid_participants' => '0']);
            } else {
                session(['max_bid_participants' => $request->input('max_bid_participants')]);
            }
            if(empty($request->input('min_price'))) {
                session(['min_bid_participants' => '0']);
            } else {
                session(['min_bid_participants' => $request->input('min_bid_participants')]);
            }

            session(['start_dt' => $request->input('start_dt_year'). '/'. $request->input('start_dt_month'). '/'. $request->input('start_dt_day'). ' '. $request->input('start_dt_hour'). ':'. $request->input('start_dt_min'). ':'. $request->input('start_dt_sec')]);
            session(['end_dt' => $request->input('end_dt_year'). '/'. $request->input('end_dt_month'). '/'. $request->input('end_dt_day'). ' '. $request->input('end_dt_hour'). ':'. $request->input('end_dt_month'). ':'. $request->input('end_dt_day')]);

            // VISIONタイトルを取得
            $query = DB::table('vision_data')->where('vision_id', session('vision_id'))->first();

            return view('connect/sell_detail_modify_confirm')
            ->with('id', $id)
            ->with('vision_id', $request->input('vision_id'))
            ->with('vision_title', $query->vision_title)
            ->with('premier_id', $request->input('premier_id'))
            ->with('premier_title', $request->input('title'))
            ->with('image_id', $request->input('image_id'))
            ->with('status', $request->input('status'))
            ->with('published', $request->input('published'))
            ->with('description', $request->input('description'))
            ->with('description_detail', $request->input('description_detail'))
            ->with('participants', session('participants'))
            ->with('start_dt', $request->input('start_dt_year'). '/'. $request->input('start_dt_month'). '/'. $request->input('start_dt_day'). ' '. $request->input('start_dt_hour'). ':'. $request->input('start_dt_min'). ':'. $request->input('start_dt_sec'))
            ->with('end_dt', $request->input('end_dt_year'). '/'. $request->input('end_dt_month'). '/'. $request->input('end_dt_day'). ' '. $request->input('end_dt_hour'). ':'. $request->input('end_dt_month'). ':'. $request->input('end_dt_day'))
            ->with('bidder_price', session('bidder_price'))
            ->with('max_price', session('max_price'))
            ->with('min_price', session('min_price'))
            ->with('max_bid_participants', session('max_bid_participants'))
            ->with('min_bid_participants', session('min_bid_participants'));
        }
    }

    //優待更新処理
    public function sell_detail_modify_process(Request $request)
    {
        $id = Auth::user()->id;
        $user = Auth::user()->email;

        $data_tbl = [
            'user_id' => $user,
            'vision_id' => session('vision_id'),
            'premier_id' => session('premier_id'),
            'title' => session('title'),
            'image_id' => session('image_id'),
            'status' => session('status'),
            'published' => Carbon::now(),
            'description' => session('description'),
            'description_detail' => session('description_detail'),
            'participants' => session('participants'),
            'start_dt' => session('start_dt'),
            'end_dt' => session('end_dt'),
            'end_dt' => session('end_dt'),
            'bidder_price' => session('bidder_price'),
            'max_price' => session('max_price'),
            'min_price' => session('min_price'),
            'max_bid_participants' => session('max_bid_participants'),
            'min_bid_participants' => session('min_bid_participants'),
            'participants' => session('participants'),
            'delflg' => '0'
        ];

        $cli = DB::table('premier_data')->where('vision_id', session('vision_id'))->where('premier_id', session('premier_id'))->update($data_tbl);

        return view('connect/sell_detail_modify_process')->with('id', $id)->with('user', $user);
    }
    //優待更新完了画面
    public function sell_detail_modify_complete(Request $request)
    {
        $id=$request->input('id');
        $user=$request->input('user_id');
        return view('connect/sell_detail_modify_complete')->with('id', $id)->with('user', $user);
    }
}
