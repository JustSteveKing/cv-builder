<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualificationTitle extends Model
{
    use HasFactory;

    /**
     * @var array<int,string>
     */
    protected $fillable = [
        'title'
    ];

    /**
     * @var bool
     */
    public $timestamps = false;
}
