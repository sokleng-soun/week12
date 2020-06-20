<?php

namespace App\Policies;

use App\Category;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function createCategory(User $user)
    {
        return $user->role === 'admin';
    }
    /**
     * Determine whether the user can store models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function storeCategory(User $user)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can edit the model.
     *
     * @param  \App\User  $user
     * @param  \App\Category  $category
     * @return mixed
     */
    public function editCategory(User $user, Category $category)
    {
        return $user->role === 'admin';
    }
    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Category  $category
     * @return mixed
     */
    public function updateCategory(User $user, Category $category)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Category  $category
     * @return mixed
     */
    public function deleteCategory(User $user, Category $category)
    {
        return $user->role === 'admin';
    }

}
