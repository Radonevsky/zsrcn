<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactsContentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            '*.department' => 'required|string|max:2000',
            '*.work_time' => 'required|string|max:255',
            '*.role_info' => 'required|string|max:5000',
            '*.phone' => 'required|string|max:255',
            '*.email' => 'nullable|string|max:255',
            '*.sort_order' => 'nullable|integer|min:0|max:100000',
        ];
    }
}
