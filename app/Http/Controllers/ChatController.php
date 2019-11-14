<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;
use Carbon\Carbon;

class ChatController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    public function index()
    {
        return view('chat/list');
    }

    public function list()
    {
        return view('chat/list');
    }

    public function chat_list(Request $request){
        dd("a");
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
