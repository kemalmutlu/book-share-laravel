<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\CommentRepository;
use App\Models\Comment;
use Auth;


class CommentController extends Controller
{
    public function __construct(Comment $comment)
    {
        $this->model = new CommentRepository($comment);
    }

    public function store($book_id, Request $request)
    {
        $this->model->createComment($book_id,
                    $request->merge(['user_id' => Auth::user()->id])
                    ->only($this->model->getModel()->fillable));

        return redirect()->route('books.show', $book_id)
                        ->with('message', 'Your comments successfull added');
    }
}
