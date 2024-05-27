<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class DocumentStoreRequest extends FormRequest
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
            'document' => ['required', 'mimes:docx,doc,pdf'],
            'description' => ['nullable', 'string', 'max:10000']
        ];
    }

    public function messages()
    {
        return [
            'document.required' => 'Пожалуйста, загрузите документ',
            'document.mimes' => 'Разрешены только файлы с расширением: .doc или .pdf',
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new ValidationException($validator, response()->json([
            'error' => true,
            'message' => $validator->errors()->first(),
        ], 422));
    }
}
