<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferApplyStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'offer_id' => 'required|exists:offers,id',
            'job_id' => 'required|exists:jobs,id',
            'cover_letter' => 'nullable|string|max:500',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'offer_id.required' => 'Taklif tanlanishi shart.',
            'offer_id.exists' => 'Tanlangan taklif mavjud emas.',
            'job_id.required' => 'Ish e\'loni tanlanishi shart.',
            'job_id.exists' => 'Tanlangan ish e\'loni mavjud emas.',
            'cover_letter.max' => 'Cover letter maksimal 500 ta belgidan iborat bo\'lishi mumkin.',
        ];
    }
}
