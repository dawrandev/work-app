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
            'district_id' => 'required|exists:districts,id',
            'description' => 'required|string',
            'salary_from' => 'numeric',
            'salary_to' => 'numeric|gt:salary_from',
            'deadline' => 'nullable|date',
            'images' => 'nullable|array|max:3',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'address' => 'string'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'salary_from' => $this->normalizeNumber($this->salary_from),
            'salary_to' => $this->normalizeNumber($this->salary_to),
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
}
