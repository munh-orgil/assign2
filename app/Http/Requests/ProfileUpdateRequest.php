<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'reg_no' => ['nullable', 'regex:/^[а-яА-ЯөӨүҮ]{2}[0-9]{8}$/u'],
            'address' => ['nullable', 'string', 'max:255'],
            'phone_no' => ['nullable', 'regex:/^\d{8}$/u'],
        ];
    }
    public function messages(): array
    {
        return [
            'last_name.max' => 'Хүсэлт хэтэрхий урт байна',
            'first_name.max' => 'Хүсэлт хэтэрхий урт байна',
            'last_name.required' => 'Овог заавал оруулах шаардлагатай',
            'first_name.required' => 'Нэр заавал оруулах шаардлагатай',
            'address.max' => 'Хүсэлт хэтэрхий урт байна',
            'reg_no.regex' => 'Зөв регистерийн дугаар оруулна уу',
            'phone_no.regex' => 'Зөв утасны дугаар оруулна уу',
        ];
    }
}
