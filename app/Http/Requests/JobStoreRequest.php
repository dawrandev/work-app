<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'required|exists:subcategories,id',
            'type_id' => 'required|exists:types,id',
            'employment_type_id' => 'required|exists:employment_types,id',
            'district_id' => 'nullable|exists:districts,id',
            'phone' => 'required|digits:9',
            'description' => 'required|string',
            'salary_from' => 'nullable|numeric',
            'salary_to' => 'nullable|numeric|gte:salary_from',
            'deadline' => 'nullable|date',
            'address' => 'required|string|max:500',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'images' => 'nullable|array|max:3',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'salary_from' => $this->normalizeNumber($this->salary_from),
            'salary_to' => $this->normalizeNumber($this->salary_to),
            'phone' => $this->normalizeNumber($this->phone)
        ]);
    }

    /**
     * Normalize number by removing spaces and converting to integer
     */
    private function normalizeNumber($value)
    {
        return $value ? (int)str_replace(' ', '', $value) : null;
    }

    /**
     * Configure the validator instance.
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $from = $this->salary_from;
            $to = $this->salary_to;

            if ($from !== null && $to !== null && $to < $from) {
                $validator->errors()->add('salary_to', __('Salary "to" must be greater than or equal to salary "from".'));
            }

            // Validate that if coordinates are provided, both must be present
            if (($this->latitude && !$this->longitude) || (!$this->latitude && $this->longitude)) {
                $validator->errors()->add('latitude', __('Both latitude and longitude must be provided together.'));
            }
        });
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages()
    {
        return [
            'title.required' => __('Job title is required.'),
            'category_id.required' => __('Please select a category.'),
            'subcategory_id.required' => __('Please select a subcategory.'),
            'type_id.required' => __('Please select a job type.'),
            'employment_type_id.required' => __('Please select an employment type.'),
            'description.required' => __('Job description is required.'),
            'address.required' => __('Address is required.'),
            'images.max' => __('You can upload a maximum of 5 images.'),
            'images.*.max' => __('Each image must not exceed 5MB.'),
            'salary_to.gte' => __('Salary "to" must be greater than or equal to salary "from".'),
            'latitude.between' => __('Invalid latitude value.'),
            'longitude.between' => __('Invalid longitude value.'),
        ];
    }
}
