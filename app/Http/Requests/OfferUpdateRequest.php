<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferUpdateRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
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
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'delete_images' => 'nullable|array',
            'delete_images.*' => 'nullable|exists:offer_images,id',
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

    public function messages()
    {
        return [
            'title.required' => 'Kasb nomi majburiy.',
            'title.string' => 'Kasb nomi matn bo\'lishi kerak.',
            'title.max' => 'Kasb nomi 255 ta belgidan oshmasligi kerak.',

            'phone.required' => 'Telefon raqami majburiy.',
            'phone.string' => 'Telefon raqami matn bo\'lishi kerak.',
            'phone.max' => 'Telefon raqami 255 ta belgidan oshmasligi kerak.',

            'category_id.required' => 'Kategoriya tanlash majburiy.',
            'category_id.exists' => 'Tanlangan kategoriya mavjud emas.',

            'subcategory_id.required' => 'Subkategoriya tanlash majburiy.',
            'subcategory_id.exists' => 'Tanlangan subkategoriya mavjud emas.',

            'district_id.required' => 'Tuman tanlash majburiy.',
            'district_id.exists' => 'Tanlangan tuman mavjud emas.',

            'type_id.required' => 'Ish turi tanlash majburiy.',
            'type_id.exists' => 'Tanlangan ish turi mavjud emas.',

            'employment_type_id.required' => 'Bandlik turi tanlash majburiy.',
            'employment_type_id.exists' => 'Tanlangan bandlik turi mavjud emas.',

            'salary_from.required' => 'Maosh (dan) majburiy.',
            'salary_from.numeric' => 'Maosh (dan) raqam bo\'lishi kerak.',

            'salary_to.required' => 'Maosh (gacha) majburiy.',
            'salary_to.numeric' => 'Maosh (gacha) raqam bo\'lishi kerak.',

            'address.required' => 'Manzil majburiy.',
            'address.string' => 'Manzil matn bo\'lishi kerak.',
            'address.max' => 'Manzil 255 ta belgidan oshmasligi kerak.',

            'description.required' => 'Tavsif majburiy.',
            'description.string' => 'Tavsif matn bo\'lishi kerak.',
            'description.max' => 'Tavsif 255 ta belgidan oshmasligi kerak.',

            'images.array' => 'Rasmlar massiv bo\'lishi kerak.',
            'images.max' => 'Maksimal 3 ta rasm yuklash mumkin.',

            'images.*.image' => 'Fayl rasm bo\'lishi kerak.',
            'images.*.mimes' => 'Rasm formati jpeg, png, jpg yoki gif bo\'lishi kerak.',
            'images.*.max' => 'Rasm hajmi 2MB dan oshmasligi kerak.',

            'delete_images.array' => 'O\'chiriladigan rasmlar massiv bo\'lishi kerak.',
            'delete_images.*.exists' => 'O\'chiriladigan rasm mavjud emas.',

            'salary_to' => 'Maosh "gacha" qiymati maosh "dan" qiymatidan katta yoki teng bo\'lishi kerak.',
        ];
    }
}
