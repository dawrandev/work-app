<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserSearch extends Component
{
    use WithPagination;

    public $search = '';
    public $roleFilter = '';

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingRoleFilter()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = User::query();

        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('first_name', 'like', '%' . $this->search . '%')
                    ->orWhere('last_name', 'like', '%' . $this->search . '%')
                    ->orWhere('phone', 'like', '%' . $this->search . '%');
            });
        }

        if (!empty($this->roleFilter)) {
            $query->where('role', $this->roleFilter);
        }

        $users = $query->latest()->paginate(10);

        return view('livewire.user-search', [
            'users' => $users
        ]);
    }
}
