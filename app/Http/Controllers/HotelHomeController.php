<?php

namespace App\Http\Controllers;
use App\Models\admin\Room;
use App\Models\Booking;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class HotelHomeController extends Controller
{
    public function index()
    {
        $rooms = Room::latest()->get();
        return Inertia::render('Welcome',compact('rooms'));
    }

    public function singleHotel($id)
   {
       $room = Room::where('id',$id)->first();
       return Inertia::render('HotelSingleShow',compact('room'));
   }

   public function dashboard()
   {
       $booking = Booking::where('customer_id', Auth::id())->with('room')->latest()->get();
       return Inertia::render('Dashboard',compact('booking'));
   }

   public function storeBooking(Request $request)
   {
       $customer_id = Auth::user()->id;
       try{
           DB::beginTransaction();
           $booking = Booking::create([
               'customer_id' =>$customer_id,
               'room_id'=> $request->room_id,
               'phone' => $request->phone,
               'check_in' => $request->check_in,
               'check_out' => $request->check_out,
               'status' => 1,
           ]);
           if(!empty($booking)){
               DB::commit();
               return redirect()->route('dashboard');
           }
           throw new \Exception('Failed!');
       }catch(Exception $ex){
           DB::rollBack();
           return redirect()->route('dashboard');
       }
   }
}
