<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class BookedCustomerListController extends Controller
{
    public function index()
    {
        $booking = Booking::with('room','customer')->latest()->get();
        return Inertia::render('Booked/BookedCustomerList',compact('booking'));
    }

    public function bookedConform($id)
    {
        $bookedConform = Booking::where('id',$id)->update(['status'=> 2]);
        if($bookedConform){
            return redirect()->route('admin.booked.customer.lst');
        }
    }

    public function bookedDeclined($id)
    {
        $bookedDeclined = Booking::where('id',$id)->update(['status'=> 3]);
        if($bookedDeclined){
            return redirect()->route('admin.booked.customer.lst');
        }
    }
}
