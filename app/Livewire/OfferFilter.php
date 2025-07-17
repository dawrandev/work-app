<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\District;
use App\Models\Offer;
use App\Models\SubCategory;
use App\Models\Type;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class OfferFilter extends Component
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
        $query = Offer::query()
            ->select('offers.*')
            ->where('approval_status', 'approved')
            ->with([
                'category',
                'subcategory',
                'district',
                'type'
            ]);

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

        $offers = $query->latest()->paginate(10);

        if ($offers->count() > 0) {
            $firstOffer = $offers->first();
            Log::info('First offer data:', [
                'id' => $firstOffer->id,
                'title' => $firstOffer->title,
                'category' => $firstOffer->category ? $firstOffer->category->translated_name : 'null',
                'subcategory' => $firstOffer->subcategory ? $firstOffer->subcategory->translated_name : 'null',
                'has_relations' => [
                    'category' => $firstOffer->relationLoaded('category'),
                    'subcategory' => $firstOffer->relationLoaded('subcategory'),
                    'district' => $firstOffer->relationLoaded('district'),
                    'type' => $firstOffer->relationLoaded('type'),
                ]
            ]);
        }

        return view('livewire.offer-filter', [
            'offers' => $offers,
            'categories' => Category::all(),
            'districts' => District::all(),
            'types' => Type::all(),
        ]);
    }
}
