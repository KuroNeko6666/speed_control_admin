<?php

namespace App\Http\Livewire\Home\DeviceManagement;

use App\Models\User;
use App\Models\Device;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use App\Mail\SpeedControlEmail;
use App\Models\EmailVerification;
use Illuminate\Support\Facades\Mail;

class DeviceData extends Component
{
    use WithPagination;
    public $search;
    public $speed, $distance, $device_id;
    public $current, $current_name, $current_id;
    public $devices, $users;
    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->devices = Device::all();
    }
    public function show(\App\Models\DeviceData $device_data)
    {
        $this->current = $device_data;
        $this->current_id = $device_data->device_id;
        $this->current_name = $device_data->device()->first()->name;
        $this->speed = $device_data->speed;
        $this->distance = $device_data->distance;
        $this->dispatchBrowserEvent('contentChanged');
    }

    public function store()
    {
        $data = $this->validate([
            "device_id" => 'required|max:255',
            "speed" => 'required|max:255',
            "distance" => 'required|max:255',
        ]);

        try {
            $user = \App\Models\DeviceData::create($data);
            $this->resetData();
            $this->closeCreateModal();
            return session()->flash('success', 'Your data has been created!');
        }
        catch (Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            $this->resetData();
            $this->closeCreateModal();
            return session()->flash('error', 'Query error ' + $errorCode);
        }

    }


    public function update()
    {
        $data = $this->validate([
            "device_id" => 'required|max:255',
            "speed" => 'required|max:255',
            "distance" => 'required|max:255',
        ]);

        $res = $this->current->update($data);
        $this->resetData();
        $this->closeUpdateModal();

        if($res != null){
            return session()->flash('success', 'Your data has been updated!');
        }
        return session()->flash('success', 'Your data has been created!');
    }

    public function delete()
    {
        $this->current->delete();
        $this->resetData();
        return session()->flash('success', 'Your data has been deleted!');

    }

    public function resetData()
    {
        $this->current = null;
        $this->current_name = null;
        $this->current_id = null;
        $this->speed = '';
        $this->distance = '';
        $this->device_id = '';
    }

    public function closeCreateModal()
    {
        $this->dispatchBrowserEvent('closeCreateModal');
    }

    public function closeUpdateModal()
    {
        $this->dispatchBrowserEvent('closeUpdateModal');
    }

    public function render()
    {
        $datas = \App\Models\DeviceData::latest()->filter(["search" => $this->search])->paginate(10)->withQueryString();
        return view('livewire.home.device-management.device-data', ['datas' => $datas])
        ->layout('layouts.home-layout');
    }
}
