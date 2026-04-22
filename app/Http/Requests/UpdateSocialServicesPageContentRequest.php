<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSocialServicesPageContentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'regulation_text' => 'sometimes|nullable|string|max:50000',
            'round_clock_text' => 'sometimes|nullable|string|max:2000',
            'center_info_items' => 'sometimes|nullable|array|max:200',
            'center_info_items.*' => 'array',
            'center_info_items.*.id' => 'nullable',
            'center_info_items.*.title' => 'nullable|string|max:20000',
            'center_info_items.*.content' => 'nullable|string|max:20000',
        ];
    }
}
