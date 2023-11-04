<?php

namespace App\Policies;

use App\Models\Town;
use App\Models\User;

class TownPolicy
{
    public function create(User $user): bool
    {
        return !$user->town;
    }

    public function join(User $user, Town $town): bool
    {
        return !$user->town && $town->users->count() < config('town.max_citizen');
    }

    public function leave(User $user): bool
    {
        return (bool) $user->town;
    }
}
