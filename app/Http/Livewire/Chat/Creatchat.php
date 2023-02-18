<?php

namespace App\Http\Livewire\Chat;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Conversation;
use App\Models\Message ;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Creatchat extends Component
{
    public $users;
    public $message = "hello how are you ?";


    public function checkconversation($receiverId)
    {
        
        $auth = array();
        if(Session::has('loginId'))
        {
           $auth = User::where('id','=',Session::get('loginId'))->first();
           
        }
        $checkedConversation = Conversation::where('receiver_id',$auth->id)->where('sender_id',$receiverId)->orwhere('receiver_id',$receiverId)->where('sender_id',$auth->id)->get();

        if(count($checkedConversation)== 0)
        {
             $createdConversation = Conversation::create(['receiver_id' => $receiverId, 'sender_id' => $auth->id ,'last_time_massage' =>"2024-01-01 00:00:00"]);
             //Conversation has created 
             $createdMassage = Message::create(['conversation_id'=> $createdConversation->id ,'sender_id'=> $auth->id,'receiver_id'=> $receiverId,'body'=> $this->message]);
             $createdConversation->last_time_massage = $createdMassage->created_at;
             $createdConversation->save();
             dd($createdMassage);
       
       }
        else if(count($checkedConversation)>=0)
        {
            dd('conversation exists');
        }

    }
    public function render()
    {
        $this->users =  DB::table('users')->get();
        return view('livewire.chat.creatchat');
    }
}
