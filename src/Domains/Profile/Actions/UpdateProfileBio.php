<?php

declare(strict_types=1);

namespace Domains\Profile\Actions;

use Illuminate\Database\Eloquent\Model;
use Infrastructure\Profile\Actions\UpdateProfileBioContract;

class UpdateProfileBio implements UpdateProfileBioContract
{
    /**
     * @param Model $profile
     * @param string $bio
     * @return void
     */
    public function handle(Model $profile, string $bio): void
    {
        $profile->update(
            attributes: ['bio' => $bio],
        );
    }
}
