<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function form()
    {
        return view('contact.form');
    }
    
    // 送信処理
    public function send(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required'
        ];
        $this->validate($request, $rules);
     
        $to = [
            ['email' => 'nj.takayuki@gmail.com', 'name' => 'DHGS Nakajo']
        ];
     
        $data = $request->only('name', 'email', 'message');
        // dd(Contact($data));
        Mail::to($to)->send(new Contact($data));
        // Mail::raw('Test Mail', function($message) { $message->to('nj.takayuki@gmail.com')->subject('testnull');
        return redirect()->route('contact.result');
    }
    
    public function result()
    {
        return view('contact.result');
    }
}
