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
            'type_id' => 'required|exists:types,id',
            'district_id' => 'required|exists:districts,id',
            'description' => 'required|string',
            'salary_from' => 'numeric',
            'salary_to' => 'numeric',
            'deadline' => 'nullable|date',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:3',
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
}
