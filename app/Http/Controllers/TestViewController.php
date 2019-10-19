<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Book;
use Validator;
use Auth;

class TestViewController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        return view('testviews');
    }
    // [管理機能]ログイン管理機能
    public function login_user_manager(Request $request)
    {
        $list = DB::select('select * from users');
        foreach ($list as $user) {
            echo $user->id;
            echo $user->name;
            echo $user->email;
            echo '<BR>';
        }
//        $id=$request->input('id');
//        $user=$request->input('user_id');
        return view('login_user_manager')->with('list', $list);
    }
}
