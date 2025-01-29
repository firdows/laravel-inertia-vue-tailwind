<?php

namespace App\Policies;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class ListingPolicy
{

    use HandlesAuthorization;

    public function before(?User $user, $ability)
    {
        if (!$user?->is_admin /*&& $ability == 'edit'*/) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, Listing $listing): bool
    {
        // if ($user->email != 'admin@admin') {
        //     return true;
        // }
        return true;
        if ($listing->by_user_id === $user?->id) {
            return true;
        }
        return $listing->sold_at === null;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Listing $listing): bool
    {
        // return false;
        return $listing->sold_at === null && ($user->id === $listing->by_user_id);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Listing $listing): bool
    {
        // dd($listing);
        return true;
        return $user->id !== $listing->by_user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Listing $listing): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Listing $listing): bool
    {
        return false;
    }
}
