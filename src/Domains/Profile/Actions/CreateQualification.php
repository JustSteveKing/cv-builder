<?php

declare(strict_types=1);

namespace Domains\Profile\Actions;

use App\Models\Qualification;
use Infrastructure\Profile\Actions\CreateQualificationContract;
use JustSteveKing\LaravelToolkit\Contracts\DataObjectContract;

class CreateQualification implements CreateQualificationContract
{
    /**
     * @param DataObjectContract $object
     * @return void
     */
    public function handle(DataObjectContract $object): void
    {
        Qualification::query()->create(
            attributes: $object->toArray(),
        );
    }
}
