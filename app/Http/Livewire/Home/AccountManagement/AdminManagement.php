<?php

namespace App\Http\Livewire\Home\AccountManagement;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use App\Mail\SpeedControlEmail;
use App\Models\EmailVerification;
use Illuminate\Support\Facades\Mail;

class AdminManagement extends Component
{
    use WithPagination;
    public $search;
    public $name, $email, $password;
    public $currentUser;
    protected $paginationTheme = 'bootstrap';

    public function mount()
    {

    }

    public function resetData()
    {
        $this->currentUser = null;
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }

    public function show(User $user)
    {
        $this->currentUser = $user;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function store()
    {
        $data = $this->validate([
            "name" => 'required|min:3|max:255',
            "email" => 'required|email:dns|max:255|unique:users',
            "password" => 'required|min:8|max:255',
        ]);
        $data["password"] = bcrypt($data["password"]);
        $data["role"] = "admin";

        try {
            $user = User::create($data);
            $validation = [
                'token' => Str::uuid()->toString(),
                'user_id' => $user->id,
            ];
            $data = EmailVerification::create($validation);
            Mail::to($user->email)->send(new SpeedControlEmail($data->token));
            $this->resetData();
            $this->dispatchBrowserEvent('closeCreateModal');
            return session()->flash('success', 'Your account has been created!');
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
        $data = [];
        if($this->currentUser->email === $this->email){
            $data = $this->validate([
                "name" => 'required|min:3|max:255',
                "email" => 'required|email:dns|max:255',
            ]);
        } else {
            $data = $this->validate([
                "name" => 'required|min:3|max:255',
                "email" => 'required|email:dns|max:255|unique:users',
            ]);
        }
        $res = $this->currentUser->update($data);
        $this->resetData();
        $this->dispatchBrowserEvent('closeUpdateModal');

        if($res){
            return session()->flash('success', 'Your account has been updated!');
        }
        return session()->flash('success', 'Your account has been created!');
    }

    public function delete()
    {
        $this->currentUser->delete();
        $this->resetData();
        return session()->flash('success', 'Your account has been deleted!');

    }

    public function render()
    {
        $accounts =  User::latest()->filter(["search" => $this->search])->filter(['role' => 'admin'])->paginate(10)->withQueryString();
        return view('livewire.home.account-management.admin-management', ['accounts' => $accounts])
        ->layout('layouts.home-layout');
    }
}
