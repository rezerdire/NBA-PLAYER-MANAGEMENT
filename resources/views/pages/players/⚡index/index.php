<?php

use Livewire\Component;

new #[Title('Players')] class extends Component
{
    use withPagination;

    public $search = '';
    public $team = '';
    public $position = '';
    public $first_name = '';
    public $last_name = '';
    public $status = '';
    public $sortDirection = 'asc';

    // Page
    public $perPage = 10;

    // row selection 
    public $selected = [];
    public $selectedAll = false;

    public $showDeleteModal = false;
    public $PlayerToDelete = null;

    protected $queryString = [
        'search' => ['except' => ''],
        'team' => ['except' => ''],
        'position' => ['except' => ''],
        'first_name' => ['except' => ''],
        'last_name' => ['except' => ''],
        'status' => ['except' => ''],
    ];

    public function Players(){
        return Player::query()
        ->when($this->search, fn($query) => $query->search($this->search))
        ->when($this->team, fn($query) => $query->where('team', $this->team))
        ->when($this->status, fn($query) => $query->where('status', $this->status))
        ->orderBy($this->sortField, $this->sortDirection)
        ->paginate($this->perPage);
    }

    public function teams(){
        return Player::distinct('team')
        ->pluck('team')
        ->sort();
    }

    public function sortBy($field){
        if($this->sortField === $field){
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
        $this->resetPage();
    }

    public function updatedSearch(){
        $this->resetPage();
    }

    public function updatedTeam(){
        $this->resetPage();
    }
    public function updatedStatus(){
        $this->resetPage();
    }

    public function resetFilters(){
        $this->reset(['search', 'team', 'status']);
    }

    public function confirmDelete($PlayerId){
        $this->PlayerToDelete = $PlayerId;
        $this->showDeleteModal = true;
    }
    public function deletePlayer(){
        Player::find($this->PlayerToDelete)->delete();
        $this->showDeleteModal = false;
        $this->PlayerToDelete = null;
        session()->flash('message', 'Player deleted successfully.');
    }

    public function updateSelected($value){
        if($value){
            $this->selected = $this->Players()->pluck('id')->map(fn($id) => (string)$id)->toArray();
        } else {
            $this->selected = [];
        }
    }

    public function bulkDelete(){
        Player::whereIn('id', $this->selected)->delete();
        $this->selected = [];
        $this->selectAll = false;

        session()->flash('message', 'Selected Players deleted Successfully. ');
        
        }


};