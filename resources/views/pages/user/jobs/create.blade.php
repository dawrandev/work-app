@extends('layouts.user.main')

@section('content')
<x-user.breadcrumb :title="__('Post a Job')" :description="__('Post your job vacancies and attract the best talent for your business.')" :page="__('Post a Job')" />

<section class="job-post section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-12">
                <div class="job-information">
                    <h3 class="title">{{ __('Job Information') }}</h3>
                    <form action="{{ route('jobs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>{{ __('Job title*') }}</label>
                                    <input class="form-control" name="title" type="text" value="{{ old('title') }}">
                                    @error('title')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Category*') }}</label>
                                    <select class="select" name="category_id" id="category_select">
                                        <option value="">{{ __('Select Category') }}</option>
                                        @foreach (getCategories() as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : ''}}>{{ $category->translated_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Subcategory') }}</label>
                                    <select class="select" name="subcategory_id" id="subcategory_select">
                                        <option value="">{{ __('Select Subcategory') }}</option>
                                        @if(old('category_id'))
                                        @foreach (getSubCategories() as $subcategory)
                                        @if($subcategory->category_id == old('category_id'))
                                        <option value="{{ $subcategory->id }}" {{ old('subcategory_id') == $subcategory->id ? 'selected' : ''}}>{{ $subcategory->translated_name }}</option>
                                        @endif
                                        @endforeach
                                        @endif
                                    </select>
                                    @error('subcategory_id')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Job Types*') }}</label>
                                    <select class="select" name="type_id">
                                        <option value="">{{__('Select Work Type') }}</option>
                                        @foreach (getTypes() as $type)
                                        <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>{{ $type->translated_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('type_id')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Districts') }}</label>
                                    <select class="select" name="district_id">
                                        <option value="">{{ __('Select District') }}</option>
                                        @foreach (getDistricts() as $district)
                                        <option value="{{ $district->id }}" {{ old('district_id') == $district->id ? 'selected' : '' }}>{{ $district->translated_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('district_id')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Address') }}</label>
                                    <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                                    @error('address')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Salary From') }}</label>
                                    <input type="text" name="salary_from" id="salary_from" class="form-control" placeholder="Uzs" value="{{ old('salary_from') }}">
                                    @error('salary_from')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Salary To') }}</label>
                                    <input type="text" name="salary_to" id="salary_to" class="form-control" value="{{ old('salary_to') }}" placeholder="Uzs">
                                    @error('salary_to')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Deadline') }}</label>
                                    <div class="input-group date" id="datetimepicker">
                                        <input type="datetime-local" name="deadline" class="form-control" placeholder="" value="{{ old('deadline') }}">
                                        @error('deadline')
                                        <li style="color: red;">{{ $message }}</li>
                                        @enderror
                                        <span class="input-group-addon"></span>
                                        <i class="bx bx-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>{{ __('Job Description*') }}</label>
                                    <textarea name="description" class="form-control" rows="5">{{ old('description') }}</textarea>
                                    @error('description')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>{{ __('Upload Images') }}</label>
                                    <input type="file" name="images[]" multiple>
                                    @error('images')
                                    <li style="color: red;">{{ $message }}</li>
                                    @enderror

                                    @foreach($errors->get('images.*') as $messages)
                                    @foreach ($messages as $message)
                                    <li style="color: red;">{{ $message }}</li>
                                    @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12 button">
                                <button class="btn">{{__('Post a Job')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categorySelect = document.getElementById('category_select');
        const subcategorySelect = document.getElementById('subcategory_select');

        // Helper'dan olingan barcha subcategoriyalarni JavaScript o'zgaruvchisiga o'tkazish
        const allSubcategories = @json(getSubCategories());

        categorySelect.addEventListener('change', function() {
            const categoryId = this.value;

            // Subcategory selectni tozalash
            subcategorySelect.innerHTML = '<option value="">{{ __("Select Subcategory") }}</option>';

            if (categoryId) {
                // Tanlangan kategoriyaga tegishli subcategoriyalarni filterlash
                const filteredSubcategories = allSubcategories.filter(subcategory =>
                    subcategory.category_id == categoryId
                );

                // Filterlangan subcategoriyalarni dropdown'ga qo'shish
                filteredSubcategories.forEach(subcategory => {
                    const option = document.createElement('option');
                    option.value = subcategory.id;
                    option.textContent = subcategory.translated_name;
                    subcategorySelect.appendChild(option);
                });
            }
        });
    });
</script>
@endsection