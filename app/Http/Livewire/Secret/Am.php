<?php

namespace App\Http\Livewire\Secret;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Am extends Component
{
    public $email, $password;
    public $isOpen = false, $is404 = false;
    public $description = '';
    public $ucapan = '';
    public $ucapan_slider = '';
    public $notfound = '404 | Not Found';
    public $n = 0;

    public function increase_not_found(){
        $this->n++;
        if ($this->n == 5) {
            # code...
            $this->notfound = '404 | Not Found | 05 10';
        }

        if ($this->n == 10) {
            # code...
            $this->is404 = true;

            // init data
            $this->email = \Crypt::decrypt('eyJpdiI6InpJajVJSGo0cUxqVGphNXEreDZwTlE9PSIsInZhbHVlIjoiU0xYdExtem1INUJpbjZ3UnZkZGhyY0VqeUZEdFdGZWdKTm04TVlUTGQ2UT0iLCJtYWMiOiJhYmEyMDIzZWU5NDk0NTQ5NmIwZjNlZDQ4MWJhOGQyNGI1N2U3Zjg0YWZmNDE0Y2QzZTRiYjNkYzlhMTAyYzE3IiwidGFnIjoiIn0=');
            $this->password = \Crypt::decrypt('eyJpdiI6IlFjQVM0Q25VUEdYNjI1MWk3NlJZa3c9PSIsInZhbHVlIjoiakVMdng1ZFNCZzU2Y1Rra3c5bTJIcXJMeWI2c1JzajJpMEUzM1F4Mi9naz0iLCJtYWMiOiI4MmI5OTgyNjUxMzU0MDRjYTk3NzlhYzJkY2ZjMjYyN2YyNDY5M2VlYjRjNTMyODJkNjgyMDhjOGJhNTZiODU1IiwidGFnIjoiIn0=');
            $this->proses();
        }
    }

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
            $this->ucapan = @$result2['data'][0]['ucapan'];
            $this->ucapan_slider = @$result2['data'][0]['ucapan_slider'];
            $this->email = '';
            $this->password = '';
            $this->emit('show',$this->ucapan_slider);
        }
    }

    public function render()
    {
        return view('livewire.secret.am');
    }
}
