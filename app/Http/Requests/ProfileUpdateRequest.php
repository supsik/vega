<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['nullable', 'string', 'email', 'max:100'],

            'denyCalls' => ['nullable', 'boolean'],
            'denyEmail' => ['nullable', 'boolean'],
            'denySmsNotifications' => ['nullable', 'boolean'],
            'denySmsDispatches' => ['nullable', 'boolean'],
        ];
    }
}
