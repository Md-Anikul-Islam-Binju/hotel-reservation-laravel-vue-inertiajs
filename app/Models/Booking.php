<?php

namespace App\Models;

use App\Models\admin\Room;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'room_id',
        'customer_id',
        'phone',
        'check_in',
        'check_out',
        'status'
    ];

    public function room()
    {
        return $this->belongsTo(Room::class,'room_id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class,'customer_id');
    }
}

