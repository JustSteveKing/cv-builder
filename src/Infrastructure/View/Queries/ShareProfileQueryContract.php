<?php

declare(strict_types=1);

namespace Infrastructure\View\Queries;

use Illuminate\Database\Eloquent\Model;

interface ShareProfileQueryContract
{
    /**
     * @param int $profile
     * @return Model
     */
    public function handle(int $profile): Model;
}
