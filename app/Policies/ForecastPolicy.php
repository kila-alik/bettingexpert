<?php

namespace Bett\Policies;

use Bett\User;
use Illuminate\Auth\Access\HandlesAuthorization;

use Illuminate\Support\Facades\Auth;

class ForecastPolicy
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

    // public function list_menu(User $user) {
    //     // return $user->id == $post->user_id;
    //     // dd($user);
    //     if(Auth::check() && Auth::user()->is_admin == '1') {
    //     return TRUE;
    //     }
    // return FALSE;
    // }

    // public function update(User $user, ForecastModel $forecast) {
    //     if($user->is_admin == true) {
    //         return TRUE;
    //       }
    //     return FALSE;
    // }
}
