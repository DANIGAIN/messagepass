<?php

namespace App\Http\Livewire\Chat;
use App\Models\Conversation;
use App\Models\User;
use App\Models\Message;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class SendMessage extends Component
{
    public $selectConversation;
    public $receiverInstance;
    public $body;
    protected $listeners=['updateSendMessage'];

    public function updateSendMessage(Conversation $conversation, User $receiver)
    {

        $this->selectConversation= $conversation;
        $this->receiverInstance= $receiver;
        //dd($this->selectConversation, $this->receiverInstance);
        # code...
    }



    public function sendMessage()
    {
        if(Session::has('loginId'))
        {
               $auth = User::where('id','=',Session::get('loginId'))->first();
        }


        if($this->body == null){
            return null;
        }

        $createdMessage= Message::create([
            'conversations_id'=>$this->selectConversation->id,
            'sender_id'=>$auth->id,
            'receiver_id'=>$this->receiverInstance->id,
            'body'=>$this->body,
        ]);

        $this->selectConversation->last_time_massage= $createdMessage->created_at;
        $this->selectConversation->save();


       
        $this->emitTo('chat.chatbox','pushMessage',$createdMessage->id);


        //reshorsh conversation list
        $this->emitTo('chat.chatlist','refresh');
        $this->reset('body');
        
        //dd($this->body);
        # code...
    }
    public function render()
    {
        return view('livewire.chat.send-message');
    }
}
