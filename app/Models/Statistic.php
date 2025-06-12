<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'students_count',
        'teachers_count',
        'staff_count',
        'alumni_count',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'students_count' => 'integer',
            'teachers_count' => 'integer',
            'staff_count' => 'integer',
            'alumni_count' => 'integer',
        ];
    }
}
