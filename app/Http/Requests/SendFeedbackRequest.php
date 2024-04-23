<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class SendFeedbackRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:50'],
            'lastname' => ['string', 'max:50'],
            'email' => ['required', 'email', 'max:225'],
            'tel' => ['required', 'regex:/^\+?\d+$/', 'max:50'],
            'otherContacts' => ['string', 'max:225'],
            'subject' => ['string', 'max:100'],
            'text' => ['required', 'string', 'max:3000'],
        ];
    }
}
