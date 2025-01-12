<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class MemberEventController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        $events = $user->events;

        return view('member.dashboard', compact('events'));
    }

}
