<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Mary\Traits\Toast;

class Login extends Component
{
    use Toast;

    #[Validate]
    public $email, $password;

    public function rules()
    {
        return 
        [
            'email' => 'required',
            'password' => 'required'
        ];
    }

    public function login()
    {
        $credentials = $this->validate();

        if (Auth::attempt($credentials)) {

            $user = DB::table('users')->where('email',$this->email)->first();          
            session()->put('user', $user);
            return redirect()->intended('home');
        }

    }

    #[Title('Login')]
    public function render()
    {
        return view('livewire.login');
    }
}
