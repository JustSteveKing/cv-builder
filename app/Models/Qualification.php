<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Qualification
 *
 * @property int $id
 * @property string $uuid
 * @property string $description
 * @property string|null $grade
 * @property bool $current
 * @property int $profile_id
 * @property int $qualification_title_id
 * @property int $institute_id
 * @property \Illuminate\Support\Carbon $started_at
 * @property \Illuminate\Support\Carbon|null $finished_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Institute $institute
 * @property-read \App\Models\Profile $owner
 * @property-read \App\Models\QualificationTitle|null $title
 * @method static \Database\Factories\QualificationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Qualification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Qualification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Qualification query()
 * @method static \Illuminate\Database\Eloquent\Builder|Qualification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qualification whereCurrent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qualification whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qualification whereFinishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qualification whereGrade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qualification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qualification whereInstituteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qualification whereProfileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qualification whereQualificationTitleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qualification whereStartedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qualification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Qualification whereUuid($value)
 * @mixin \Eloquent
 */
class Qualification extends Model
{
    use HasUuid;
    use HasFactory;

    /**
     * @var array<int,string>
     */
    protected $with = [
        'institute',
        'title',
    ];

    /**
     * @var array<int,string>
     */
    protected $fillable = [
        'uuid',
        'description',
        'grade',
        'current',
        'profile_id',
        'qualification_title_id',
        'institute_id',
        'started_at',
        'finished_at',
    ];

    /**
     * @var array<string,string>
     */
    protected $casts = [
        'current' => 'boolean',
        'started_at' => 'date',
        'finished_at' => 'date',
    ];

    /**
     * @return BelongsTo<Profile>
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(
            related: Profile::class,
            foreignKey: 'profile_id',
        );
    }

    /**
     * @return BelongsTo<QualificationTitle>
     */
    public function title(): BelongsTo
    {
        return $this->belongsTo(
            related: QualificationTitle::class,
            foreignKey: 'qualification_title_id',
        );
    }

    /**
     * @return BelongsTo<Institute>
     */
    public function institute(): BelongsTo
    {
        return $this->belongsTo(
            related: Institute::class,
            foreignKey: 'institute_id',
        );
    }
}
