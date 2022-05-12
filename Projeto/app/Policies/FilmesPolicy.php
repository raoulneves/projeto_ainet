<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FilmesPolicy
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

    public function before($user, $ability)
    {
        if ($user->admin) {
            return true;
        }
    }

    public function viewAny(User $user){
        return(($user->id==$model->id) || ($user_tipo=='A' && $model->tipo='c'));
    }
}
