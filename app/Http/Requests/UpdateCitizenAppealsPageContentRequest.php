<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCitizenAppealsPageContentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'schedule_rows' => 'sometimes|array',
            'schedule_rows.*.label' => 'nullable|string|max:2000',
            'schedule_rows.*.value' => 'nullable|string|max:10000',
            'legal_basis_items' => 'sometimes|array',
            'legal_basis_items.*' => 'nullable|string|max:2000',
        ];
    }
}
