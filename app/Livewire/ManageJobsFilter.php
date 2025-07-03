<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\District;
use App\Models\Job;
use Livewire\Component;
use Livewire\WithPagination;

class ManageJobsFilter extends Component
{
    use WithPagination;

    public $search = '';
    public $category = '';
    public $district = '';
    public $status = '';

    public $categories;
    public $districts;

    protected $queryString = [
        'search' => ['except' => ''],
        'category' => ['except' => ''],
        'district' => ['except' => ''],
        'status' => ['except' => ''],
    ];

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->categories = Category::all();
        $this->districts = District::all();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingCategory()
    {
        $this->resetPage();
    }

    public function updatingDistrict()
    {
        $this->resetPage();
    }

    public function updatingStatus()
    {
        $this->resetPage();
    }

    public function render()
    {
        $jobs = Job::query()
            ->where('user_id', auth()->id())
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%');
            })
            ->when($this->category, function ($query) {
                $query->where('category_id', $this->category);
            })
            ->when($this->district, function ($query) {
                $query->where('district_id', $this->district);
            })
            ->when($this->status, function ($query) {
                $query->where('status', $this->status);
            })
            ->with(['category', 'district', 'type'])
            ->withCount('applicants')
            ->latest()
            ->paginate(10);

        return view('livewire.manage-jobs-filter', [
            'jobs' => $jobs
        ]);
    }

    public function deleteJob($jobId)
    {
        $job = Job::where('user_id', auth()->id())->findOrFail($jobId);
        $job->delete();

        session()->flash('message', 'Job deleted successfully.');
    }
}
