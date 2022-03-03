<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasUuid;
    use HasFactory;

    /**
     * @var array<int,string>
     */
    protected $fillable = [
        'uuid',
        'name',
        'website',
        'verified',
    ];

    /**
     * @var array<string,string>
     */
    protected $casts = [
        'verified' => 'boolean',
    ];

    // Relationships

    // Helper Methods
}
