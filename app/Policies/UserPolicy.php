<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function viewAny(User $user)
    {
        if($user->isAdmin()) {
            return true;
        }

        return false;
    }

    public function view(User $user)
    {
        if($user->isAdmin()) {
            return true;
        }

        return false;
    }

    public function create(User $user)
    {
        if($user->isAdmin()) {
            return true;
        }

        return false;
    }

    public function update(User $user)
    {
        if($user->isAdmin()) {
            return true;
        }

        return false;
    }

    public function delete(User $user, User $model)
    {
        if($user->isAdmin()) {
            return true;
        }

        return false;
    }

}
