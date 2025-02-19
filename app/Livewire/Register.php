<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

use Mary\Traits\Toast;

use App\Models\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    use Toast;

    #[Validate]
    public $name, $email, $password;

    public function rules()
    {
        return 
        [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6'
        ];
    }

    public function register()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ]);

        $this->reset();

        $this->success('Registered Successfully.',  position: 'toast-bottom');    
    }

    #[Title('Register')]
    public function render()
    {
        return view('livewire.register');
    }
}
