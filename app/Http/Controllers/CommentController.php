<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comment = Comment::latest()->paginate(5);
        return view('comment.index', compact('comment'))
            ->with('i', (request()->input('page',1) - 1) * 5);
    }

    public function create()
    {
        return view('comment.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' =>'required',
        ]);

        Comment::create($request->all());

        return redirect()->route('comment.index')
            ->with('success','Article submitted successfully.');
    }

    public function show(Comment $comment)
    {
        return view('comment.show',compact('comment'));
    }

    public function edit(Comment $comment)
    {
        return view('comment.edit',compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        $request->validate([

        ]);

        $comment->update($request-> all());

        return redirect()->route('comment.index')
            ->with('success','Comment updated successfully');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('comment.index')
            ->with('success','Comment deleted successfully');
    }
}