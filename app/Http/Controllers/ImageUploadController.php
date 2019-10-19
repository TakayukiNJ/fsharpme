<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use App\User;
use Validator;
use Illuminate\Support\Facades\Storage;
use Image;

class ImageUploadController extends Controller
{
    const MODE_HOME_REGIST = "HOME_REGIST";
    const MODE_VISION_SELL_REGIST = "VISION_SELL_REGIST";

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        session(['success' => '']);

        // 呼び出し元画面からモードを取得する
        // mode=home_regist 自己紹介登録画面より起動
        session(['mode' => $request->mode]);

        $user = User::find(auth()->id());
        return view('image_uploader', compact('user'));
    }

    /**
     * ファイルアップロード処理
     */
    public function image_upload(Request $request)
    {
        $selfValidate = false;

        $validator = Validator::make($request->all(),
            ['file' => 'required|image|dimensions:min_width=120,min_height=120',]
            // ['file' => 'required|image|dimensions:min_width=120,min_height=120,max_width=400,max_height=400',]
        );
        if ($request->file) {
            if (file_exists($request->file->getRealPath())) {
                $mime = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $request->file->getRealPath());
                switch (strtolower($mime)) {
                    case 'image/png':
                    case 'image/x-png':
                    case 'image/jpg':
                    case 'image/jpeg':
                    case 'image/pjpeg':
                    case 'image/gif':
                        $selfValidate = false;
                        break;
                    default:
                        $selfValidate = true;
                }        
            } else {
                $selfValidate = true;
            }
        }

        if ($validator->fails() || $selfValidate){
            session(['success' => '']);
            $user = User::find(auth()->id());
            return view('image_uploader', compact('user'))->withErrors($validator);
        } else {

            $openPublicFileName = $request->file->getClientOriginalName();

            $openPublicFileName = time()."@".$openPublicFileName;

            $image = Image::make($request->file->getRealPath());

            // 画像リサイズ
            $image->resize(200, NULL, function ($constraint) {
                $constraint->aspectRatio();
            });

            // 公開用のファイルを保存
            $image->save(public_path() . '/images/' . $openPublicFileName);
            $path = '/images/' . $openPublicFileName;

            // 画像をデータベースに格納する
            $id = Auth::user()->id;
            $user = Auth::user()->email;
            
            // 同じ画像は削除する
            $deleteRows = DB::table('image_data')->where('user_id', $user)->where('image_id', $openPublicFileName)->delete();

            // アップロードしたファイルをメモリに読み込む
            // データベース保存用のファイルとしてローカルに保持
            $localFileName = $request->file->store('public/upload');
            $img = Storage::get($localFileName);

            $data_tbl = [
                [   'user_id' => $user,
                    'image_id' => $openPublicFileName,
                    'image_data' => 'null',
                    'delflg' => '0',
                ]
            ];

            // 元々存在している画像に対して、delflgを0->1にする。
            DB::table('image_data')->where('user_id', $user)->update(['delflg' => 1]);

            // データベース登録処理
            $cli = DB::table('image_data')->insert($data_tbl);

            /***** 呼び出し元に応じてアップロードした画像の紐づけを行う *****/
            $cli = DB::table('personal_info')->where('user_id', $user)->update(['image_id' => $openPublicFileName]);
            session(['param_image_id' => $openPublicFileName]);

            // アップロードしたファイルは削除する
            Storage::delete($localFileName);

            session(['success' => '保存しました。']);
            $user = User::find(auth()->id());
            return view('image_uploader', compact('user'))->with('openPublicFileName', $openPublicFileName);
        }
    }
    /**
     * 登録した画像を読み込む
     */
    public function own_image_picture(Request $request) {
        $id = Auth::user()->id;
        $user = Auth::user()->email;

        if ($request->target == 'HOME_REGIST') {
            $personal_info_count = DB::table('personal_info')
            ->where('user_id', $user)
            ->count();
            if ($personal_info_count <> 0) {
                $query = DB::table('image_data')
                ->join('personal_info', 'personal_info.image_id', '=', 'image_data.image_id')
                ->where('personal_info.user_id', $user)->get();

                $image_id = '';
                $image_data = '';
                foreach ($query as $data) {
                    $image_id = $data->image_id;
                    $image_data = $data->image_data;
                }

                // データの登録用に画像のパスを保存
                $ret = "";
                if (!empty($image_id)) {
                    $ret = asset('/images'). '/'. $image_id;
                }
                return response($ret, 200)
                ->header('Content-Type', 'text/plain');
            } else {
                //        file_put_contents('test', $data);
                //        $file = public_path(Storage::get($request->filename));
                //        $finfo = new finfo(FILEINFO_MIME_TYPE);
                //        echo $info->file($file);
                //$mime_type = $file->mime;
                $headers = [
                    'Content-type' => 'image/png',
                ];
                return response(0)
                ->header('Content-Type', 'text/plain');
            }
        } else if ($request->target == 'VISION_SELL_REGIST') {
            if (!empty(session('image_id'))) {
                $ret = asset('/images'). '/'. session('image_id');
            } else {
                $ret = "0";
            }
            return response($ret, 200)
            ->header('Content-Type', 'text/plain');
        }
    }
    
    /**
     * 画像の削除 
     */
    public function image_delete(Request $request) {
        $id = Auth::user()->id;
        $user = Auth::user()->email;

        if ($request->target == 'HOME_REGIST') {
            // HOME 画面
            $personal_info_count = DB::table('personal_info')
            ->where('user_id', $user)
            ->count();
            if ($personal_info_count <> 0) {
                /* image_dataテーブルから削除 */
                $image_id = DB::table('personal_info')->where('user_id', $user)->first();
                $deleteRows = DB::table('image_data')->where('user_id', $user)->where('image_id', $image_id->image_id)->delete();
                
                /* personal_infoテーブルから削除 */
                $cli = DB::table('personal_info')->where('user_id', $user)->update(['image_id' => '']);

            }            
        } else if ($request->target == 'VISION_SELL_REGIST') {
            ;
        }
    }
    
    /**
     * 登録した画像をマイページで読み込む(マイページ)
     *
    public function home_own_timeline(Request $request) {
        $id = Auth::user()->id;
        $user = Auth::user()->email;

        // personal_infoの存在チェック
        $personal_info_count = DB::table('personal_info')
        ->where('user_id', $user)
        ->count();
        logger('personal_info_count['. $personal_info_count . ']');
        logger('openPublicFileName['. $request->openPublicFileName . ']');

        if ($personal_info_count <> 0) {
            $query = DB::table('image_data')
            ->join('personal_info', 'personal_info.image_id', '=', 'image_data.image_id')
            ->where('personal_info.user_id', $user)->get();

            $image_id = '';
            $image_data = '';
            foreach ($query as $data) {
                logger('image_id['. $data->image_id . ']');
                $image_id = $data->image_id;
                logger('image_data['. $data->image_data . ']');
                $image_data = $data->image_data;
            }

            // データの登録用に画像のパスを保存
            session(['image_id' => $image_id]);
            return response(asset('/images'). '/'. $image_id, 200)
            ->header('Content-Type', 'text/plain');
        } else {
            //        file_put_contents('test', $data);
            //        $file = public_path(Storage::get($request->filename));
            //        $finfo = new finfo(FILEINFO_MIME_TYPE);
            //        echo $info->file($file);
            //$mime_type = $file->mime;
            $headers = [
                'Content-type' => 'image/png',
            ];
            return response(0)
            ->header('Content-Type', 'text/plain');
        }
    }*/
    
}
