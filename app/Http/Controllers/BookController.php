<?php

namespace App\Http\Controllers;

use App\Repositories\BookRepository;
use App\Models\Book;
use App\Models\Comment;
use App\Repositories\CommentRepository;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $model;

    public function __construct(Book $book, Comment $comment)
    {
        // set the model
       $this->model = new BookRepository($book);
       // set the another model
       $this->comment_model = new CommentRepository($comment);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->model->save_with_auth_user($request->only($this->model->getModel()->fillable));
        return redirect()->route('dashboard')->with('message', 'The book has been successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = $this->model->show($id);
        $comments = $this->comment_model->findBookComments($id);

        return view('pages.book.show', compact('book', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('authorizedUser', $this->model->show($id));
        $book = $this->model->show($id);
        return view('pages.book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('authorizedUser', $this->model->show($id));
        $this->model->update($request->only($this->model->getModel()->fillable), $id);

        return redirect()->route('dashboard')->with('message', 'The book has been successfully updated.');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('authorizedUser', $this->model->show($id));
        $this->model->delete($id);

        return redirect()->route('dashboard')->with('message', 'The book has been successfully deleted.');
    }
}
