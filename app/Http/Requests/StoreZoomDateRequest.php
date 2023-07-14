<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreZoomDateRequest extends FormRequest
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
            'date' => ['required', 'date'],
            'time' => ['required', 'date_format:H:i'],
            'join_url' => ['required', 'url'],
            'password' => ['nullable', 'string'],
            'participants' => ['required', 'integer'],
        ];
    }

    public function messages(){
        return [
            'date.required' => 'Por favor ingrese una fecha',
            'date.date' => 'Por favor ingrese una fecha válida',
            'time.required' => 'Por favor ingrese una hora',
            'time.date_format' => 'Por favor ingrese una hora válida',
            'join_url.required' => 'Por favor ingrese una url de zoom',
            'join_url.url' => 'Por favor ingrese una url válida de zoom',
            'password.string' => 'Por favor ingrese una contraseña válida',
            'participants.required' => 'Por favor ingrese un número de participantes',
            'participants.integer' => 'Por favor ingrese un número de participantes válido',
        ];
    }
}
