<?php

namespace App\Http\Controllers;

use Livewire\Component;
use App\Models\user;
use Illuminate\support\Facades\Hash;

class Registeration extends Component
{

    public $fullname='';
    public $email = '';
    public $password = '';
    public $passwordConfirmation='';



    public function updated($field){
        $this->ValidateOnly($field,[
            'fullname' =>'required|string|max:20',

            'email' =>'required|email|unique:users',
            'password' =>'required|min:4|same:passwordConfirmation'
        ]);
    }
    public function register(){

        $data=$this->validate([
            'fullname' =>'required|string|max:20',

            'email' =>'required|email|unique:users',
            'password' =>'required|min:4|same:passwordConfirmation',
        ]);
        user::create([
            'name'=>$data['fullname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);


        return redirect()->to(route('login'));
        $this->clear();
        
    }

    private function clear(){
        $this->fullname='';
        $this->email = '';
        $this->password = '';
        $this->passwordConfirmation='';
    }
    public function render()
    {
        return view('registeration')->extends('layouts.app');
    }
}
