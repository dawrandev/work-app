<?php


/*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

return [
    'current_password' => 'Joriy parol noto‘g‘ri.',
    'date' => ':attribute maydoni to‘g‘ri sana bo‘lishi kerak.',
    'date_equals' => ':attribute maydoni :date sana bilan teng bo‘lishi kerak.',
    'date_format' => ':attribute maydoni :format formatiga mos kelishi kerak.',
    'decimal' => ':attribute maydoni :decimal kasr sonlardan iborat bo‘lishi kerak.',
    'declined' => ':attribute maydoni rad etilishi kerak.',
    'declined_if' => ':attribute maydoni rad etilishi kerak, qachonki :other :value ga teng bo‘lsa.',
    'different' => ':attribute va :other maydonlari har xil bo‘lishi kerak.',
    'digits' => ':attribute maydoni :digits ta raqamdan iborat bo‘lishi kerak.',
    'digits_between' => ':attribute maydoni :min dan :max gacha raqamlardan iborat bo‘lishi kerak.',
    'dimensions' => ':attribute maydoni noto‘g‘ri rasm o‘lchamlariga ega.',
    'distinct' => ':attribute maydonida takroriy qiymat mavjud.',
    'doesnt_end_with' => ':attribute maydoni quyidagilardan biri bilan tugamasligi kerak: :values.',
    'doesnt_start_with' => ':attribute maydoni quyidagilardan biri bilan boshlanmasligi kerak: :values.',
    'email' => ':attribute maydoni to‘g‘ri elektron pochta manzili bo‘lishi kerak.',
    'ends_with' => ':attribute maydoni quyidagilardan biri bilan tugashi kerak: :values.',
    'enum' => 'Tanlangan :attribute yaroqsiz.',
    'exists' => 'Tanlangan :attribute yaroqsiz.',
    'extensions' => ':attribute maydoni quyidagi kengaytmalardan biriga ega bo‘lishi kerak: :values.',
    'file' => ':attribute maydoni fayl bo‘lishi kerak.',
    'filled' => ':attribute maydoni qiymatga ega bo‘lishi kerak.',
    'gt' => [
        'array' => ':attribute maydoni :value tadan ko‘p elementlardan iborat bo‘lishi kerak.',
        'file' => ':attribute maydoni :value kilobaytdan katta bo‘lishi kerak.',
        'numeric' => ':attribute maydoni :value dan katta bo‘lishi kerak.',
        'string' => ':attribute maydoni :value belgidan uzun bo‘lishi kerak.',
    ],
    'gte' => [
        'array' => ':attribute maydoni kamida :value ta elementdan iborat bo‘lishi kerak.',
        'file' => ':attribute maydoni kamida :value kilobayt bo‘lishi kerak.',
        'numeric' => ':attribute maydoni kamida :value bo‘lishi kerak.',
        'string' => ':attribute maydoni kamida :value belgidan iborat bo‘lishi kerak.',
    ],
    'hex_color' => ':attribute maydoni to‘g‘ri hex rang bo‘lishi kerak.',
    'image' => ':attribute maydoni rasm bo‘lishi kerak.',
    'in' => 'Tanlangan :attribute yaroqsiz.',
    'in_array' => ':attribute maydoni :other ichida mavjud bo‘lishi kerak.',
    'integer' => ':attribute maydoni butun son bo‘lishi kerak.',
    'ip' => ':attribute maydoni to‘g‘ri IP manzil bo‘lishi kerak.',
    'ipv4' => ':attribute maydoni to‘g‘ri IPv4 manzil bo‘lishi kerak.',
    'ipv6' => ':attribute maydoni to‘g‘ri IPv6 manzil bo‘lishi kerak.',
    'json' => ':attribute maydoni to‘g‘ri JSON satr bo‘lishi kerak.',
    'lowercase' => ':attribute maydoni kichik harflarda bo‘lishi kerak.',
    'lt' => [
        'array' => ':attribute maydoni :value tadan kam elementlardan iborat bo‘lishi kerak.',
        'file' => ':attribute maydoni :value kilobaytdan kichik bo‘lishi kerak.',
        'numeric' => ':attribute maydoni :value dan kichik bo‘lishi kerak.',
        'string' => ':attribute maydoni :value belgidan qisqa bo‘lishi kerak.',
    ],
    'lte' => [
        'array' => ':attribute maydoni :value tadan oshmasligi kerak.',
        'file' => ':attribute maydoni :value kilobayt yoki undan kam bo‘lishi kerak.',
        'numeric' => ':attribute maydoni :value yoki undan kam bo‘lishi kerak.',
        'string' => ':attribute maydoni :value belgidan oshmasligi kerak.',
    ],
    'mac_address' => ':attribute maydoni to‘g‘ri MAC manzil bo‘lishi kerak.',
    'max' => [
        'array' => ':attribute maydoni :max tadan ko‘p elementlardan iborat bo‘lmasligi kerak.',
        'file' => ':attribute maydoni :max kilobaytdan katta bo‘lmasligi kerak.',
        'numeric' => ':attribute maydoni :max dan katta bo‘lmasligi kerak.',
        'string' => ':attribute maydoni :max belgidan uzun bo‘lmasligi kerak.',
    ],
    'max_digits' => ':attribute maydoni :max tadan ko‘p raqamlardan iborat bo‘lmasligi kerak.',
    'mimes' => ':attribute maydoni quyidagi turdagi fayl bo‘lishi kerak: :values.',
    'mimetypes' => ':attribute maydoni quyidagi turdagi fayl bo‘lishi kerak: :values.',
    'min' => [
        'array' => ':attribute maydoni kamida :min ta elementdan iborat bo‘lishi kerak.',
        'file' => ':attribute maydoni kamida :min kilobayt bo‘lishi kerak.',
        'numeric' => ':attribute maydoni kamida :min bo‘lishi kerak.',
        'string' => ':attribute maydoni kamida :min belgidan iborat bo‘lishi kerak.',
    ],
    'min_digits' => ':attribute maydoni kamida :min ta raqamdan iborat bo‘lishi kerak.',
    'missing' => ':attribute maydoni mavjud bo‘lmasligi kerak.',
    'missing_if' => ':attribute maydoni mavjud bo‘lmasligi kerak, qachonki :other :value ga teng bo‘lsa.',
    'missing_unless' => ':attribute maydoni mavjud bo‘lmasligi kerak, agar :other :value ga teng bo‘lmasa.',
    'missing_with' => ':attribute maydoni mavjud bo‘lmasligi kerak, qachonki :values mavjud bo‘lsa.',
    'missing_with_all' => ':attribute maydoni mavjud bo‘lmasligi kerak, qachonki :values mavjud bo‘lsa.',
    'multiple_of' => ':attribute maydoni :value ga karrali bo‘lishi kerak.',
    'not_in' => 'Tanlangan :attribute yaroqsiz.',
    'not_regex' => ':attribute maydoni formati yaroqsiz.',
    'numeric' => ':attribute maydoni raqam bo‘lishi kerak.',
    'password' => [
        'letters' => ':attribute maydoni kamida bitta harfdan iborat bo‘lishi kerak.',
        'mixed' => ':attribute maydoni kamida bitta katta va bitta kichik harfdan iborat bo‘lishi kerak.',
        'numbers' => ':attribute maydoni kamida bitta raqamdan iborat bo‘lishi kerak.',
        'symbols' => ':attribute maydoni kamida bitta belgidan iborat bo‘lishi kerak.',
        'uncompromised' => 'Bu :attribute malumotlar sizdigida paydo bo‘lgan. Iltimos, boshqa :attribute tanlang.',
    ],
    'present' => ':attribute maydoni mavjud bo‘lishi kerak.',
    'present_if' => ':attribute maydoni mavjud bo‘lishi kerak, qachonki :other :value ga teng bo‘lsa.',
    'present_unless' => ':attribute maydoni mavjud bo‘lishi kerak, agar :other :value ga teng bo‘lmasa.',
    'present_with' => ':attribute maydoni mavjud bo‘lishi kerak, qachonki :values mavjud bo‘lsa.',
    'present_with_all' => ':attribute maydoni mavjud bo‘lishi kerak, qachonki :values mavjud bo‘lsa.',
    'prohibited' => ':attribute maydoni taqiqlangan.',
    'prohibited_if' => ':attribute maydoni taqiqlangan, qachonki :other :value ga teng bo‘lsa.',
    'prohibited_unless' => ':attribute maydoni taqiqlangan, agar :other :values ichida bo‘lmasa.',
    'prohibits' => ':attribute maydoni :other ning mavjud bo‘lishini taqiqlaydi.',
    'regex' => ':attribute maydoni formati yaroqsiz.',
    'required' => ':attribute maydoni to‘ldirilishi shart.',
    'required_array_keys' => ':attribute maydoni quyidagi kalitlarni o‘z ichiga olishi kerak: :values.',
    'required_if' => ':attribute maydoni to‘ldirilishi shart, qachonki :other :value ga teng bo‘lsa.',
    'required_if_accepted' => ':attribute maydoni to‘ldirilishi shart, qachonki :other qabul qilingan bo‘lsa.',
    'required_unless' => ':attribute maydoni to‘ldirilishi shart, agar :other :values ichida bo‘lmasa.',
    'required_with' => ':attribute maydoni to‘ldirilishi shart, qachonki :values mavjud bo‘lsa.',
    'required_with_all' => ':attribute maydoni to‘ldirilishi shart, qachonki :values mavjud bo‘lsa.',
    'required_without' => ':attribute maydoni to‘ldirilishi shart, qachonki :values mavjud bo‘lmasa.',
    'required_without_all' => ':attribute maydoni to‘ldirilishi shart, qachonki :values mavjud bo‘lmasa.',
    'same' => ':attribute va :other maydonlari bir xil bo‘lishi kerak.',
    'size' => [
        'array' => ':attribute maydoni :size ta elementdan iborat bo‘lishi kerak.',
        'file' => ':attribute maydoni :size kilobayt bo‘lishi kerak.',
        'numeric' => ':attribute maydoni :size bo‘lishi kerak.',
        'string' => ':attribute maydoni :size belgidan iborat bo‘lishi kerak.',
    ],
    'starts_with' => ':attribute maydoni quyidagilardan biri bilan boshlanishi kerak: :values.',
    'string' => ':attribute maydoni satr bo‘lishi kerak.',
    'timezone' => ':attribute maydoni to‘g‘ri vaqt mintaqasi bo‘lishi kerak.',
    'unique' => 'Bu :attribute allaqachon mavjud.',
    'uploaded' => ':attribute yuklab olinmadi.',
    'uppercase' => ':attribute maydoni katta harflarda bo‘lishi kerak.',
    'url' => ':attribute maydoni to‘g‘ri URL bo‘lishi kerak.',
    'ulid' => ':attribute maydoni to‘g‘ri ULID bo‘lishi kerak.',
    'uuid' => ':attribute maydoni to‘g‘ri UUID bo‘lishi kerak.',
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'maxsus-xabar',
        ],
    ],
];
