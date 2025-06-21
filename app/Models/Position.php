<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'ordering',
    ];

    public function staff()
    {
        return $this->belongsToMany(Staff::class);
    }
}
