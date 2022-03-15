<?php

declare(strict_types=1);

namespace Domains\Profile\Actions;

use App\Models\Share;
use Illuminate\Database\Eloquent\Model;
use Infrastructure\Profile\Actions\CreateProfileShareContract;

class CreateProfileShare implements CreateProfileShareContract
{
    public function handle(
        int $profile,
        string $email,
        string $template,
    ): Model {
        return Share::query()->create(
            attributes: [
                'email' => $email,
                'template' => $template,
                'profile_id' => $profile,
            ],
        );
    }
}
