<?php

namespace App\Livewire;

use Livewire\Component;
use app\Models\User;
use Livewire\WithPagination;

class AdminUsers extends Component
{
    use WithPagination;
    
    protected $paginationTheme ="bootstrap";

    public $search;

    public function render()
    {
        $users=  User::where('name','LIKE','%'.$this->search.'%')
                        ->orWhere('email','LIKE','%'.$this->search.'%')
                        ->paginate(5);

        return view('livewire.admin-users',compact('users'));
    }

    public function limpiar(){

        $this->resetPage('page');

    }
}
