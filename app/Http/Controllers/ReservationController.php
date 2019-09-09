<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Reservation;
use App\Unit;
use App\Http\Resources\Unit as UnitResource;
use App\Http\Resources\Reservation as ReservationResource;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function index()
    {
        return ReservationResource::collection(Reservation::all());
    }

    public function create(Request $request)
    {
        // //Provjera preklapanja rezervacije sa ranije unesenom rezervacijom


        //Provjera unosa ID-a ako postoji
        $unit_id= $request->input('unit_id');
        $dateF =Carbon::parse($request->input('date_from'));
        $dateT =Carbon::parse($request->input('date_to'));
        $unit = Unit::find($unit_id);
        $price_night = DB::table('units')->where('id', $unit_id)->value('price_per_night');
        if ($unit!=null) {
          if ($dateT>$dateF) {
            $days = $dateF->diffInDays($dateT);
            $price = $days * $price_night;
            $reservation = new Reservation;
            $reservation -> unit_id =$request->input('unit_id');
            $reservation -> date_from =$request->input('date_from');
            $reservation -> date_to =$request->input('date_to');
            $reservation -> total_price=$price;
            $reservation -> first_name =$request->input('first_name');
            $reservation -> last_name =$request->input('last_name');
            $reservation -> email =$request->input('email');


            //Provjera preklapanja
            $allReservations[] = Reservation::where('unit_id', '=', $unit_id)->get();
            foreach ($allReservations as $res) {
              if (Carbon::parse($res->date_from)>$dateT||Carbon::parse($res->date_from)<$dateF&&
              Carbon::parse($res->date_to)>$dateT||Carbon::parse($res->date_to)<$dateF) {

              }
              else{
                return view('error');

              }
            }
          }
          else {
            return view('error');

          }
        }
        else {
          return view('error');
        }

        if ($reservation->save()) {
          return new ReservationResource(Reservation::all());
        }
    }

    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);
        return new ReservationResource($reservation);
    }

    public function destroy($id)
    {
        $reservation=Reservation::findOrFail($id);
        if ($reservation->delete()) {
          return new ReservationResource(Reservation::all());
        }

    }

    public function blockedDates(Request $request)
    {
      $unit_id= $request->input('unit_id');
      return  ReservationResource::collection(Reservation::where('unit_id', '=', $unit_id)->get());
    }



}
