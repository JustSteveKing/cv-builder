<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Concerns\HasToken;
use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Share
 *
 * @property int $id
 * @property string $uuid
 * @property string $token
 * @property string $email
 * @property string|null $template
 * @property int $profile_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Profile $profile
 * @method static \Database\Factories\ShareFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Share newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Share newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Share query()
 * @method static \Illuminate\Database\Eloquent\Builder|Share whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Share whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Share whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Share whereProfileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Share whereTemplate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Share whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Share whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Share whereUuid($value)
 * @mixin \Eloquent
 */
class Share extends Model
{
    use HasToken;
    use HasFactory;

    /**
     * @var array<int,string>
     */
    protected $fillable = [
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
