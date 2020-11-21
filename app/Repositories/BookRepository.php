<?php

namespace App\Repositories;

use App\Models\User;
use Auth;

class BookRepository extends Repository
{
    public function save_with_auth_user($data)
    {
        return Auth::user()->books()->create($data);
    }

    public function findUserBooks($user)
    {
        $user = User::where('name', $user)
                        ->orWhere('id', $user)
                        ->pluck('id')
                        ->first();

        return $this->model->where('user_id', $user)->get();
    }

    public function getPublicBooks()
    {
        return $this->model->where('status', true)->get();
    }
}
