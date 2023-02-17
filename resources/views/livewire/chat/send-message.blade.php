<div>
    {{-- Do your work, then step back. --}}

    @if($selectConversation)
    <form wire:submit.prevent='sendMessage' action="">
    <div class="chatbox_footer">
       
            <div class="custom_form_group">
                <input wire:model='body' type="text"class="control" placeholder="Write massage ">
                  <button type="submit" class="submit">send</button>

            </div>
        
    </div>
  </form>
  @endif

</div>
