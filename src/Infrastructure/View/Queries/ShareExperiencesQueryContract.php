<?php

declare(strict_types=1);

namespace Infrastructure\View\Queries;

use Illuminate\Database\Eloquent\Collection;

interface ShareExperiencesQueryContract
{
    /**
     * @param int $profile
     * @return Collection
     */
    public function handle(int $profile): Collection;
}
