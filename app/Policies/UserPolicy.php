<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{

    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
       return $user->hasPermissionTo('User View');
    }

    /**
     * Determine whether the user hasPermissionTo view the model.
     */
    public function view(User $user, User $model): bool
    {
       return $user->hasPermissionTo('User View');
    }

    /**
     * Determine whether the user hasPermissionTo create models.
     */
    public function create(User $user): bool
    {
       return $user->hasPermissionTo('User Create');
    }

    /**
     * Determine whether the user hasPermissionTo update the model.
     */
    public function update(User $user, User $model): bool
    {
       return $user->hasPermissionTo('User Update');
    }

    /**
     * Determine whether the user hasPermissionTo delete the model.
     */
    public function delete(User $user, User $model): bool
    {
       return $user->hasPermissionTo('User Delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
       return $user->can('User delete');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
       return $user->can('User delete');
    }
}
