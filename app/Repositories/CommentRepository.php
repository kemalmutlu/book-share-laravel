<?php

namespace App\Repositories;

use App\Models\Book;

class CommentRepository extends Repository
{
    public function createComment($book_id, array $data)
    {
        $book = Book::find($book_id);
        return $book->comments()->create($data);
    }

    public function findBookComments($book_id)
    {
      return $this->model->where('book_id', $book_id)->get();
    }
}
