<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Mail\SpeedControlEmail;
use App\Models\EmailVerification;
use App\Http\Livewire\Auth\Register;
use Illuminate\Support\Facades\Mail;
use \Illuminate\Database\QueryException;

class Register extends Component
{
    public $name, $email, $password, $role;

    protected $rules = [
        "name" => 'required|min:3|max:255',
        "email" => 'required|email:dns|max:255|unique:users',
        "password" => 'required|min:8|max:255',
        "role" => 'required|in:user,operator,admin'
    ];

    public function submit()
    {
        $credential = $this->validate();
        $credential["password"] = bcrypt($credential["password"]);

        try {
            $user = User::create($credential);
            $validation = [
                'token' => Str::uuid()->toString(),
                'user_id' => $user->id,
            ];
            $data = EmailVerification::create($validation);
            Mail::to($user->email)->send(new SpeedControlEmail($data->token));
            return redirect()->route("login");

        } catch(QueryException $e){
            dd($e);
        }

    }

    public function render()
    {
        return view('livewire.auth.register')
        ->layout('layouts/auth-layout');
    }
}
