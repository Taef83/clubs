<?php

namespace App\Http\Controllers\Control;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDO;

class FeedbackController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $items = Feedback::paginate(30);
        return view('control.feedbacks.index', compact('items'));
    }

    public function show(Feedback $feedback)
    {
        $item = $feedback;
        return view('control.feedbacks.show', compact('item'));
    }

    // Remove the specified resource from storage.
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return redirect()->route('control.feedbacks.index')->with('success', 'You have delete item from database successfully.');
    }
}
