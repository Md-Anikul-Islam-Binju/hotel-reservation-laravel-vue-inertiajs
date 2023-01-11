<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Amenities;
use App\Models\admin\Room;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class RoomController extends Controller
{
    //Room Create Table and Data Table Show
    public function index()
    {
        $amenities = Amenities::latest()->get();;
        $rooms = Room::latest()->get();
        return Inertia::render('Room/RoomAddShow',compact('amenities','rooms'));
    }

    //Room Store
    public function store(Request $request)
    {
        $array = [];
        foreach ($request->amenities_id as $amenity)
        {
            $array[] = $amenity['name'];
        }
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'mimes:jpeg,bmp,png'
        ]);
        try{
            DB::beginTransaction();
            if ($request->hasFile('image'))
            {
                $imageName = time().'.'.$request->image->extension();
                $request->image->storeAs('public/hotel-image', $imageName);
                $room = Room::create([
                    'amenities_id' => implode(',',$array),
                    'name' => $request->name,
                    'details' => $request->details,
                    'size' => $request->size,
                    'maximum_occupancy' => $request->maximum_occupancy,
                    'price' => $request->price,
                    'status' => $request->status,
                    'image' => $imageName,
                ]);
            }
            if(!empty($room)){
                DB::commit();
                return redirect()->route('admin.room');
            }
            throw new \Exception('Failed!');
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.room');
        }
    }

    //Room Edit
    public function edit($id)
    {
        $amenities = Amenities::all();
        $room = Room::where('id',$id)->first();
        return Inertia::render('Room/RoomUpdate',compact('room','amenities'));
    }

    //Room Update
    public function update(Request $request,$id)
    {
        try {
            $room = Room::find($id);
            if (empty($room)) {
                throw new \Exception('Failed!');
            }
            $imageName = time().'.'.$request->image->extension();
            $request->image->storeAs('public/hotel-image', $imageName);
            $update_room = $room->update([
                'amenities_id' => $request->amenities_id,
                'name' => $request->name,
                'details' => $request->details,
                'size' => $request->size,
                'maximum_occupancy' => $request->maximum_occupancy,
                'price' => $request->price,
                'image' => $imageName,
            ]);

            if (!empty($update_room)) {
                DB::commit();
                return redirect()->route('admin.room');
            } else {
                throw new \Exception('Failed!');
            }
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('admin.room');
        }
    }

    //Room Delete
    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        Storage::delete('public/hotel-image/' . $room->image);
        $room->delete();
        return redirect()->route('admin.room');
    }
}
