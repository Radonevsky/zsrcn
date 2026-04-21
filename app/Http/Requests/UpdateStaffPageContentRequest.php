<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStaffPageContentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'intro_text' => 'nullable|string|max:50000',
            'director_text' => 'nullable|string|max:50000',
            'roster' => 'present|array',
            'roster.*.kind' => 'required|string|in:section,person',
            'roster.*.title' => 'nullable|string|max:500',
            'roster.*.name' => 'nullable|string|max:500',
            'roster.*.position' => 'nullable|string|max:2000',
        ];
    }
}
