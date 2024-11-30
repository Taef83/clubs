<?php

namespace App\Http\Controllers\Control;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDO;

class EventController extends Controller
{
    // Display a listing of the resource.
    public function index(Request $request)
    {
        $items = Event::query();
        if($request->c){
            $items->where('club_id', $request->c);
        }
        $items = $items->paginate(30);
        return view('control.events.index', compact('items'));
    }

    public function show(Event $event)
    {
        $item = $event;
        return view('control.events.show', compact('item'));
    }

    // Remove the specified resource from storage.
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('control.events.index')->with('success', 'You have delete item from database successfully.');
    }
}
