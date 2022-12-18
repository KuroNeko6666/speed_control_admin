<?php

namespace App\Http\Livewire\Home;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Device;
use Livewire\Component;
use App\Models\DeviceData;

class Dashboard extends Component
{
    public $data_register;
    public $users, $users_verified, $admins, $operators;
    public $devices, $devices_active, $devices_data;
    public $role;

    public function mount()
    {
        $this->role = auth()->user()->role;
        $this->data_register = array();

        if($this->role == 'admin'){
            $this->users = User::filter(['role' => 'user'])->count();
            $this->users_verified = User::filter(['role' => 'user', 'verified' => '1'])->count();
            $this->admins = User::filter(['role' => 'admin'])->count();
            $this->operators = User::filter(['role' => 'operator'])->count();
            for ($i=0; $i < 7 ; $i++) {
                $count =  User::where('role', 'user')->whereDate( 'created_at', Carbon::today()->subDay($i))->get()->count();
                $date = Carbon::today()->subDay($i)->toDateString();
                $this->data_register[$date] = $count;
            }
        }

        if($this->role == 'operator'){
            $this->devices = Device::count();
            $this->devices_active = Device::filter(['status' => 'active'])->count();
            $this->devices_data = DeviceData::count();
            for ($i=0; $i < 7 ; $i++) {
                $count =  DeviceData::whereDate( 'created_at', Carbon::today()->subDay($i))->get()->count();
                $date = Carbon::today()->subDay($i)->toDateString();
                $this->data_register[$date] = $count;
            }
        }

    }

    public function render()
    {
        return view('livewire.home.dashboard')
        ->layout('layouts.home-layout');
    }
}
