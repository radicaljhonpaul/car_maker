<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarColor;
use App\Models\CarType;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CarController extends Controller
{
    public function index()
    {
        return Car::with('manufacturer')->with('color')->with('car_type')->where('created_by', Auth::id())->get();

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        ob_start('ob_gzhandler');
        DB::beginTransaction();
            try {
                $carManufacturer = new Manufacturer();
                $carManufacturer->name = $request->manufacturer;
                $carManufacturer->save();
        
                $carType = new CarType();
                $carType->name = $request->type;
                $carType->save();
        
                $carColor = new CarColor();
                $carColor->name = $request->color;
                $carColor->save();
        
                $car = new Car();
                $car->name = $request->name;
                $car->type_fk = $carType->id;
                $car->manufacturer_fk =  $carManufacturer->id;
                $car->color_fk = $carColor->id;
                $car->created_by = Auth::id();
                $car->save();

                DB::commit();
                // If all is good
                return 1;
            } catch (\Exception $e) {
                DB::rollback();
                return response(['message' => $e->getMessage()], 401);
            }
            ob_end_flush();
    }

    public function show(Car $car)
    {
        //
    }

    public function edit(Car $car)
    {
        //
    }

    public function update(Request $request)
    {
        //
    }
    public function destroy(Request $request)
    {
ob_start('ob_gzhandler');
        DB::beginTransaction();
            try {

                $car = Car::where('created_by', Auth::id())->where('id', $request->car_id)->get();

                Manufacturer::where('id', $car[0]->manufacturer_fk)->delete();
                CarType::where('id', $car[0]->type_fk)->delete();
                CarColor::where('id', $car[0]->color_fk)->delete();
                Car::where('id', $car[0]->id)->delete();
                
                DB::commit();
                // If all is good
                return 1;
            } catch (\Exception $e) {
                DB::rollback();
                return response(['message' => $e->getMessage()], 401);
            }
            ob_end_flush();
    }
}
