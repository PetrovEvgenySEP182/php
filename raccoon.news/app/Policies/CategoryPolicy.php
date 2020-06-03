<?php

namespace App\Policies;

use App\Category;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->admin;
    }

    public function view(User $user, Category $category)
    {
        return $user->admin;
    }

    public function create(User $user)
    {
        return $user->admin;
    }

    public function update(User $user, Category $category)
    {
        return $user->admin;
    }

    public function delete(User $user, Category $category)
    {
        return $user->admin;
    }

    public function restore(User $user, Category $category)
    {
        return $user->admin;
    }

}
