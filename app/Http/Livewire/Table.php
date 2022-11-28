<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\trip;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $search ='';
    public $category='from';

    public function render()
    {
        // view using table functions (pagination and search requirements)
        return view('livewire.table', [
            'trips'=>trip::search($this->search, $this->category)
            ->simplePaginate($this->perPage)
        ]) ;
    }
}
