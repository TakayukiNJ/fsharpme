<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function posts() {
        $posts = Post::latest()->get();
        // dd($posts->toArray());
        return view('posts')->with('posts', $posts);
    }
    public function index()
    {
        return view('chat/chat');
    }
    // いいね処理
    public function good(Request $request)
    {
        $id=$request->input('id');
        $user=$request->input('user_id');
        return view('/posts/good')->with('id', $id)->with('user', $user);
    }
    // シェア処理
    public function share(Request $request)
    {
        $id=$request->input('id');
        $user=$request->input('user_id');
        return view('/posts/share')->with('id', $id)->with('user', $user);
    }
    // タグ処理(非同期？)
    public function tag(Request $request)
    {
        $id=$request->input('id');
        $user=$request->input('user_id');
        return view('/posts/tag')->with('id', $id)->with('user', $user);
    }
    // フォロー処理
    public function follow(Request $request)
    {
        $id=$request->input('id');
        $user=$request->input('user_id');
        return view('/posts/follow')->with('id', $id)->with('user', $user);
    }

}
