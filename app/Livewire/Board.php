<?php

namespace App\Livewire;

use Livewire\Component;

class Board extends Component
{
    public function ccc(){
        dump("hello");

    }
    public function Click($value){
        dump("hello");
        // dump($cell);
    }
    public function render()
    {
        return view('livewire.board');
    }
}
