<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Amenities;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class AmenitiesController extends Controller
{
    //Amenities Crete Table And Data Table Show
    public function index()
    {
        $amenities = Amenities::latest()->get();
        return Inertia::render('Amenities/AmenitiesAddShow',compact('amenities'));
    }

    //Amenities Store
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:20',
        ]);
        try{
            DB::beginTransaction();
            $amenities = Amenities::create([
                'name' => $request->name,
                'details' => $request->details,
                'status' => $request->status,
            ]);
            if(!empty($amenities)){
                DB::commit();
                return redirect()->route('admin.amenities');

            }
            throw new \Exception('Failed!');
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->route('admin.amenities');
        }
    }

}
