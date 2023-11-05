<?php

namespace App\Policies;

use App\Models\Town;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TownPolicy
{
    public function create(User $user): bool
    {
        return !$user->town;
    }

    public function join(User $user, Town $town, string $join_code): bool|Response
    {
        if ($join_code !== $town->join_code) {
            return Response::deny("Code d'invitation incorrect");
        }

        if ($user->town) {
            return $user->town->id === $town->id ? true : Response::deny("Vous êtes déjà dans un village.");
        }

        return $town->users->count() < config('town.max_citizen') ? true : Response::deny('Le village est complet.');
    }

    public function leave(User $user): bool
    {
        return (bool) $user->town;
    }
}
