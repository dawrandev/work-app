<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\District;
use App\Models\Offer;
use Livewire\Component;
use Livewire\WithPagination;

class ManageOffersFilter extends Component
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
        $offers = Offer::query()
            ->where('user_id', auth()->id())
            ->when($this->search, function ($q) {
                $q->where(function ($searchQuery) {
                    $searchQuery->where('title', 'like', '%' . $this->search . '%')
                        ->orWhere('description', 'like', '%' . $this->search . '%')
                        ->orWhere('skills', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->selectedCategory, function ($q) {
                $q->where('category_id', $this->selectedCategory);
            })
            ->when($this->selectedDistrict, function ($q) {
                $q->where('district_id', $this->selectedDistrict);
            })
            ->when($this->selectedStatus, function ($q) {
                $q->where('status', $this->selectedStatus);
            })
            ->with(['category', 'district', 'type'])
            ->withCount(['applicants as applications_count'])
            ->latest()
            ->paginate(10);

        return view('livewire.manage-offers-filter', [
            'offers' => $offers,
            'categories' => Category::all(),
            'districts' => District::all()
        ]);
    }

    public function withdrawOffer($offerId)
    {
        $offer = Offer::where('user_id', auth()->id())->findOrFail($offerId);

        if ($offer->status === 'pending') {
            $offer->update(['status' => 'withdrawn']);
            session()->flash('message', 'Offer withdrawn successfully.');
        } else {
            session()->flash('error', 'Cannot withdraw this offer.');
        }
    }
}
