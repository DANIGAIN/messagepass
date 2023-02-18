<div>
    <div class="chatlist_header">
         <div class="title">
            {{$user->name}}
        </div>


        <div class="img_container">
            <img src="https://ui-avatars.com/api/?name={{$user->name}}" alt="no image">
        </div>
    </div>


    <div class="chatlist_body">
        @if(count($conversations)> 0)
            @foreach($conversations as $conversation )

            <div wire:key='{{$conversation->id}}' class="chatlist_item" wire:click="$emit('chatUserSelect',{{$conversation}},{{$this->getChatUserInstance($conversation, $name='id')}})">
                <div class="chatlist_img">
                    <img src="https://ui-avatars.com/api/?name={{$this->getChatUserInstance($conversation, $name='name')}}" alt="no image ">
                </div>
                <div class="chatlist_info">
                    <div class="top_row">
                        <div class="list_username">{{$this->getChatUserInstance($conversation, $name='name')}}</div>
                        <span class="date">{{$conversation->messages->last()?->created_at->shortAbsoluteDiffForHumans()}}</span>
                    </div>
                    <div class="bottom_row">
                        <div class="massage_body text-truncate">
                            {{($conversation->messages->last()->body)}}
                        </div>
                        <div class="unread_count">
                            56

                        </div>
                    </div>
                </div>

            </div>

            @endforeach
        @else
         
         you have no conversations 

        @endif
     </div>
</div>
