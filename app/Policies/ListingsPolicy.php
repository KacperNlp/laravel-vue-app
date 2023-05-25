<?php

namespace App\Policies;

use App\Models\Listings;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ListingsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(?User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Listings  $listings
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(?User $user, Listings $listings)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Listings  $listings
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Listings $listings)
    {
        return $this->isAbleToDoSomething($user, $listings);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Listings  $listings
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Listings $listings)
    {
        return $this->isAbleToDoSomething($user, $listings);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Listings  $listings
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Listings $listings)
    {
        return $user->id === $listings->by_user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Listings  $listings
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Listings $listings)
    {
        return $user->id === $listings->by_user_id;
    }

    private function isAbleToDoSomething(User $user, Listings $listings): bool
    {
        $isAuthor = $user->id === $listings->by_user_id;
        $canDoSomething = $user->is_admin || $isAuthor;

        return $canDoSomething;
    }
}
