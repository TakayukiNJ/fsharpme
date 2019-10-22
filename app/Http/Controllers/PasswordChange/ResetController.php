<?php

namespace App\Http\Controllers\PasswordChange;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Vision;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ResetController extends Controller {

    /**
     * パスワードリセット(登録画面)
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        return view('passwordchange/passwordchange_reset_register')->with('newpassword', '')->with('newpassword_confirmation', '');
    }

   /**
     * パスワードリセット(確認画面)
     *
     * @return \Illuminate\Http\Response
     */
    public function confirm(Request $request)
    {
        session(['newpassword' => '']);
        $validator = Validator::make($request->all(),[
            'newpassword' => 'required|min:8|confirmed',
        ]);
        if ($validator->fails()){
            return view('passwordchange/passwordchange_reset_register')->with('newpassword', '')->with('newpassword_confirmation', '')->withErrors($validator);
        } else {
            session(['newpassword' => $request->input('newpassword')]);
            return view('passwordchange/passwordchange_reset_confirm');
        }
    }

   /**
     * パスワードリセット(処理中)
     *
     * @return \Illuminate\Http\Response
     */
    public function process(Request $request)
    {
        $cli = DB::table('users')->where('email', session('change_password_email'))->update(['password' => bcrypt(session('newpassword')), 'updated_at' => date('Y-m-d H:i:s')]);
        return view('passwordchange/passwordchange_reset_process');
    }

   /**
     * パスワードリセット(完了)
     *
     * @return \Illuminate\Http\Response
     */
    public function complete(Request $request)
    {
        return view('passwordchange/passwordchange_reset_complete');
    }

}
