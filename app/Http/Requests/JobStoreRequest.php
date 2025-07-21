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
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
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

            if (($this->latitude && !$this->longitude) || (!$this->latitude && $this->longitude)) {
                $validator->errors()->add('latitude', __('Both latitude and longitude must be provided together.'));
            }
        });
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'title.required' => __('The title field is required.'),
            'title.string' => __('The title must be a string.'),
            'title.max' => __('The title may not be greater than 255 characters.'),

            'category_id.required' => __('Please select a category.'),
            'category_id.exists' => __('The selected category is invalid.'),

            'subcategory_id.required' => __('Please select a subcategory.'),
            'subcategory_id.exists' => __('The selected subcategory is invalid.'),

            'type_id.required' => __('Please select a type.'),
            'type_id.exists' => __('The selected type is invalid.'),

            'employment_type_id.required' => __('Please select an employment type.'),
            'employment_type_id.exists' => __('The selected employment type is invalid.'),

            'district_id.exists' => __('The selected district is invalid.'),

            'phone.required' => __('The phone number is required.'),
            'phone.digits' => __('The phone number must be exactly 9 digits.'),

            'description.required' => __('The description field is required.'),
            'description.string' => __('The description must be a string.'),

            'salary_from.numeric' => __('The salary from must be a number.'),
            'salary_to.numeric' => __('The salary to must be a number.'),
            'salary_to.gte' => __('The salary to must be greater than or equal to salary from.'),

            'deadline.date' => __('The deadline must be a valid date.'),

            'address.required' => __('The address field is required.'),
            'address.string' => __('The address must be a string.'),
            'address.max' => __('The address may not be greater than 500 characters.'),

            'latitude.numeric' => __('The latitude must be a number.'),
            'latitude.between' => __('The latitude must be between -90 and 90.'),
            'longitude.numeric' => __('The longitude must be a number.'),
            'longitude.between' => __('The longitude must be between -180 and 180.'),

            'images.array' => __('Images must be an array.'),
            'images.max' => __('You can upload maximum 3 images.'),
            'images.*.image' => __('Each file must be an image.'),
            'images.*.mimes' => __('Images must be jpeg, png, or jpg format.'),
            'images.*.max' => __('Each image may not be greater than 2MB.'),
        ];
    }
}
