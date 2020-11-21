<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

     /**
     * Determine whether the user can Update, Delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Comment  $comment
     * @return mixed
     */
    public function checkUserOfComment(User $user, Comment $comment)
    {
        return $user->id == $comment->user_id || $user->id == $comment->book->user->id;
    }

}
