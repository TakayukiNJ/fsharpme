<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
//use Illuminate\Support\Facades\Auth;
use Auth;
use App\Events\MessageSent;
use Carbon\Carbon;

class ChatController extends Controller
{
//    public function __construct()
//    {
//      $this->middleware('auth');
//    }

    public function index()
    {
        dd(3);
        return view('chat/list');
    }

    public function list()
    {
        $name = Auth::user()->name;
        $user = Auth::user()->email;

        $data['personal_info'] = \DB::table('personal_info')->where('user_id', $user)->first();
        $all_messages          = \DB::table('messages')->where('from', $name)->orderBy('id', 'DESC')->get();
        // 2通以上送っているかどうかチェック
        $check_message_to = [];
        for($i=0; $i<count($all_messages); $i++){
            $check_1 = $all_messages[$i]->to;
            $key = in_array($check_1, $check_message_to);
            if(!$key){
                array_push($check_message_to, $all_messages[$i]->to);
            }
        }

        $data['message_to'] = [];
        for($i=0; $i<count($check_message_to); $i++){
            // 新規メッセージ数カウント
            $unread_count = \DB::table('messages')->where('from', $name)->where('to', $check_message_to[$i])->where('read_flg', 0)->count();
            // $data['message_to']に全データを格納
            $org = \DB::table('npo_registers')->where('npo_name', $check_message_to[$i])->first();
            array_push($data['message_to'], [$org->title => [$org->subtitle => ['new_messages' => $unread_count]]]);
        }
//        dd($data['message_to'][0]);
        return view('chat/list', $data);
    }

    public function chat_list(Request $request){
        return view('chat/list'); // フォームページのビュー

    }

//    public function index() {
//
//        return view('chat/chat'); // フォームページのビュー
//
//    }

    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function fetchMessages()
    {
      return Message::with('user')->get();
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    // public function sendMessage(Request $request)
    // {
    //   $user = Auth::user();

    //   $message = $user->messages()->create([
    //     'message' => $request->input('message')
    //   ]);

    //   broadcast(new MessageSent($user, $message))->toOthers();

    //   return ['status' => 'Message Sent!'];
    // }

    public function sendMessage(Request $request)
    {
      // $message = $user->messages()->create([
      //   'message' => $request->input('message')
      // ]);

      // broadcast(new MessageSent($user, $message))->toOthers();
      \DB::table('messages')->insert(
          [
          'from'        => $request->from,
          'to'          => $request->to,
          'message'     => $request->message,
          'read_flg'    => 0,                         // これ使わなそうだけど一応
          'delete_flg'  => 0,                         // これ使わなそうだけど一応
          'created_at'  => new Carbon(Carbon::now()), // 送った時刻
          'updated_at'  => new Carbon(Carbon::now())  // これ使わなそうだけど一応
          ]
      );
      return back();
    }
}
