<?php

declare(strict_types=1);

namespace Domains\View\Queries;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Infrastructure\View\Queries\ShareUserQueryContract;

class ShareUserQuery implements ShareUserQueryContract
{
    /**
     * @param int $profile
     * @return Model
     */
    public function handle(int $profile): Model
    {
        return User::query()->whereHas(
            relation: 'profile',
            callback: fn (Builder $builder) =>
                $builder->where('id', $profile),
            )->first();
    }
}
