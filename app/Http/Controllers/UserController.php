<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\Repository;

class UserController extends Controller
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = new Repository($user);
    }
    public function list()
    {
        $users = $this->model->all();
        return view('pages.users.index', compact('users'));
    }

    public function show($id)
    {
        $user = $this->model->show($id);
        $books = $user->books()->where('status', 1)->get();
        return view('pages.users.show', compact('user','books'));
    }
}
