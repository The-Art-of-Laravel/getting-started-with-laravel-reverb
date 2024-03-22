<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function sentBy()
    {
        return $this->belongsTo(User::class, 'sent_by');
    }

    public function messageGroup()
    {
        return $this->belongsTo(MessageGroup::class);
    }
}
