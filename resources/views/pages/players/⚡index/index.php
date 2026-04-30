<?php

use Livewire\Component;

new #[Title('Players')] class extends Component
{
    use withPagination;

    public $search = '';
    public $department = '';
    public $position = '';
    public $first_name = '';
    public $last_name = '';
    public $sortDirection = 'asc';

    // Page
    public $perPage = 10;

    

};