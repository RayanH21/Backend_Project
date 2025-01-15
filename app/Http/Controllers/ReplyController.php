<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\Discussion;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function store(Request $request, Discussion $discussion)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        Reply::create([
            'discussion_id' => $discussion->id,
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return redirect()->route('discussions.show', $discussion->id)->with('success', 'Reply added successfully!');
    }
}
