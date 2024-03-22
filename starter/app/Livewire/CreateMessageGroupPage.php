<?php

namespace App\Livewire;

use App\Events\SendMessage;
use App\Models\Message;
use App\Models\MessageGroup;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class CreateMessageGroupPage extends Component
{
    public $searchUsers = [];

    public $search = "";

    public  $users = [];

    public $message = "";

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.create-message-group-page');
    }

    public function updatedSearch($search)
    {
        $addedUserIds = collect($this->users)->map(function($user){
            return $user->id;
        });
        $this->searchUsers = User::where('name', 'LIKE', "%$search%")
            ->whereNot('id', auth()->user()->id)
            ->whereNotIn('id', $addedUserIds)->get();
    }

    public function addUser(User $user)
    {
        $this->users[] = $user;
        $this->search = "";
    }

    public function send()
    {
        if((!count($this->users) && !$this->messageGroup->exists)|| empty($this->message)){
            return;
        }

        $messageGroup = new MessageGroup;
        $messageGroup->message_count = 1;
        $messageGroup->save();

        $userToAdd = collect($this->users)->map(fn($user) => $user->id);
        $userToAdd->push(auth()->user()->id);

        $messageGroup->users()->attach($userToAdd);

        $newMessage = new Message;
        $newMessage->content = $this->message;
        $newMessage->save();
        $newMessage->sentBy()->associate(auth()->user());
        $messageGroup->messages()->save($newMessage);

        $this->redirect(route('message.group', ['messageGroup' => $messageGroup]));
    }
}
