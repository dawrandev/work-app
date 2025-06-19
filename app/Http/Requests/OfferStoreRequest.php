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
                'phone' => 'required|string|max:255',
                'category_id' => 'required|exists:categories,id',
                'subcategory_id' => 'required|exists:subcategories,id',
                'district_id' => 'required|exists:districts,id',
                'type_id' => 'required|exists:types,id',
                'salary_from' => 'required|numeric',
                'salary_to' => 'required|numeric',
                'address' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'service_images' => 'nullable|array',
                'service_images.*' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            ];
    }
    public function prepareForValidation()
    {
        $this->merge([
            'salary_from' => $this->normalizeNumber($this->salary_from),
            'salary_to' => $this->normalizeNumber($this->salary_to),
        ]);
    }
    public function normalizeNumber($value)
    {
        return str_replace(',', '', $value);
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
}
