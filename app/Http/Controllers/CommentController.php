<?php

namespace App\Http\Controllers;



use App\Repositories\CommentRepository;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;


class CommentController extends Controller
{
    protected $model;

    public function __construct(Comment $comment)
    {
        $this->model = new CommentRepository($comment);
    }

    public function store($book_id, CommentRequest $request)
    {
        $this->model->createComment($book_id,
                    $request->merge(['user_id' => auth()->user()->id])
                    ->only($this->model->getModel()->fillable));

        return redirect()->route('books.show', $book_id)
                        ->with('message', 'Your comments successfull added');
    }

    public function edit($comment_id)
    {
        $this->authorize('authUser', $this->model->show($comment_id));
        $comment = $this->model->show($comment_id);
        return view('pages.comments.edit', compact('comment'));
    }

    public function destroy($comment_id)
    {
        $this->authorize('authUser', $this->model->show($comment_id));
        $this->model->delete($comment_id);

        return redirect()->route('dashboard')->with('message', 'Comment successfull deleted');
    }

    public function update($comment_id)
    {
        $this->authorize('update', $this->model->show($comment_id));
        $this->model->update(array('status' => 1), $comment_id);

        return redirect()->route('dashboard')->with('message', 'Comment status successfull update');;
    }
}
