<?php

declare(strict_types=1);

namespace Infrastructure\Profile\Queries;

use Illuminate\Database\Eloquent\Collection;

interface ProfileQuailficationsContract
{
    /**
     * @param int $profile
     * @return Collection
     */
    public function handle(int $profile): Collection;
}
