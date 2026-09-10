<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Faker\Core\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    public function index(){
        $messages = Message::with('user')->get();
        return view('messages.index', ['messages' => $messages]);
    }
    public function create_message(Request $request){
        $data = $request->validate(['content'=>'required','image'=>'mimes:png,jpg']);
        $message = new Message();
        $message->content = $data['content'];
        if ($request->image){
            $image_name = time() . '.' . $request->image->guessExtension();
            $message->image = $image_name;
            $request->image->move(public_path('images'), $image_name);
        }
        $message->user_id = Auth::user()->id;
        $message->save();
        return redirect(route('messages_index'));
    }
    public function show_user_messages(int $id){
        $user = User::find($id);
        $messages = Message::where('user', Auth::user());
        return view('messages.show_messages', ['messages'=>$messages,'user'=>$user]);
    }
}
