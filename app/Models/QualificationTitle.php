<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\QualificationTitle
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Qualification[] $qualifications
 * @property-read int|null $qualifications_count
 * @method static \Database\Factories\QualificationTitleFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|QualificationTitle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QualificationTitle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|QualificationTitle query()
 * @method static \Illuminate\Database\Eloquent\Builder|QualificationTitle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|QualificationTitle whereName($value)
 * @mixin \Eloquent
 */
class QualificationTitle extends Model
{
    use HasFactory;

    /**
     * @var array<int,string>
     */
    protected $fillable = [
        'name'
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return HasMany<Qualification>
     */
    public function qualifications(): HasMany
    {
        return $this->hasMany(
            related: Qualification::class,
            foreignKey: 'qualification_title_id',
        );
    }
}
