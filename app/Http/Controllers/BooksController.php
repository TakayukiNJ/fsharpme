<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
//use App\Book;
//use Validator;

class BooksController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except' => ['index', 'welcome', 'this_company']]);
        //$this->middleware('guest', ['except' => 'index']);
    }
    //
    public function index(Request $request){
        //$books = Book::orderBy('created_at', 'asc')->paginate(3);
        //$books = Book::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);
        //$this->middleware('guest', ['except' => 'logout']);
        return view('index');
    }

    public function this_company(Request $request){
        if(Auth::user()){
            $user_auth = Auth::user()->email;
            $data['personal_info'] = \DB::table('personal_info')->where('user_id', $user_auth)->first();
        }
        $data['products'] = \DB::table('npo_registers')->where('proval', 1)->orderBy('published', 'desc')->get();
        return view('this_company', $data);
    }

    public function welcome(Request $request){
        if(Auth::user()){
            $user_auth = Auth::user()->email;
            $data['personal_info'] = \DB::table('personal_info')->where('user_id', $user_auth)->first();
        }    
        //$books = Book::orderBy('created_at', 'asc')->paginate(3);
        //$books = Book::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);
        // $data['npo_info1'] = \DB::table('npo_registers')->where('npo_name', 'toyama_bootcamp')->first();
        // $data['npo_info2'] = \DB::table('npo_registers')->where('npo_name', 'biosbootcamp')->first();
        // $data['npo_info3'] = \DB::table('npo_registers')->where('npo_name', 'clean_man')->first();
        // $data['npo1'] = \DB::table('users')->where('name', $data['npo_info1']->manager)->first()->npo;
        // $data['npo2'] = \DB::table('users')->where('name', $data['npo_info2']->manager)->first()->npo;
        // $data['npo3'] = \DB::table('users')->where('name', $data['npo_info3']->manager)->first()->npo;
        //$this->middleware('guest', ['except' => 'logout']);
        $data['products'] = \DB::table('npo_registers')->where('proval', 1)->orderBy('published', 'desc')->get(); 
        return view('welcome', $data);
        
    }
    
    //新作追加
    public function store(Request $request){
        //バリデーション
        $validator = Validator::make($request->all(), [
                'item_name' => 'required|min:1|max:255',
                'item_number' => 'required | min:1 | max:3',
                'item_amount' => 'required | max:6',
                'published'   => 'required',
        ]);
        //バリデーション:エラー
        if ($validator->fails()) {
                return redirect('/')->withInput()->withErrors($validator);
        }
        
        // Eloquent モデル
        //$books = Book::find($request->id);
        $books = new Book;
        $books->user_id = Auth::user()->id;
        $books->item_name = $request->item_name;
        $books->item_number = $request->item_number;
        $books->item_amount = $request->item_amount;
        $books->published = $request->published;
        $books->save();   //「/」ルートにリダイレクト 
        return redirect('/');
    }
    
    //更新
    public function update(Request $request){
        //{books}id 値を取得 => Book $books id 値の1レコード取得
        //バリデーション
        $validator = Validator::make($request->all(), [
                'id' => 'required',
                'item_name' => 'required|min:3|max:255',
                'item_number' => 'required | min:1 | max:3',
                'item_amount' => 'required | max:6',
                'published'   => 'required',
        ]);
        //バリデーション:エラー
        if ($validator->fails()) {
                return redirect('/')->withInput()->withErrors($validator);
        }
        
        // 更新処理
        $books = Book::where('user_id',Auth::user()->id)->find($request->id);
        $books->item_name = $request->item_name;
        $books->item_number = $request->item_number;
        $books->item_amount = $request->item_amount;
        $books->published = $request->published;
        $books->save();   //「/」ルートにリダイレクト 
        return redirect('/');
    }
    
    //編集画面
    public function edit($book_id){
        //{books}id 値を取得 => Book $books id 値の1レコード取得
        $books = Book::where('user_id',Auth::user()->id)->find($book_id);
        return view('booksedit', ['book' => $books]);
    }
}