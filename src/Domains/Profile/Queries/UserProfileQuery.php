<?php

declare(strict_types=1);

namespace Domains\Profile\Queries;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Infrastructure\Profile\Queries\UserProfileQueryContract;

class UserProfileQuery implements UserProfileQueryContract
{
    public function handle(int $user): Model
    {
        return Cache::remember(
            "user-profile-{$user}",
            3600,
            fn () =>
                Profile::query()->where(
                'user_id', $user
                )->first());
    }
}
