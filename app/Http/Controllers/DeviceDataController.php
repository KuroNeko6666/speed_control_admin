<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeviceDataRequest;
use App\Http\Requests\UpdateDeviceDataRequest;
use App\Models\DeviceData;

class DeviceDataController extends Controller
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
     * @param  \App\Http\Requests\StoreDeviceDataRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeviceDataRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DeviceData  $deviceData
     * @return \Illuminate\Http\Response
     */
    public function show(DeviceData $deviceData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DeviceData  $deviceData
     * @return \Illuminate\Http\Response
     */
    public function edit(DeviceData $deviceData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDeviceDataRequest  $request
     * @param  \App\Models\DeviceData  $deviceData
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeviceDataRequest $request, DeviceData $deviceData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeviceData  $deviceData
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeviceData $deviceData)
    {
        //
    }
}
