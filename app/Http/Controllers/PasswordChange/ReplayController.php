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
use Illuminate\Support\Facades\File;

class ReplayController extends Controller {

    /**
     * 新しいパスワードを設定するリンクを持つメールを送信する
     *
     * @return \Illuminate\Http\Response
     */
    public function forgetPasswordMailSend(Request $request, string $mailAddress)
    {
    		
   		$checkFlg = true;
   		//既にmailアドレスがpublic/change_passwordにあったら処理しない
   		if (self::alreadyCheck($mailAddress)) {
    		//ただしファイルのタイムスタンプが24時間以上経過している場合は
    		//ファイルを作り直してメールを再送できる。
			if (self::past24HourCheck($mailAddress)) {
  				self::deleteCheckFile($mailAddress);
  			} else {
  				$checkFlg = false;
  			}
    	}
    	
   		if($checkFlg) {
	    	try {
	    		//メール送信
		    	$mail = new PHPMailer(true);  
		    	$mail->Debugoutput = function($str, $level) { syslog(LOG_ERR, "PHP Mailer:" . $str); };
//		    	$mail->CharSet = 'ISO-2022-JP';
		    	
		   	    //Server settings
			    $mail->SMTPDebug = 2;
			    $mail->isSMTP();
			    $mail->Host = 'fsharp.sakura.ne.jp';
			    $mail->SMTPAuth = true;
			    $mail->Username = 'replay@fsharp.sakura.ne.jp';
			    $mail->Password = 'b2FYk3rUCtjruHU';
			    $mail->SMTPSecure = 'tls';
			    $mail->Port = 587;
			    
				//Recipients
				$mail->setFrom('replay@fsharp.sakura.ne.jp', 'replay@fsharp.sakura.ne.jp');
				$mail->addAddress($mailAddress);
				$mail->addReplyTo('replay@fsharp.sakura.ne.jp', 'replay@fsharp.sakura.ne.jp');
//$mail->addCC('cc@example.com');
			    //$mail->addBCC('bcc@example.com');
		
			    //Attachments
		    	//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		    	//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		
			    $mail->isHTML(false);
			    $mail->Subject = 'reset password';
			    
			    // チェックファイルを作成する
			    $createdPassword = self::makeRandStr(255);
				self::createCheckFile($mailAddress, $createdPassword);
					
				// メールに記載するURLは当該サーバ(メール送信のサーバ)
				$targetUrl = $request->getHttpHost(). "/passwordchange/replaymail/compare/";
			    
			    $mailBody = "パスワードのリセット希望の方へ \r\n";
			    $mailBody = $mailBody. "\r\n";
			    $mailBody = $mailBody. "平素お世話になっております。\r\n";
			    $mailBody = $mailBody. "こちらはF#サポートセンターです。\r\n";
			    $mailBody = $mailBody. "\r\n";
			    $mailBody = $mailBody. "F#のサービスに貴方が登録したメールアドレスについて\r\n";
			    $mailBody = $mailBody. "パスワードのリセット操作が行われました。\r\n";
			    $mailBody = $mailBody. "もし心当たりの無い方は、大変お手数ですが、このメールを破棄してください。\r\n";
			    $mailBody = $mailBody. "\r\n";
			    $mailBody = $mailBody. "パスワードのリセット操作を実施された場合、引き続きパスワードのリセットを行いますので、\r\n";
			    $mailBody = $mailBody. "以下のリンクをクリックして下さい。\r\n";
			    $mailBody = $mailBody. "https://". $targetUrl. $createdPassword. "?m=". $mailAddress ."\r\n";
			    $mailBody = $mailBody. "\r\n";
			    $mailBody = $mailBody. "リンクをクリック後、パスワードの再設定用の画面が起動しますので、手順に沿って、\r\n";
			    $mailBody = $mailBody. "新しいパスワードの設定を行ってください。\r\n";
			    $mailBody = $mailBody. "\r\n";
			    $mailBody = $mailBody. "F#サポートセンター\r\n";
			    $mailBody = $mailBody. "g181tg2061@dhw.ac.jp \r\n";
			    $mailBody = $mailBody. "050-5435-3202\r\n";
			    $mailBody = $mailBody. "\r\n";
			    $mailBody = $mailBody. "F#では様々な事業を取り組むNPO団体への寄付を募っております。\r\n";
			    $mailBody = $mailBody. "引き続きご愛顧の程、宜しくお願い申し上げます。\r\n";
			    $mailBody = $mailBody. "\r\n";
			    $mailBody = $mailBody. "Welcome to F# Project!!\r\n";
			    $mailBody = $mailBody. "fsharp.sakura.ne.jp\r\n";
			    
			    $mail->Body = $mailBody;
			    $mail->send();
				$article = [[
					'response' => "mail send success.",
				]];
			} catch (Exception $e) {
			    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
				$article = [[
					'response' => "mail send error.",
				]];
			}
    	} else {
			$article = [[
				'response' => "already sended password change mail.",
			]];
    	}
        return view('passwordchange/passwordchange_replaymail_send');
    }
    
    /**
	 * ランダム文字列生成 (英数字)
	 * $length: 生成する文字数
	 */
	private function makeRandStr($length) {
	    $str = array_merge(range('a', 'z'), range('0', '9'), range('A', 'Z'));
	    $r_str = null;
	    for ($i = 0; $i < $length; $i++) {
	        $r_str .= $str[rand(0, count($str) - 1)];
	    }
	    return $r_str;
	}

	/**
	 * 既にパスワード再設定メールが送信されているかどうかを判定する。 
	 */
	private function alreadyCheck($mailAddress) {
		$files = storage::allFiles(public_path() . '/change_password/');
		foreach ($files as $file) {
			$filename = basename($file);
			if ($filename == $mailAddress) {
				return true;
			}
		}
		return false;
	}
	
	/**
	 * ファイルのタイムスタンプが丸１日を過ぎているか判定する。
	 */
	private function past24HourCheck($mailAddress) {
		$filePath = public_path() . '/change_password/'. $mailAddress;
		$timestamp = storage::lastModified($filePath);
		$limittime = time() - 24 * 60 * 60;
		if ($timestamp < $limittime) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * チェックファイルの削除
	 */
	private function deleteCheckFile($mailAddress) {
		$filePath = public_path() . '/change_password/'. $mailAddress;
		storage::delete($filePath);
	}
	
	/**
	 * チェックファイルの作成
	 */
	private function createCheckFile($mailAddress, $pattern) {
		$filePath = public_path() . '/change_password/'. $mailAddress;
		storage::put($filePath, $pattern);
	}
	
    /**
     * リンクの正当性を検証する
     *
     * @return \Illuminate\Http\Response
     */
    public function comparePassword(Request $request, string $password)
    {
        if ($request->input('m')) {
	        session(['change_password_email' => '']);
			$switch = 'no';
			$filePath = public_path() . '/change_password/'. $request->input('m');
			if(storage::exists($filePath)) {
				$data = storage::get($filePath);
				if(($password == $data) && !self::past24HourCheck($request->input('m'))) {
					$switch = 'yes';
		            session(['change_password_email' => $request->input('m')]);
		            self::deleteCheckFile($request->input('m'));
				}
			}
	        return view('passwordchange/passwordchange_replaymail_compare')->with('switch', $switch);
        }
    }
}
