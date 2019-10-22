<?php

namespace App\Http\Controllers\PasswordChange;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Vision;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Storage;

class RequireController extends Controller {

    /**
     * パスワード変更問い合わせ(入力画面)
     *
     * @return \Illuminate\Http\Response
     */
    public function inquiry(Request $request)
    {
        return view('passwordchange/passwordchange_require_inquiry')->with('mailaddress', "");
    }

   /**
     * パスワード変更問い合わせ(検索中)
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $switch = "notfound";
        session(['passwordchange_mailaddress' => '']);
        $query = DB::table('users')->where('email', $request->mailaddress)->count();
        if ($query <> 0) {
            $switch = "find";
            session(['passwordchange_mailaddress' => $request->mailaddress]);
        }
        
        return view('passwordchange/passwordchange_require_search')->with('switch', $switch);
    }

   /**
     * パスワード変更問い合わせ(検索成功：メール送信)
     *
     * @return \Illuminate\Http\Response
     */
    public function searchComplete(Request $request)
    {
        return view('passwordchange/passwordchange_require_searchComplete')->with('mailaddress', session('passwordchange_mailaddress'));
    }

   /**
     * パスワード変更問い合わせ(未登録)
     *
     * @return \Illuminate\Http\Response
     */
    public function notfound(Request $request)
    {
        return view('passwordchange/passwordchange_require_notfound');
    }

}
