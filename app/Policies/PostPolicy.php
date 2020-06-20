<?php

namespace App\Policies;

use App\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can edit the model.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function editPost(User $user, Post $post)
    {
        return $user->role === 'admin' || $user->id === $post->creator_id;
    }
    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function updatePost(User $user, Post $post)
    {
        return $user->role === 'admin' || $user->id === $post->creator_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function deletePost (User $user, Post $post)
    {
        return $user->role === 'admin' || $user->id === $post->creator_id;
    }

}
