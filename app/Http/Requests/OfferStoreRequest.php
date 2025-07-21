<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferStoreRequest extends FormRequest
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
        return
            [
                'title' => 'required|string|max:255',
                'phone' => 'required|max:255',
                'category_id' => 'required|exists:categories,id',
                'subcategory_id' => 'required|exists:subcategories,id',
                'district_id' => 'required|exists:districts,id',
                'type_id' => 'required|exists:types,id',
                'employment_type_id' => 'required|exists:employment_types,id',
                'salary_from' => 'required|numeric',
                'salary_to' => 'required|numeric',
                'address' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'images' => 'nullable|array|max:3',
                'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'salary_from' => $this->normalizeNumber($this->salary_from),
            'salary_to' => $this->normalizeNumber($this->salary_to),
            'phone' => $this->normalizeNumber($this->phone)
        ]);
    }

    private function normalizeNumber($value)
    {
        return $value ? (int)str_replace(' ', '', $value) : null;
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $from = $this->salary_from;
            $to = $this->salary_to;

            if ($from !== null && $to !== null && $to < $from) {
                $validator->errors()->add('salary_to', __('Salary "to" must be greater than or equal to salary "from".'));
            }
        });
    }
    public function messages(): array
    {
        return [
            'title.required' => __('The title field is required.'),
            'title.string' => __('The title must be a string.'),
            'title.max' => __('The title may not be greater than 255 characters.'),

            'phone.required' => __('The phone number is required.'),
            'phone.max' => __('The phone number may not be greater than 255 characters.'),

            'category_id.required' => __('Please select a category.'),
            'category_id.exists' => __('The selected category is invalid.'),

            'subcategory_id.required' => __('Please select a subcategory.'),
            'subcategory_id.exists' => __('The selected subcategory is invalid.'),

            'district_id.required' => __('Please select a district.'),
            'district_id.exists' => __('The selected district is invalid.'),

            'type_id.required' => __('Please select a type.'),
            'type_id.exists' => __('The selected type is invalid.'),

            'employment_type_id.required' => __('Please select an employment type.'),
            'employment_type_id.exists' => __('The selected employment type is invalid.'),

            'salary_from.required' => __('The salary from field is required.'),
            'salary_from.numeric' => __('The salary from must be a number.'),
            'salary_to.required' => __('The salary to field is required.'),
            'salary_to.numeric' => __('The salary to must be a number.'),

            'address.required' => __('The address field is required.'),
            'address.string' => __('The address must be a string.'),
            'address.max' => __('The address may not be greater than 255 characters.'),

            'description.required' => __('The description field is required.'),
            'description.string' => __('The description must be a string.'),
            'description.max' => __('The description may not be greater than 255 characters.'),

            'images.array' => __('Images must be an array.'),
            'images.max' => __('You can upload maximum 3 images.'),
            'images.*.image' => __('Each file must be an image.'),
            'images.*.mimes' => __('Images must be jpeg, png, or jpg format.'),
            'images.*.max' => __('Each image may not be greater than 2MB.'),
        ];
    }
}
