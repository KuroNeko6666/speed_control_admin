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

class DeviceManagement extends Component
{
    use WithPagination;
    public $search;
    public $name, $address;
    public $current;
    protected $paginationTheme = 'bootstrap';

    public function mount()
    {

    }

    public function resetData()
    {
        $this->current = null;
        $this->name = '';
        $this->address = '';
    }

    public function show(Device $user)
    {
        $this->current = $user;
        $this->name = $user->name;
        $this->address = $user->address;
    }

    public function store()
    {
        $data = $this->validate([
            "name" => 'required|min:3|max:255',
            "address" => 'required|min:3|max:255',
        ]);

        $data["status"] = "active";

        try {
            $user = Device::create($data);
            $this->resetData();
            $this->dispatchBrowserEvent('closeCreateModal');
            return session()->flash('success', 'Your data has been created!');
        }
        catch (Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            $this->resetData();
            $this->dispatchBrowserEvent('closeCreateModal');
            return session()->flash('error', 'Query error ' + $errorCode);
        }

    }

    public function update()
    {
        $data = $this->validate([
            "name" => 'required|min:3|max:255',
            "address" => 'required|min:3|max:255',
        ]);

        $res = $this->current->update($data);
        $this->resetData();
        $this->dispatchBrowserEvent('closeUpdateModal');

        if($res != null){
            return session()->flash('success', 'Your data has been updated!');
        }
        return session()->flash('success', 'Your data has been created!');
    }

    public function delete()
    {
        $data = $this->current->data()->get();
        foreach ($data as $value) {
            $value->delete();
        }
        $this->current->delete();
        $this->resetData();
        return session()->flash('success', 'Your data has been deleted!');

    }

    public function render()
    {
        $datas =  Device::latest()->filter(["search" => $this->search])->paginate(10)->withQueryString();
        return view('livewire.home.device-management.device-management', ['datas' => $datas])
        ->layout('layouts.home-layout');
    }
}
