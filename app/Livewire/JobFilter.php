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

    // Controllerdan kelgan initial ma'lumotlar
    public $initialJobsData = null;
    public $useInitialJobs = false;

    // Controllerdan kelgan filterlar
    public $initialFilters = [];

    protected $queryString = [
        'selectedCategory' => ['except' => ''],
        'selectedSubCategory' => ['except' => ''],
        'selectedDistrict' => ['except' => ''],
        'selectedType' => ['except' => ''],
        'salaryFrom' => ['except' => ''],
        'salaryTo' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function mount($initialJobsData = null, $initialFilters = [])
    {
        // Agar controllerdan jobs kelgan bo'lsa
        if ($initialJobsData !== null) {
            $this->initialJobsData = $initialJobsData;
            $this->useInitialJobs = true;

            // Controllerdan kelgan filterlarni o'rnatish
            if (!empty($initialFilters)) {
                $this->selectedCategory = $initialFilters['category_id'] ?? '';
                $this->selectedSubCategory = $initialFilters['subcategory_id'] ?? '';
                $this->selectedDistrict = $initialFilters['district_id'] ?? '';
                $this->selectedType = $initialFilters['type_id'] ?? '';
                $this->salaryFrom = $initialFilters['salary_from'] ?? '';
                $this->salaryTo = $initialFilters['salary_to'] ?? '';
            }
        } else {
            // URL parametrlardan olish
            $this->selectedCategory = request('selectedCategory', '');
            $this->selectedSubCategory = request('selectedSubCategory', '');
            $this->selectedDistrict = request('selectedDistrict', '');
            $this->selectedType = request('selectedType', '');
            $this->salaryFrom = request('salaryFrom', '');
            $this->salaryTo = request('salaryTo', '');
        }

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
        $this->useInitialJobs = false; // Filter o'zgarganda initial jobsdan foydalanishni to'xtatish
        $this->selectedSubCategory = '';
        $this->loadSubCategories();
        $this->resetPage();
    }

    public function updatedSelectedSubCategory()
    {
        $this->useInitialJobs = false;
        $this->resetPage();
    }

    public function updatedSelectedDistrict()
    {
        $this->useInitialJobs = false;
        $this->resetPage();
    }

    public function updatedSelectedType()
    {
        $this->useInitialJobs = false;
        $this->resetPage();
    }

    public function updatedSalaryFrom()
    {
        $this->useInitialJobs = false;
        $this->resetPage();
    }

    public function updatedSalaryTo()
    {
        $this->useInitialJobs = false;
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
        $this->useInitialJobs = false;
        $this->resetPage();
    }

    private function convertInitialJobsToCollection()
    {
        if (!$this->initialJobsData) {
            return null;
        }

        $jobs = collect($this->initialJobsData['items'])->map(function ($jobData) {
            return Job::with(['category', 'subcategory', 'district', 'type'])
                ->find($jobData['id']);
        });

        return new \Illuminate\Pagination\LengthAwarePaginator(
            $jobs,
            $this->initialJobsData['total'],
            $this->initialJobsData['per_page'],
            $this->initialJobsData['current_page'],
            ['path' => request()->url()]
        );
    }

    public function render()
    {
        if ($this->useInitialJobs && $this->initialJobsData !== null) {
            $jobs = $this->convertInitialJobsToCollection();

            return view('livewire.job-filter', [
                'jobs' => $jobs,
                'categories' => Category::all(),
                'districts' => District::all(),
                'types' => Type::all(),
            ]);
        }

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
