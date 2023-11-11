<?php

namespace App\Policies;

use App\Models\News;
use App\Models\User;

class NewsPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, News $news): bool
    {
        if ($user->id === $news->user_id) {
            return true;
        }

        if ($user->pigeon
            ->newsInChest()
            ->pluck('news.id')
            ->contains($news->id)) {
            return true;
        }
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, News $news): bool
    {
        return true;
    }

    public function delete(User $user, News $news): bool
    {
        return $user->id === $news->user_id;
    }
}
