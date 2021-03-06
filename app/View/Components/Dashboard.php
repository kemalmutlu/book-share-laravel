<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Auth;
use App\Repositories\BookRepository;
use App\Models\Book;

class Dashboard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    protected $model;

    public function __construct(Book $book)
    {
        $this->model = new BookRepository($book);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.dashboard');
    }

    public function books()
    {
        return $this->model->findUserBooks(auth()->user()->name);
    }
}
