<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Amenities;
use App\Models\admin\Room;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HotelAdminController extends Controller
{
    public function adminDashboard()
    {
        $totalAmenities = Amenities::latest()->get()->count();
        $rooms = Room::latest()->get()->count();
        return Inertia::render('AdminDashboard',compact('totalAmenities','rooms'));
    }

}
