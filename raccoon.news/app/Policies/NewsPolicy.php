<?php

namespace App\Policies;

use App\News;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NewsPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->admin;
    }

    public function view(User $user, News $news)
    {
        return $user->admin;
    }

    public function create(User $user)
    {
        return $user->admin;
    }

    public function update(User $user, News $news)
    {
        if($news->created_at->diffInHours( now() ) >= 24 )
            return false;

        return $user->admin;
    }

    public function delete(User $user, News $news)
    {
        if($news->created_at->diffInHours( now() ) >= 24 )
            return false;

        return $user->admin;
    }

    public function restore(User $user, News $news)
    {
        return $user->admin;
    }

    public function forceDelete(User $user, News $news)
    {
        return $user->admin;
    }
}
