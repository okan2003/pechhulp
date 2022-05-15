<?php

namespace App\Http\Controllers;

use App\Models\Melding;
use App\Models\Aantal;
use App\Models\Garage;
use App\Models\Review;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view('roles.admin');
    }

    public function showMeldingen(){

        $aantal = Aantal::where('status_id', 3)->count();

        $total = Aantal::count();

        $garages = Garage::with('area')->get();

         $garages = Garage::join('areas', 'areas.id', '=', 'garages.area_id')
         ->get(['garages.garage_naam', 'areas.plaats', 'garages.user_id', 'garages.id']);

        $percent = $this->showProcent();


        return view('roles.admin', ['aantal' => $aantal, 'garages' => $garages, 'total' => $total, 'percent' => $percent]);
    }

    public function showProcent(){
        $tellen = Aantal::whereIn('status_id', [1,2])->count();

        $total = Aantal::count();
        $percent = $tellen / $total * 100;
        return $percent;

    }

}
