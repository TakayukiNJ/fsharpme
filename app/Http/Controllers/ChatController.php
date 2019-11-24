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
        $npo = Auth::user()->npo;

        $data['personal_info'] = \DB::table('personal_info')->where('user_id', $user)->first();
        $all_messages          = \DB::table('messages')->where('from', $name)->get();
        // 2通以上送っているかどうかチェック
        $check = [];
        for($i=0; $i<count($all_messages); $i++){
            $check_1 = $all_messages[$i]->to;
//            $ = $org->subtitle;
            $key = in_array($check_1, $check);
            if($key){
//                dd(2);
            }else{
//                dd(1);
                array_push($check, $all_messages[$i]->to);
            }
        }

        dd($check);


            dd($all_messages);
        $all_messages_to_check = \DB::table('messages')->where('from', $name)->get();
        $data['message_to'] = [];
//        dd(count($all_messages));
        for($i=0; $i<count($all_messages); $i++){
            // もしまだ読んでいなければ+1
            $new_message = 0;
            if(0 == $all_messages[$i]->read_flg){
                $new_message = 1;
            }
            $org = \DB::table('npo_registers')->where('npo_name', $all_messages[$i]->to)->first();
            $project_search = $org->subtitle;
            $project_key = array_key_exists($project_search, $data['message_to']);
            if($project_key){
                dd(2);
            }
            array_push($data['message_to'], [$org->title => [$org->subtitle => ['new_messages' => 0]]]);
//            array($data['project_name2'][0], $org->npo_name));
//            array_push($data['project_name'][1], $org->npo_name);
//            array_push($data['project_name2'], $org->npo_name);
//            dd($data['project_name2'][1]);
//          $data['project_name'] += $all_messages[$i]->to;
//          $data['project_total_price'] += $project_total_price;
        }
//        dd($data);
        dd($data);
        dd($all_messages);
        return view('chat/list', $data);
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
