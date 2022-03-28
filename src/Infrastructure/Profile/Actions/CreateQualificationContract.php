<?php

declare(strict_types=1);

namespace Infrastructure\Profile\Actions;

use JustSteveKing\LaravelToolkit\Contracts\DataObjectContract;

interface CreateQualificationContract
{
    /**
     * @param DataObjectContract $object
     * @return void
     */
    public function handle(DataObjectContract $object): void;
}
