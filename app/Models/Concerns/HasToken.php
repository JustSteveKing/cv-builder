<?php

declare(strict_types=1);

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasToken
{
    /**
     * @return void
     */
    public static function bootHasToken(): void
    {
        static::creating(fn (Model $model) =>
            $model->token = Str::random(20),
        );
    }
}
