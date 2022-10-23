<?php

namespace App\Traits;

use App\Helpers\UserHelper;

trait UserHelperTrait
{

    public function getUserId(): int|string|null
    {
        return (auth()->guest()) ? UserHelper::ROLE_GUEST :  auth()->id();
    }
}
