<?php

namespace App\Policies;

use App\Models\ { User, Address };
use Illuminate\Auth\Access\HandlesAuthorization;

class AddressPolicy
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
     * Create a new policy instance.
     *
     * @return boolean
     */
    public function manage(User $user, Address $address) {
        return $user->id === $address->user_id;
    }

}
