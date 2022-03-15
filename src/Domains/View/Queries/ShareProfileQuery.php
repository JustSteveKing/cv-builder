<?php

declare(strict_types=1);

namespace Domains\View\Queries;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;
use Infrastructure\View\Queries\ShareProfileQueryContract;

class ShareProfileQuery implements ShareProfileQueryContract
{
    /**
     * @param int $profile
     * @return Model
     */
    public function handle(int $profile): Model
    {
        return Profile::query()->find(
            id: $profile,
        );
    }
}
