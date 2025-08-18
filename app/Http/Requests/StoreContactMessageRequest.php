<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreContactMessageRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:1|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|min:1|max:255',
            'subject' => 'required|string|min:1|max:255',
            'message' => 'required|string|min:1|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'İsim alanı zorunludur.',
            'name.string' => 'İsim alanı geçerli bir metin olmalıdır.',
            'name.min' => 'İsim en az :min karakter olmalıdır.',
            'name.max' => 'İsim en fazla :max karakter olabilir.',

            'email.required' => 'E-posta alanı zorunludur.',
            'email.email' => 'Geçerli bir e-posta adresi giriniz.',
            'email.max' => 'E-posta en fazla :max karakter olabilir.',

            'subject.required' => 'Konu alanı zorunludur.',
            'subject.string' => 'Konu alanı geçerli bir metin olmalıdır.',
            'subject.min' => 'Konu en az :min karakter olmalıdır.',
            'subject.max' => 'Konu en fazla :max karakter olabilir.',

            'message.required' => 'Mesaj alanı zorunludur.',
            'message.string' => 'Mesaj alanı geçerli bir metin olmalıdır.',
            'message.min' => 'Mesaj en az :min karakter olmalıdır.',
            'message.max' => 'Mesaj en fazla :max karakter olabilir.',
        ];
    }
}
