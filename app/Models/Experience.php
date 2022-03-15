<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Experience
 *
 * @property int $id
 * @property string $uuid
 * @property string $description
 * @property bool $current
 * @property int $profile_id
 * @property int $job_title_id
 * @property int $company_id
 * @property \Illuminate\Support\Carbon $started_at
 * @property \Illuminate\Support\Carbon|null $finished_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Company $company
 * @property-read \App\Models\JobTitle $jobTitle
 * @property-read \App\Models\Profile $owner
 * @method static \Database\Factories\ExperienceFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Experience newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Experience query()
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereCurrent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereFinishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereJobTitleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereProfileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereStartedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereUuid($value)
 * @mixin \Eloquent
 */
class Experience extends Model
{
    use HasUuid;
    use HasFactory;

    /**
     * @var array<int,string>
     */
    protected $fillable = [
        'uuid',
        'description',
        'current',
        'profile_id',
        'job_title_id',
        'company_id',
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

    public function owner(): BelongsTo
    {
        return $this->belongsTo(
            related: Profile::class,
            foreignKey: 'profile_id',
        );
    }

    public function jobTitle(): BelongsTo
    {
        return $this->belongsTo(
            related: JobTitle::class,
            foreignKey: 'job_title_id',
        );
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(
            related: Company::class,
            foreignKey: 'company_id',
        );
    }

    // Helper Methods
}
