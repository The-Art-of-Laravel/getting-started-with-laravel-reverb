<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageGroupController extends Controller
{
    public function index()
    {
        $messageGroups = Auth::user()->messageGroups;
        return view('message-groups', compact('messageGroups'));
    }
}
