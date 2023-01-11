<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Amenities extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'details',
        'status',
    ];
}
