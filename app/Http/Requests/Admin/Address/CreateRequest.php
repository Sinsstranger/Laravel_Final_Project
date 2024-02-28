<?php

namespace App\Http\Requests\Admin\Address;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'country' => ['required', 'string', 'min:3', 'max:50'],
            'place' => ['required', 'string', 'min:2', 'max:100'],
            'street'=> ['required', 'string', 'min:2', 'max:100'],
            'house_number' => ['required', 'integer', 'min:1', 'max:10000'],
            'flat_number' => ['required', 'integer', 'min:1', 'max:10000']
        ];
    }
}
