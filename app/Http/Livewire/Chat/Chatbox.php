<?php

namespace App\Http\Livewire\Chat;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Chatbox extends Component
{
    protected $listeners= ['loadConversation','pushMessage'];
    public $selectConversation;
    public $receiverInstance;
    public $paginateVar=10;
    public $messages;
    public $user;

    public function pushMessage($messageId)
    {
         $newMessage = Message::find($messageId);
         $this->messages->push($newMessage);
         $this->dispatchBrowserEvent('rowChatToBottom');
    }
    public function loadConversation(Conversation $convarsation, User $receiver)
    {
       
        $this->selectConversation= $convarsation;
        $this->receiverInstance= $receiver;

        $this->messages_count= Message::where('conversation_id', $this->selectConversation->id)->count();
        $this->messages= Message::where('conversation_id', $this->selectConversation->id)
        ->skip($this->messages_count - $this->paginateVar)
        ->take($this->paginateVar)->get();

        $this->dispatchBrowserEvent('chatSelected');
        
        $auth = User::where('id','=',Session::get('loginId'))->first();

        $this->user= $auth ;
      

        

        # code...
    }
    public function render()
    {
        return view('livewire.chat.chatbox');
    }
}
