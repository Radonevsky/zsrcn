<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class DocumentReplaceRequest extends FormRequest
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
            'document' => ['required', 'file'],
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->hasFile('document')) {
                $extension = strtolower($this->file('document')->getClientOriginalExtension());
                $allowedExtensions = ['doc', 'xlsx', 'xls', 'docx', 'pdf'];

                if (!in_array($extension, $allowedExtensions)) {
                    $validator->errors()->add('document', 'Разрешены только файлы с расширением: .doc, .pdf, .xlsx, .xls, .docx');
                }
            }
        });
    }

    public function messages()
    {
        return [
            'document.required' => 'Пожалуйста, загрузите документ',
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
