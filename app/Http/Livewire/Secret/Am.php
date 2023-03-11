<?php

namespace App\Http\Livewire\Secret;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Am extends Component
{
    public $email, $password;
    public $isOpen = false;

    public function proses(){
        $result = Http::post('https://admin.aditnanda.com/adit-nanda/auth/authenticate',[
            'email' => $this->email,
            'password' => $this->password,
        ])->json();

        if (@$result['data']['user']['status'] == 'active') {
            # code...
            $this->isOpen = true;
            $this->emit('show');
        }
    }

    public function render()
    {
        return view('livewire.secret.am');
    }
}
