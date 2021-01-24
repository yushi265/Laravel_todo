<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Comment;

class CommentController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function store(Request $request, Task $task) {
        $this->validate($request,[
            'comment' => 'required|min:3|max:50'
        ]);
        $comment = new Comment();
        $comment->body = $request->comment;
        $task->comments()->save($comment);

        return redirect()->back();
    }

    public function destroy(Task $task, Comment $comment) {
        $comment->delete();

        return redirect()->back();
    }
}
