<div>
    {{-- The best athlete wants his opponent at his best. --}}

    @if($selectConversation)


    <div class="chatbox_header">
        <div class="return">
         <i class="bi bi-arrow-left"></i>
        </div>
        <div class="img_continer">
            <img src="https://ui-avatars.com/api/?name={{$receiverInstance->name}}" alt="no image">
        </div>
        <div class="name">
           {{$receiverInstance->name}}
        </div>
        <div class="info">
         <div class="info_item">
             <i class="bi bi-telephone-fill"></i>
         </div>
         <div class="info_item">
             <i class="bi bi-image-fill"></i>
         </div>
         <div class="info_item">
             <i class="bi bi-info-circle"></i>
         </div>
 
        </div>
 
     </div>
     <div class="chatbox_body">
 
        @foreach ($messages as $message)
        <div wire:key='{{$message->id}}' class="msg_body {{$this->user->id == $message->sender_id? 'msg_body_me':'msg_body_receiver'}}">
            
             {{$message->body}}
             <div class="msg_body_footer">
                <div class="data">
                   {{$message->created_at->format('m: i a')}}

                </div>
                <div class="read">
                    <i class="bi bi-check"></i>

                </div>

             </div>
         </div>
            
        @endforeach
 
 
     </div>

     @else 

       <div class="fs-4 text-center text-primary mt-5">
               no Conversationselected 
       </div>
    @endif

    <script>
        window.addEventListener('rowChatToBottom',event=>
        {
            $('.chatbox_body').scrollTop($('.chatbox_body')[0].scrollHeight);
        });
    </script>

   
</div>
