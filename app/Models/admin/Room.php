<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use SoftDeletes, HasFactory;
    protected $fillable = [
        'name',
        'details',
        'image',
        'size',
        'maximum_occupancy',
        'price',
        'amenities_id',
        'status',
    ];
}
