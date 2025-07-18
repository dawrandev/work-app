<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\District;
use App\Models\Job;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class ManageJobsFilter extends Component
{
    use WithPagination;

    public $search = '';
    public $selectedCategory = '';
    public $selectedDistrict = '';
    public $selectedStatus = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'selectedCategory' => ['except' => ''],
        'selectedDistrict' => ['except' => ''],
        'selectedStatus' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    protected $paginationTheme = 'bootstrap';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedSelectedCategory()
    {
        $this->resetPage();
    }

    public function updatedSelectedDistrict()
    {
        $this->resetPage();
    }

    public function updatedSelectedStatus()
    {
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->search = '';
        $this->selectedCategory = '';
        $this->selectedDistrict = '';
        $this->selectedStatus = '';
        $this->resetPage();
    }

    public function render()
    {
        $jobs = Job::query()
            ->where('user_id', auth()->id())
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%');
            })
            ->when($this->selectedCategory, function ($query) {
                $query->where('category_id', $this->selectedCategory);
            })
            ->when($this->selectedDistrict, function ($query) {
                $query->where('district_id', $this->selectedDistrict);
            })
            ->when($this->selectedStatus, function ($query) {
                $query->where('status', $this->selectedStatus);
            })
            ->with(['category', 'district', 'type'])
            ->withCount([
                'applicants as applications_count',
                'views as unique_views_count' => function ($query) {
                    $query->where('viewable_type', Job::class);
                }
            ])
            ->latest()
            ->paginate(10);

        return view('livewire.manage-jobs-filter', [
            'jobs' => $jobs,
            'categories' => Category::all(),
            'districts' => District::all()
        ]);
    }

    public function deleteJob($jobId)
    {
        $job = Job::where('user_id', auth()->id())->findOrFail($jobId);
        $job->delete();

        session()->flash('message', 'Job deleted successfully.');
    }
}
