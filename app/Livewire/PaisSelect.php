<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pais;

class PaisSelect extends Component
{
    public $searchTerm = '';
    public $paises;
    public $perPage = 10;

    public function mount()
    {
        $this->paises = Pais::where('paisnombre', 'like', '%' . $this->searchTerm . '%')->paginate($this->perPage);
    }

    public function updatedSearchTerm()
    {
        $this->paises = Pais::where('paisnombre', 'like', '%' . $this->searchTerm . '%')->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.pais-select');
    }
}