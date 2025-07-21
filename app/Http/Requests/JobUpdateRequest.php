<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobUpdateRequest extends FormRequest
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
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'nullable|exists:subcategories,id',
            'type_id' => 'required|exists:types,id',
            'employment_type_id' => 'required|exists:employment_types,id',
            'district_id' => 'nullable|exists:districts,id',
            'phone' => 'nullable|string',
            'salary_from' => 'nullable|numeric|min:0',
            'salary_to' => 'nullable|numeric|min:0|gte:salary_from',
            'deadline' => 'nullable|date',
            'status' => 'required|string',
            'address' => 'required|string',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'description' => 'required|string',
            'images' => 'nullable|array|max:3',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:5120',
            'delete_images' => 'nullable|array',
            'delete_images.*' => 'numeric|exists:images,id',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $job = $this->route('job');

            if ($job) {
                $currentImagesCount = $job->images()->count();

                $deleteImagesCount = is_array($this->delete_images) ? count($this->delete_images) : 0;

                $newImagesCount = $this->hasFile('images') ? count($this->file('images')) : 0;

                $finalImagesCount = $currentImagesCount - $deleteImagesCount + $newImagesCount;

                if ($finalImagesCount > 3) {
                    $validator->errors()->add('images', __('Maximum 3 images allowed. You currently have :current images, deleting :delete, and trying to add :new. Final count would be :final.', [
                        'current' => $currentImagesCount,
                        'delete' => $deleteImagesCount,
                        'new' => $newImagesCount,
                        'final' => $finalImagesCount
                    ]));
                }
            }
        });
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'salary_from' => $this->normalizeNumber($this->salary_from),
            'salary_to' => $this->normalizeNumber($this->salary_to)
        ]);
    }

    private function normalizeNumber($value)
    {
        return $value ? (int)str_replace(' ', '', $value) : null;
    }
    public function messages(): array
    {
        return [
            'title.required' => __('The title field is required.'),
            'title.string' => __('The title must be a string.'),
            'title.max' => __('The title may not be greater than 255 characters.'),

            'category_id.required' => __('Please select a category.'),
            'category_id.exists' => __('The selected category is invalid.'),

            'subcategory_id.exists' => __('The selected subcategory is invalid.'),

            'type_id.required' => __('Please select a type.'),
            'type_id.exists' => __('The selected type is invalid.'),

            'employment_type_id.required' => __('Please select an employment type.'),
            'employment_type_id.exists' => __('The selected employment type is invalid.'),

            'district_id.exists' => __('The selected district is invalid.'),

            'phone.string' => __('The phone number must be a string.'),

            'salary_from.numeric' => __('The salary from must be a number.'),
            'salary_from.min' => __('The salary from must be at least 0.'),
            'salary_to.numeric' => __('The salary to must be a number.'),
            'salary_to.min' => __('The salary to must be at least 0.'),
            'salary_to.gte' => __('The salary to must be greater than or equal to salary from.'),

            'deadline.date' => __('The deadline must be a valid date.'),

            'status.required' => __('The status field is required.'),
            'status.string' => __('The status must be a string.'),

            'address.required' => __('The address field is required.'),
            'address.string' => __('The address must be a string.'),

            'latitude.numeric' => __('The latitude must be a number.'),
            'latitude.between' => __('The latitude must be between -90 and 90.'),
            'longitude.numeric' => __('The longitude must be a number.'),
            'longitude.between' => __('The longitude must be between -180 and 180.'),

            'description.required' => __('The description field is required.'),
            'description.string' => __('The description must be a string.'),

            'images.array' => __('Images must be an array.'),
            'images.max' => __('You can upload maximum 3 images.'),
            'images.*.image' => __('Each file must be an image.'),
            'images.*.mimes' => __('Images must be jpeg, png, jpg, or gif format.'),
            'images.*.max' => __('Each image may not be greater than 5MB.'),

            'delete_images.array' => __('Delete images must be an array.'),
            'delete_images.*.numeric' => __('Delete image ID must be a number.'),
            'delete_images.*.exists' => __('The selected image does not exist.'),
        ];
    }
}
