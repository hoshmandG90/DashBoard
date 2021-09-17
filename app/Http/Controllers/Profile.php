<?php

namespace App\Http\Controllers;

use Livewire\Component;
use App\Models\user;
use Livewire\WithFileUploads;

class Profile extends Component
{

    use WithFileUploads;

    public $username = '';
    public $about = '';
    public $birthday =null;
    public $NewAvatar;

    public function mount(){
        $this->username=auth()->user()->username;
        $this->about=auth()->user()->about;
        $this->birthday=optional(auth()->user()->birthday)->format('m/d/Y');


    }

    public  function save(){
       $this->Validate([
            'username' => 'required|max:24',
            'about'=>'required',
            'birthday'=>'required|sometimes',
            'NewAvatar' =>'image|max:10024' // 10 MB
     ]);

     $filename=$this->NewAvatar->store('/','avatars');

     

       auth()->user()->update([
        'username' => $this->username,
        'about'=>$this->about,
        'birthday'=>$this->birthday,
        'avatar' =>$filename
       ]);  
       
       $this->dispatchBrowserEvent('notify','Profile Saved !');
       session()->flash('notify-saved');

     
    }


    public function render()
    {
        return view('profile')
        ->extends('layouts.master');
    }
}
