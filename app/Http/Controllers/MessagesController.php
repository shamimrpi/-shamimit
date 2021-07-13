<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\Auth;
use App\User;

class MessagesController extends Controller
{
    public function index()
    {
    	$this->data['sms'] = Message::select('*')->where('sent_to_id',Auth::id())->latest()->get();
    	return view('sms.index',$this->data);
    }
    public function create()
    {
    	$this->data['users'] = User::all();
    	return view('sms.create',$this->data);
    }

    public function store(Request $request)
    {
    	 Auth::user()->sent()->create([
            'body'       => $request->body,
            'subject'    => $request->subject,
            'sent_to_id'  => $request->sent_to_id,
            'sender_id'  => Auth::id()
        ]); 

    	 return back()->with('message','message sent successfuly');

    }
  public function main()
  {
  	$sms = Message::select('*')
            ->where('sent_to_id',Auth::id())->latest()->get();

  	return view('main.main',$this->data);
  }
  public function reply($id)
  {
    $this->data['s'] = Message::find($id);
     return view('sms.reply',$this->data);
  }
  public function reply_store(Request $request,$id)
  {
     Auth::user()->sent()->create([
            'body'       => $request->body,
            'subject'    => $request->subject,
            'sent_to_id'  => $request->sent_to_id,
            'sender_id'  => Auth::id()
        ]); 

         return back()->with('message','message sent successfuly');
  }

  public function sent_sms()
  {
      $this->data['sms'] = Message::select('*')
    ->where('sender_id',Auth::id())
    ->latest()->get();
    return view('sms.sent',$this->data);
  }

  public function destroy($id)
  {
       $data = request()->all();
       $message = Message::find($id);
       $message->receive()->delete();

       return back()->with('message','message delete successfuly');
  }

  public function show($id)
  {
    $this->data['sms'] =  Message::find($id);
    
    return view('sms.show',$this->data);
  }
}
