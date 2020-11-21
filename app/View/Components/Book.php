<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Repositories\BookRepository;
use App\Models\Book as BookDB;

class Book extends Component
{
    protected $model;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(BookDB $book)
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
        return view('components.book');
    }

    public function books()
    {
        return $this->model->getPublicBooks();
    }
}
