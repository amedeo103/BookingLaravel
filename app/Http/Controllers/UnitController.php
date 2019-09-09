<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Unit;
use App\Reservation;
use App\Http\Resources\Reservation as ReservationResource;
use App\Http\Resources\Unit as UnitResource;
use Illuminate\Support\Facades\DB;

class UnitController extends Controller
{

    public function index()
    {
        //Gets all
        return UnitResource::collection(Unit::all());
    }

    public function create(Request $request)
    {
        //Makes one

        $unit =new Unit;
        $unit -> name =$request->input('name');
        $unit -> max_persons =$request->input('max_persons');
        $unit -> price_per_night =$request->input('price_per_night');

         if ($unit->save()) {
          return new UnitResource(Unit::all());
         }


    }

    public function show($id)
    {
      //gets one
        $unit = Unit::findOrFail($id);
        return new UnitResource($unit);
    }

    public function edit($id, Request $request)
    {
        //Edits one
          $unit=Unit::findOrFail($id);
          $unit -> name =$request->input('name');
          $unit -> max_persons=$request->input('max_persons');
          $unit -> price_per_night=$request->input('price_per_night');

          if ($unit->save()) {
            return new UnitResource($unit);
          }

    }

    public function destroy($id)
    {
      //First delete all Reservations
      DB::table('reservations')->where('unit_id', $id)->delete();
        //Deletes one unit with all Reservations
        $unit = Unit::findOrFail($id);
          if ($unit->delete()) {
            return new UnitResource(Unit::all());
        }
    }
}
