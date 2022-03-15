<?php

declare(strict_types=1);

namespace Domains\View\Providers;

use Domains\View\Queries\ShareExperiencesQuery;
use Domains\View\Queries\ShareProfileQuery;
use Domains\View\Queries\ShareUserQuery;
use Illuminate\Support\ServiceProvider;
use Infrastructure\View\Queries\ShareExperiencesQueryContract;
use Infrastructure\View\Queries\ShareProfileQueryContract;
use Infrastructure\View\Queries\ShareUserQueryContract;

class ViewServiceProvider extends ServiceProvider
{
    /***
     * @var array<class-string,class-string>
     */
    public array $bindings = [
        ShareProfileQueryContract::class => ShareProfileQuery::class,
        ShareUserQueryContract::class => ShareUserQuery::class,
        ShareExperiencesQueryContract::class => ShareExperiencesQuery::class,
    ];
}
