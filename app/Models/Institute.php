<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Institute
 *
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string|null $website
 * @property bool $verified
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Qualification[] $qualifications
 * @property-read int|null $qualifications_count
 * @method static \Database\Factories\InstituteFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Institute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Institute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Institute query()
 * @method static \Illuminate\Database\Eloquent\Builder|Institute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Institute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Institute whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Institute whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Institute whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Institute whereVerified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Institute whereWebsite($value)
 * @mixin \Eloquent
 */
class Institute extends Model
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

    /**
     * @return HasMany<Qualification>
     */
    public function qualifications(): HasMany
    {
        return $this->hasMany(
            related: Qualification::class,
            foreignKey: 'institute_id',
        );
    }
}
