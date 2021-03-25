<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Pair;
use Livewire\WithPagination;

class Pairs extends Component
{

    use WithPagination;

   
    public $search;
    public $sortField;
    public $sortAsc = true;
    protected $queryString = ['search', 'sortAsc', 'sortField'];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.pairs', [
            'pairs' => Pair::paginate(10),
            'pairs' => Pair::where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
                    // ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })->paginate(10),
        ]);
    }
    
}
