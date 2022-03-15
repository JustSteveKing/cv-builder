<?php

declare(strict_types=1);

namespace Infrastructure\Profile\Actions;

use Illuminate\Database\Eloquent\Model;

interface CreateProfileShareContract
{
    /**
     * @param int $profile
     * @param string $email
     * @param string $template
     * @return Model
     */
    public function handle(
        int $profile,
        string $email,
        string $template,
    ): Model;
}
