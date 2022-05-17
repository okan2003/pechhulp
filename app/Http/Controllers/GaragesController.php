<?php

namespace App\Http\Controllers;

use App\Models\Garage;
use App\Models\Area;
use App\Models\User;
use Illuminate\Http\Request;


class GaragesController extends Controller
{
    public function showGarages()
    {

        $garages = Garage::join('areas', 'areas.id', '=', 'garages.area_id')
        ->get(['garages.garage_naam', 'areas.plaats', 'garages.user_id', 'garages.status', 'garages.id']);

        return view('garages', [
            'garages' => $garages,
        ]);
    }

    public function create()
    {
        return view ('garage.create');
    }

    public function store(Request $request )
    {

        $garage = new Garage;
        $garage->user_id = $request->input('user_id');
        $garage->area_id = $request->input('area_id');
        $garage->garage_naam = $request->input('garage_naam');
        $garage->save();

        return redirect('garages')->with('status', 'Garage succesvol toegevoegd');
    }

    public function viewGarages(){
        $users = User::all();
        $areas = Area::all();

        return view('garage.create', [
            'users' => $users,
            'areas' => $areas,
        ]);
    }

    public function changeStatus(Request $request)
    {

        $garage = Garage::find($request->id);
        $garage->status = $request->status;
        $garage->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

}
