<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;
use App\Models\Conversation;
use Illuminate\Support\Facades\Session;
use App\Models\User;


class Chatlist extends Component
{

  
    public $auth = array();
    public $conversations;
    public $receiverInstance;
    public $selectConversation;
    public $name;
    public $user;
    

    protected $listeners =['chatUserSelect', 'refresh'=>'$refresh'];


    public function chatUserSelect(Conversation $conversation ,$receiverId)
    {
        //dd($conversation ,$receiverId);
        $this->selectConversation = $conversation;
        $receiverInstance = User::find($receiverId);
        
        $this->emitTo('chat.chatbox','loadConversation', $this->selectConversation, $receiverInstance);
        $this->emitTo('chat.send-message', 'updateSendMessage',$this->selectConversation,$receiverInstance);
    }

    public function getChatUserInstance(Conversation $conversation ,$request)
    {
        $auth = array();
        if(Session::has('loginId'))
        {
               $auth = User::where('id','=',Session::get('loginId'))->first();
        }
        $this->user = $auth;

        if($conversation->sender_id == $auth->id)
        {
            $this->receiverInstance  = User::firstwhere('id',$conversation->receiver_id);
        }else 
        {
            $this->receiverInstance  = User::firstwhere('id',$conversation->sender_id);
        }

        if(isset($request))
        {
            return $this->receiverInstance->$request;
        }
    }


    public function mount()
    {  
        if(Session::has('loginId'))
        {
               $auth = User::where('id','=',Session::get('loginId'))->first();
       
        }
        
        $this->conversations = Conversation::where('sender_id',$auth->id)->orwhere('receiver_id',$auth->id)->orderBy('last_time_massage','DESC')->get();

    }
    public function render()
    {
        return view('livewire.chat.chatlist');
    }
}
