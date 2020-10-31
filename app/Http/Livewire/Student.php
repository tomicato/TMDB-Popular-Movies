<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Student extends Component
{
    public $message = 'Alex! Very glad to see you!';

    public function render()
    {
        return view('livewire.student');
    }
}
