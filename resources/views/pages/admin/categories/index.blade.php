@extends('layouts.admin.main')

@section('content')
<x-breadcrumb :title="'Categories'">
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
        <i class="icon-plus"></i>
        Add
    </a>
</x-breadcrumb>
<div class="container-fluid">
    <div class="row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Category</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach (getCategories() as $category)
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>{{ $category->name }}</td>
                                            <td>
                                                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary" title="Редактировать">
                                                    <i class="icon-pencil-alt"></i>
                                                </a>
                                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" title="Удалить">
                                                        <i class="icon-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection