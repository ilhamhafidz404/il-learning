<?php

namespace App\Http\Livewire\Teacher;

use Livewire\Component;

class Login extends Component
{
    public function render()
    {
        return view('livewire.teacher.login')->extends('livewire.teacher.master')->section('content');
    }

    public function authenticate(){
        $credentials = 
    }
}
