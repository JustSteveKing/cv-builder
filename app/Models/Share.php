<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Share extends Model
{
    use HasUuid;
    use HasFactory;

    /**
     * @var array<int,string>
     */
    protected $fillable = [
        'uuid',
        'token',
        'email',
        'template',
        'profile_id',
    ];

    public function profile(): BelongsTo
    {
        return $this->belongsTo(
            related: Profile::class,
            foreignKey: 'profile_id',
        );
    }

    // Helper Methods
}
