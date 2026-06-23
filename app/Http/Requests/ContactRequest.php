<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'inquiry_type' => ['required', 'in:general,collaboration,tourism_board,hotel_partnership,brand_collaboration,business'],
            'message' => ['required', 'string', 'max:5000'],
        ];
    }
}
