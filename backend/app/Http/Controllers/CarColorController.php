<?php

namespace App\Http\Controllers;

use App\Models\CarColor;
use App\Http\Requests\StoreCarColorRequest;
use App\Http\Requests\UpdateCarColorRequest;

class CarColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCarColorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarColorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CarColor  $carColor
     * @return \Illuminate\Http\Response
     */
    public function show(CarColor $carColor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CarColor  $carColor
     * @return \Illuminate\Http\Response
     */
    public function edit(CarColor $carColor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCarColorRequest  $request
     * @param  \App\Models\CarColor  $carColor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarColorRequest $request, CarColor $carColor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CarColor  $carColor
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarColor $carColor)
    {
        //
    }
}
