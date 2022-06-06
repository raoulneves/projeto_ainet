<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Filme;
use Illuminate\Auth\Access\HandlesAuthorization;

class FilmesPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->admin) {
            return true;
        }
    }

    public function viewAny(User $user)
    {
        return $user->tipo == 'D';
    }

    public function view(User $user, Filme $filme)
    {
        return $user->id == $filme->user_id;
    }

    public function create(User $user)
    {
        return false;
        // It would be: return $user->admin;
        // If before method was not implemented
    }

    public function update(User $user, Filme $filme)
    {
        return $user->id == $filme->user_id;
    }

    public function delete(User $user, Aluno $aluno)
    {
        return false;
        // It would be: return $user->admin;
        // If before method was not implemented
    }
}
