<?php

namespace App\Livewire;

use App\Events\SendMessage;
use App\Models\Message;
use App\Models\MessageGroup;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

class MessageGroupPage extends Component
{

    public $messageGroup = null;

    public $message = "";

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.message-group-page');
    }

    public function mount(MessageGroup $messageGroup )
    {
        $this->messageGroup = $messageGroup;
    }

    public function send()
    {
        if( empty($this->message)){
            return;
        }

        $newMessage = new Message;
        $newMessage->content = $this->message;
        $newMessage->save();
        $newMessage->sentBy()->associate(auth()->user());
        $this->messageGroup->messages()->save($newMessage);

        $this->message = "";
    }
}
