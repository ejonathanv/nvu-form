<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReferralRequest extends FormRequest
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

        $user = request()->route('referral')->user;
        $referral = request()->route('referral');

        return [
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
            'password' => ['sometimes', 'nullable', 'min:8'],
            'code' => ['required', 'string', 'max:255', 'min:3', 'unique:referrals,code,' . $referral->id],
        ];
    }
}
