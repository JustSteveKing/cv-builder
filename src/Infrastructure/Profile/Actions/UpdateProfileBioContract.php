<?php

declare(strict_types=1);

namespace Infrastructure\Profile\Actions;

use Illuminate\Database\Eloquent\Model;

interface UpdateProfileBioContract
{
    /**
     * @param Model $profile
     * @param string $bio
     * @return void
     */
    public function handle(Model $profile, string $bio): void;
}
