<?php

declare(strict_types=1);

namespace Domains\Profile\Queries;

use App\Models\Qualification;
use Illuminate\Database\Eloquent\Collection;
use Infrastructure\Profile\Queries\ProfileQuailficationsContract;

class ProfileQuailfications implements ProfileQuailficationsContract
{
    /**
     * @param int $profile
     * @return Collection
     */
    public function handle(int $profile): Collection
    {
        return Qualification::query()
            ->with([
                'title',
                'institute',
            ])->where(
                'profile_id',
                $profile
            )->get();
    }
}
