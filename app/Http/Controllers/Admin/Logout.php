<?php

namespace App\Http\Controllers\Admin;

use Livewire\Component;

class Logout extends Component
{

    public function logout(){
      \Auth::logout();
      return redirect()->to(route('login'));
    }
    public function render()
    {
        return view('admin.logout')->extends('layouts.app');
    }
}
