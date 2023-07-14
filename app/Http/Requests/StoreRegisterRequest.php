<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'referral_code' => 'nullable|exists:referrals,code',
            'name' => 'required|string|max:255',
            'email' => 'email|required|string|max:255',
            'phone' => 'required|string|digits:10|numeric',
            'terms' => 'required|accepted',
        ];
    }

    public function messages(){
        return [
            'referral_code.exists' => 'Al parecer el código de referido no existe',
            'name.required' => 'Por favor ingrese su nombre',
            'email.required' => 'Por favor ingrese su correo electrónico',
            'phone.required' => 'Por favor ingrese su número de teléfono',
            'phone.digits' => 'Por favor ingrese un número de teléfono válido',
            'phone.numeric' => 'Por favor ingrese un número de teléfono válido',
            'terms.required' => 'Por favor acepte los términos y condiciones',
        ];
    }
}
