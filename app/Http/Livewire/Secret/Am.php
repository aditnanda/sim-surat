<?php

namespace App\Http\Livewire\Secret;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Am extends Component
{
    public $email, $password;
    public $isOpen = false;
    public $description = '';

    public function proses(){
        $result = Http::post('https://admin.aditnanda.com/adit-nanda/auth/authenticate',[
            'email' => $this->email,
            'password' => $this->password,
        ])->json();

        if (@$result['data']['user']['status'] == 'active') {
            # code...
            $this->isOpen = true;
            $result2 = Http::get('https://admin.aditnanda.com/adit-nanda/items/users?fields=*.*&filter[email]='.$result['data']['user']['email'].'&access_token='.$result['data']['token'])->json();
            $this->description = @$result2['data'][0]['description'];
            $this->email = '';
            $this->password = '';
            $this->emit('show');
        }
    }

    public function render()
    {
        return view('livewire.secret.am');
    }
}
