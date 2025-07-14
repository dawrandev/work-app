<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\District;
use App\Models\Job;
use App\Models\SubCategory;
use App\Models\Type;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class JobFilter extends Component
{
    use WithPagination;

    public $selectedCategory = '';
    public $selectedSubCategory = '';
    public $selectedDistrict = '';
    public $selectedType = '';
    public $salaryFrom = '';
    public $salaryTo = '';
    public $subCategories = [];

    protected $queryString = [
        'selectedCategory' => ['except' => ''],
        'selectedSubCategory' => ['except' => ''],
        'selectedDistrict' => ['except' => ''],
        'selectedType' => ['except' => ''],
        'salaryFrom' => ['except' => ''],
        'salaryTo' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function mount()
    {
        $this->selectedCategory = request('selectedCategory', '');
        $this->selectedSubCategory = request('selectedSubCategory', '');
        $this->selectedDistrict = request('selectedDistrict', '');
        $this->selectedType = request('selectedType', '');
        $this->salaryFrom = request('salaryFrom', '');
        $this->salaryTo = request('salaryTo', '');

        if ($this->selectedCategory) {
            $this->loadSubCategories();
        }
    }

    public function loadSubCategories()
    {
        if ($this->selectedCategory) {
            $this->subCategories = SubCategory::where('category_id', $this->selectedCategory)->get();
        } else {
            $this->subCategories = collect();
            $this->selectedSubCategory = '';
        }
    }

    public function updatedSelectedCategory()
    {
        $this->selectedSubCategory = '';
        $this->loadSubCategories();
        $this->resetPage();
    }

    public function updatedSelectedSubCategory()
    {
        $this->resetPage();
    }

    public function updatedSelectedDistrict()
    {
        $this->resetPage();
    }

    public function updatedSelectedType()
    {
        $this->resetPage();
    }

    public function updatedSalaryFrom()
    {
        $this->resetPage();
    }

    public function updatedSalaryTo()
    {
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->selectedCategory = '';
        $this->selectedSubCategory = '';
        $this->selectedDistrict = '';
        $this->selectedType = '';
        $this->salaryFrom = '';
        $this->salaryTo = '';
        $this->subCategories = collect();
        $this->resetPage();
    }

    public function render()
    {
        $query = Job::query()
            ->select('jobs.*')
            ->with([
                'category',
                'subcategory',
                'district',
                'type'
            ])
            ->where('approval_status', 'approved');

        if (!empty($this->selectedCategory)) {
            $query->where('category_id', $this->selectedCategory);
        }

        if (!empty($this->selectedSubCategory)) {
            $query->where('subcategory_id', $this->selectedSubCategory);
        }

        if (!empty($this->selectedDistrict)) {
            $query->where('district_id', $this->selectedDistrict);
        }

        if (!empty($this->selectedType)) {
            $query->where('type_id', $this->selectedType);
        }

        if (!empty($this->salaryFrom)) {
            $query->where('salary_from', '>=', $this->salaryFrom);
        }

        if (!empty($this->salaryTo)) {
            $query->where('salary_to', '<=', $this->salaryTo);
        }

        $jobs = $query->latest()->paginate(10);

        if ($jobs->count() > 0) {
            $firstJob = $jobs->first();
            Log::info('First job data:', [
                'id' => $firstJob->id,
                'title' => $firstJob->title,
                'category' => $firstJob->category ? $firstJob->category->translated_name : 'null',
                'subcategory' => $firstJob->subcategory ? $firstJob->subcategory->translated_name : 'null',
                'has_relations' => [
                    'category' => $firstJob->relationLoaded('category'),
                    'subcategory' => $firstJob->relationLoaded('subcategory'),
                    'district' => $firstJob->relationLoaded('district'),
                    'type' => $firstJob->relationLoaded('type'),
                ]
            ]);
        }

        return view('livewire.job-filter', [
            'jobs' => $jobs,
            'categories' => Category::all(),
            'districts' => District::all(),
            'types' => Type::all(),
        ]);
    }
}
