<?php

namespace App\Policies;

use App\User;
use App\Orderdetail;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderdateilPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any orderdetails.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermission('orderdetails_viewAny');
        //
    }

    /**
     * Determine whether the user can view the orderdetail.
     *
     * @param  \App\User  $user
     * @param  \App\Orderdetail  $orderdetail
     * @return mixed
     */
    public function view(User $user, Orderdetail $orderdetail)
    {
        return $user->hasPermission('orderdetails_view');
        //
    }

    /**
     * Determine whether the user can create orderdetails.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('orderdetails_create');
        //
    }

    /**
     * Determine whether the user can update the orderdetail.
     *
     * @param  \App\User  $user
     * @param  \App\Orderdetail  $orderdetail
     * @return mixed
     */
    public function update(User $user, Orderdetail $orderdetail)
    {
        return $user->hasPermission('orderdetails_update');
        //
    }

    /**
     * Determine whether the user can delete the orderdetail.
     *
     * @param  \App\User  $user
     * @param  \App\Orderdetail  $orderdetail
     * @return mixed
     */
    public function delete(User $user, Orderdetail $orderdetail)
    {
        return $user->hasPermission('orderdetails_delete');
        //
    }

    /**
     * Determine whether the user can restore the orderdetail.
     *
     * @param  \App\User  $user
     * @param  \App\Orderdetail  $orderdetail
     * @return mixed
     */
    public function restore(User $user, Orderdetail $orderdetail)
    {
        return $user->hasPermission('orderdetails_restore');
        //
    }

    /**
     * Determine whether the user can permanently delete the orderdetail.
     *
     * @param  \App\User  $user
     * @param  \App\Orderdetail  $orderdetail
     * @return mixed
     */
    public function forceDelete(User $user, Orderdetail $orderdetail)
    {
        return $user->hasPermission('orderdetails_forceDelete');
        //
    }
}
