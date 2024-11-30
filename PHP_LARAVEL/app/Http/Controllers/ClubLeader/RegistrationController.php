<?php

namespace App\Http\Controllers\ClubLeader;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDO;

class RegistrationController extends Controller
{
    // Display a listing of the resource.
    public function index(Request $request)
    {
        abort_if(!$request->c, 404);
        $event = Event::whereHas('club', function($q){
            return $q->where('club_id', auth('leaders')->user()->club_id);
        })->where('event_id', $request->c)->firstOrFail();
        $items = $event->registrations()->paginate(70);
        return view('club_leader.registrations.index', compact('items', 'event'));
    }
}
