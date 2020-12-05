<?php

namespace App\Policies;

use App\User;
use App\UserRight;
use Illuminate\Auth\Access\HandlesAuthorization;

class CollectionPolicy
{
    const MODEL_NAME = 'collection';

    use HandlesAuthorization;

    public function __construct() {}

    private function checkRight(User $user, String $right) {
        return UserRight::where('user_id', $user->id)
            ->where('right', $right)
            ->where('model', self::MODEL_NAME)
            ->exists();
    }

    public function update(User $user) {
        return $this->checkRight($user, 'admin');
    }
}
