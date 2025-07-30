<?php

namespace App\Livewire\Tables\Admin;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Job;

class JobsTable extends DataTableComponent
{
    protected $model = Job::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setTableAttributes([
                'class' => 'table-bordered table-sm'
            ]);
    }

    public function columns(): array
    {
        return [

            Column::make("Actions", "id")
                ->view('pages.admin.jobs.actions')
                ->sortable(),
            Column::make("Id", "id")
                ->sortable(),
            Column::make(__("User"), "user.first_name")
                ->searchable()
                ->sortable(),
            Column::make("Category id", "category_id")
                ->sortable(),
            Column::make("Subcategory id", "subcategory_id")
                ->sortable(),
            Column::make("District id", "district_id")
                ->sortable(),
            Column::make("Type id", "type_id")
                ->sortable(),
            Column::make("Employment type id", "employment_type_id")
                ->sortable(),
            Column::make("Phone", "phone")
                ->sortable(),
            Column::make("Title", "title")
                ->sortable(),
            Column::make("Description", "description")
                ->sortable(),
            Column::make("Salary from", "salary_from")
                ->sortable(),
            Column::make("Salary to", "salary_to")
                ->sortable(),
            Column::make("Deadline", "deadline")
                ->sortable(),
            Column::make("Address", "address")
                ->sortable(),
            Column::make("Longitude", "longitude")
                ->sortable(),
            Column::make("Latitude", "latitude")
                ->sortable(),
            Column::make("Status", "status")
                ->sortable(),
            Column::make("Approval status", "approval_status")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
