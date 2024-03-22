<?php

use Illuminate\Support\Facades\Broadcast;
use App\Models\User;

Broadcast::channel('message-group.{messageGroupId}', function (User $user, int $messageGroupId) {
    return $user->messageGroups->contains('id', $messageGroupId);
});
