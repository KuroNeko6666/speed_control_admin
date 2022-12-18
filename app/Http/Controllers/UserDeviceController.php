<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserDeviceRequest;
use App\Http\Requests\UpdateUserDeviceRequest;
use App\Models\UserDevice;

class UserDeviceController extends Controller
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
     * @param  \App\Http\Requests\StoreUserDeviceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserDeviceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserDevice  $userDevice
     * @return \Illuminate\Http\Response
     */
    public function show(UserDevice $userDevice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserDevice  $userDevice
     * @return \Illuminate\Http\Response
     */
    public function edit(UserDevice $userDevice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserDeviceRequest  $request
     * @param  \App\Models\UserDevice  $userDevice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserDeviceRequest $request, UserDevice $userDevice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserDevice  $userDevice
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDevice $userDevice)
    {
        //
    }
}
