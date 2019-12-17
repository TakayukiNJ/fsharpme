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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list()
    {
        $name = Auth::user()->name;
        $user = Auth::user()->email;

        $data['personal_info'] = \DB::table('personal_info')->where('user_id', $user)->first();
        $all_messages_from     = \DB::table('messages')->where('from', $name)->orderBy('id', 'DESC')->get();
        $all_messages_to       = \DB::table('messages')->where('to', $name)->orderBy('id', 'DESC')->get();
        // 2通以上送っているかどうかチェック
        $check_messages = [];
        // 受信部分
        for($i=0; $i<count($all_messages_from); $i++){
            $check_1 = $all_messages_from[$i]->to;
            $key = in_array($check_1, $check_messages);
            if(!$key){
                array_push($check_messages, $all_messages_from[$i]->to);
            }
        }
        // 送信部分
        for($i=0; $i<count($all_messages_to); $i++){
            $check_1 = $all_messages_to[$i]->from;
            $key = in_array($check_1, $check_messages);
            if(!$key){
                array_push($check_messages, $all_messages_to[$i]->from);
            }
        }

        $data['messages'] = [];
        for($i=0; $i<count($check_messages); $i++){
            // 新規メッセージ数カウント
            $unread_count = \DB::table('messages')->where('from', $check_messages[$i])->where('to', $name)->where('read_flg', 0)->count();
            // $data['message_to']に全データを格納
            $org = \DB::table('npo_registers')->where('npo_name', $check_messages[$i])->first();
            array_push($data['messages'], [$org->title => [$org->subtitle => ['new_messages' => $unread_count]]]);
        }


        return view('chat/list', $data);
    }

    /**
     * @param $title_key
     * @param $subtitle_key
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function chat_to_project_redirect($title_key, $subtitle_key){
        $project = \DB::table('npo_registers')->where('title', $title_key)->where('subtitle', $subtitle_key)->where('proval', 1)->first();
        if(!$project){
            return redirect(url('/'.$title_key));
        }
        $url = 'chat/to/'.$project->id;
        return redirect($url);
    }

    /**
     * @param $project_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function chat_to_project($project_id){
        $name = Auth::user()->name;
        $user = Auth::user()->email;

        $data['personal_info'] = \DB::table('personal_info')->where('user_id', $user)->first();
        $data['project_info'] = \DB::table('npo_registers')->where('id', $project_id)->first();

        $npo_name = $data['project_info']->npo_name;
        // ここにメッセージを書いていく。to と from 両方からデータ取ってきて sort すればいいのかな。もっと良いやり方考え中。
        $messages_from = \DB::table('messages')->whereIn('from', [$name, $npo_name])->whereIn('to', [$name, $npo_name])->orderBy('id', 'DESC')->get();
//        $messages_to = \DB::table('messages')->where('from', $npo_name)->where('to', $name)->orderBy('id', 'DESC')->get();
//
//        $messages_from = \DB::table('messages')->select('from as '.$name, 'email as '.$npo_name)->orderBy('id', 'DESC')->get();
//          $messages_from += $messages_to;
        dd($messages_from);
        return view('chat/toorg', $data); // フォームページのビュー
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list_for_npo($npo_name)
    {
        $npo = Auth::user()->npo;
        $user = Auth::user()->email;
        if ($npo_name != $npo) {
            return redirect('home/chat/list');
        }
        $data['npo_registers'] = \DB::table('npo_registers')->where('title', $npo)->get();
        return view('chat/toorg', $data);
    }
    public function list_for_project($npo_name, $project)
    {
        $npo = Auth::user()->npo;
        $user = Auth::user()->email;
        $data['personal_info'] = \DB::table('personal_info')->where('user_id', $user)->first();
        // ここは、メンバーなら見れるようにした方がいいかな。
        if ($npo_name != $npo) {
            return redirect('home/chat/list');
        }
        $all_messages_from     = \DB::table('messages')->where('from', $project)->orderBy('id', 'DESC')->get();
        $all_messages_to       = \DB::table('messages')->where('to', $project)->orderBy('id', 'DESC')->get();
//dd($all_messages_to );
        // 2通以上送っているかどうかチェック
        $check_messages = [];
        for($i=0; $i<count($all_messages_from); $i++){
            $check_1 = $all_messages_from[$i]->to;
            $key = in_array($check_1, $check_messages);
            if(!$key){
                array_push($check_messages, $all_messages_from[$i]->to);
            }
        }
        for($i=0; $i<count($all_messages_to); $i++){
            $check_1 = $all_messages_to[$i]->from;
            $key = in_array($check_1, $check_messages);
            if(!$key){
                array_push($check_messages, $all_messages_to[$i]->from);
            }
        }
        $data['messages'] = [];
        for($i=0; $i<count($check_messages); $i++){
            // 新規メッセージ数カウント
            $unread_count = \DB::table('messages')->where('from', $check_messages[$i])->where('to', $project)->where('read_flg', 0)->count();
            // $data['message_to']に全データを格納
            $person = \DB::table('users')->where('name', $check_messages[$i])->first();
            array_push($data['messages'], [$person->name => [$person->npo => ['new_messages' => $unread_count]]]);
        }
//        dd($data);
        return view('chat/toproject', $data);
    }

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
