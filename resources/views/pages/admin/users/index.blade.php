@extends('layouts.admin.main')
@section('title', __('All Users'))
@section('content')
<x-admin.breadcrumb :title="''">
</x-admin.breadcrumb>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow-sm">
                <livewire:user-search />
            </div>
        </div>
    </div>
</div>
@endsection