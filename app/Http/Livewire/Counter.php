<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public function render()
    {
        return view('livewire.counter');
    }
    
    public $fullname;
    public $gender;
    public $email;
    public $postcode;
    public $address;
    public $opinion;
    
    public $rules = [
        'fullname' =>  'required|max:255',
        'gender' => 'required',
        'email' => 'required|email',
        'postcode' => 'required|min:8',
        'address' =>  'required|max:255',
        'opinion' =>  'required|max:120',
    ];
    
    public function update($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    
}
