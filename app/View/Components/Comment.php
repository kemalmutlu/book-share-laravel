<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Comment as CommentDB;
use App\Repositories\CommentRepository;

class Comment extends Component
{
    protected $model;
    public $user;

    /**
     * Create a new component instance.
     *
     * @return void
     *
     */

    public function __construct(CommentDB $comment, $user)
    {
        $this->model = new CommentRepository($comment);
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.comment');
    }

    public function comments()
    {
        return $this->model->getBooksComments();
    }

    public function commentsOfAuthUser()
    {
        return $this->model->getUserComments();
    }
}
