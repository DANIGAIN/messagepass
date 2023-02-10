<div>
    <div class="chatlist_header">
         <div class="title">
            chat
        </div>


        <div class="img_container">
            <img src="https://picsum.photos/205/300?grayscale" alt="no image">
        </div>
    </div>


    <div class="chatlist_body">
        @if(count($conversations)> 0)
            @foreach($conversations as $conversation )

            <div class="chatlist_item">
                <div class="chatlist_img">
                    <img src="https://picsum.photos/200/300?grayscale" alt="no image ">
                </div>
                <div class="chatlist_info">
                    <div class="top_row">
                        <div class="list_username">{{$this->getChatUserInstance($conversation, $name='name')}}</div>
                        <span class="date">2d</span>
                    </div>
                    <div class="bottom_row">
                        <div class="massage_body text-truncate">
                               rgfstrezrez utdtyrtrzerezrz ytdtxtrf
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
