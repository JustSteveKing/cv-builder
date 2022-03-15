<?php

declare(strict_types=1);

namespace Infrastructure\Profile\Queries;

use Illuminate\Database\Eloquent\Model;

interface UserProfileQueryContract
{
    /**
     * @param int $user
     * @return Model
     */
    public function handle(int $user): Model;
}
