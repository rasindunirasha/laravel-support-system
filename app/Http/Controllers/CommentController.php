<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

 public function store(Request $request)
 {
     $this->validate($request, [
         'content' => 'required',
         'ticket_id' => 'required|exists:tickets,id',
     ]);

     $data = $request->only(['content', 'ticket_id']);
     $data['user_id'] = auth()->check() ? auth()->id() : null;
     $comment = Comment::create($data);

     if ($comment) {
         return redirect(route('tickets.show', $comment->ticket_id))
             ->with('success', 'Your reply added successfully.');
     }

     return redirect()->back()
         ->with('error', 'Opps! we could not save your reply. Please try again.');
 }
}
