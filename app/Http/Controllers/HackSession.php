<?php

namespace App\Http\Controllers;

use Livewire\Component;

class HackSession extends Component
{
    public function render()
    {
        return view('contact')->extends('layouts.master');
    }
}
