<?php

declare(strict_types=1);

namespace Domains\Profile\Factories;

use Domains\Profile\DataObjects\Qualification;
use Illuminate\Support\Carbon;
use JustSteveKing\LaravelToolkit\Contracts\DataObjectContract;
use JustSteveKing\LaravelToolkit\Contracts\FactoryContract;

class QualificationFactory implements FactoryContract
{
    /**
     * @param array $attributes
     * @return DataObjectContract
     */
    public static function make(array $attributes): DataObjectContract
    {
        return new Qualification(
            profile: intval(data_get($attributes, 'profile')),
            title: intval(data_get($attributes, 'title')),
            institute: intval(data_get($attributes, 'institute')),
            started: Carbon::parse(data_get($attributes, 'started')),
            current: boolval(data_get($attributes, 'current')),
            finished: Carbon::parse(data_get($attributes, 'finished')),
            grade: strval(data_get($attributes, 'grade')),
            description: strval(data_get($attributes, 'description')),
        );
    }
}
