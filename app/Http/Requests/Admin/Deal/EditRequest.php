<?php

namespace App\Http\Requests\Admin\Deal;

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
            'property_id' => ['required', 'integer', 'min:1'],
            'tenant_id' => ['required', 'integer', 'min:1'],
            'rent_starts_at' => ['required', 'date'],
            'rent_ends_at' => ['required', 'date'],
            'rent_costs' => ['required', 'integer', 'min:100'],
            'guests' => ['required', 'integer', 'min:1', 'max:50'],
            'registration' => ['required', 'integer', 'min:0', 'max:1'],
            'status_id' => ['required', 'integer', 'min:1', 'max:5']
        ];
    }
}
