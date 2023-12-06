<?php

namespace App\Http\Requests\Admin\Property;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:3', 'max:50'],
            'category_id' => ['required', 'integer', 'min:1'],
            'number_of_rooms' => ['required', 'integer', 'min:1'],
            'number_of_guests' => ['required', 'integer', 'min:1'],
            'description' => ['required', 'string', 'min:3', 'max:3000'],
            'photo' => ['required', 'file'],
            'price_per_day' => ['required', 'integer', 'min:100'],
            'address_id' => ['required', 'integer', 'min:1'],
            'user_id' => ['required', 'integer', 'min:1'],
            'is_temporary_registration_possible' => ['required', 'integer', 'min:0', 'max:1'],
            'daily_rent' => ['required', 'integer', 'min:0', 'max:1']
        ];
    }
}
