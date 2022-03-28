<?php

declare(strict_types=1);

namespace Domains\Profile\Providers;

use Domains\Profile\Actions\CreateProfileShare;
use Domains\Profile\Actions\CreateQualification;
use Domains\Profile\Actions\UpdateProfileBio;
use Domains\Profile\Queries\ProfileQuailfications;
use Domains\Profile\Queries\UserProfileQuery;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Profile\Actions\CreateProfileShareContract;
use Infrastructure\Profile\Actions\CreateQualificationContract;
use Infrastructure\Profile\Actions\UpdateProfileBioContract;
use Infrastructure\Profile\Queries\UserProfileQueryContract;
use Infrastructure\Profile\Queries\ProfileQuailficationsContract;

class ProfileServiceProvider extends ServiceProvider
{
    /**
     * @var array<class-string,class-string>
     */
    public array $bindings = [
        UserProfileQueryContract::class => UserProfileQuery::class,
        UpdateProfileBioContract::class => UpdateProfileBio::class,
        CreateProfileShareContract::class => CreateProfileShare::class,
        ProfileQuailficationsContract::class => ProfileQuailfications::class,
        CreateQualificationContract::class => CreateQualification::class,
    ];
}
