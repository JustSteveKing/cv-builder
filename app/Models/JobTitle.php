<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\JobTitle
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Experience[] $experiences
 * @property-read int|null $experiences_count
 * @method static \Database\Factories\JobTitleFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|JobTitle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobTitle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobTitle query()
 * @method static \Illuminate\Database\Eloquent\Builder|JobTitle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobTitle whereName($value)
 * @mixin \Eloquent
 */
class JobTitle extends Model
{
    use HasFactory;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array<int,string>
     */
    protected $fillable = [
        'name',
    ];

    public function experiences(): HasMany
    {
        return $this->hasMany(
            related: Experience::class,
            foreignKey: 'job_title_id',
        );
    }

    // Helper Methods
}
