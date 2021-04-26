<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsersPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
    * Determine whether the user can view the model.
    *
    * @param  \App\Models\User  $user
    * @param  \App\Models\User  $model
    * @return mixed
    */
    public function accessUsers(User $user) {
        return $user->hasAnyRoles(['super-admin', 'admin', 'moderator']);
    }

    /**
    * Determine whether the user can manage the model.
    *
    * @param  \App\Models\User  $user
    * @param  \App\Models\User  $model
    * @return mixed
    */
    public function manageUsers(User $user) {
        return $user->hasAnyRoles(['super-admin', 'admin']);
    }
}
