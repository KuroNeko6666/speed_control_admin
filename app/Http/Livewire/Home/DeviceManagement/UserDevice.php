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

class UserDevice extends Component
{
    use WithPagination;
    public $search;
    public $user_id, $device_id;
    public $current_user, $current_device, $current;
    public $devices, $users;
    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->devices = Device::all();
        $this->users = User::latest()->filter(["role" => "user"])->get();
    }
    public function show(\App\Models\UserDevice $user_device)
    {
        $this->current = $user_device;
        $this->current_user = $user_device->user_id;
        $this->current_device = $user_device->device_id;
        $this->dispatchBrowserEvent('contentChanged');
    }

    public function store()
    {
        $data = $this->validate([
            "device_id" => 'required|max:255',
            "user_id" => 'required|max:255',
        ]);

        try {
            $user = \App\Models\UserDevice::create($data);
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
            "user_id" => 'required|max:255',
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
        $this->current_user = null;
        $this->current_device = null;
        $this->user_id = '';
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
        $datas = \App\Models\UserDevice::latest()->filter(["search" => $this->search])->paginate(10)->withQueryString();

        return view('livewire.home.device-management.user-device', ['datas' => $datas])
        ->layout('layouts.home-layout');
    }
}
