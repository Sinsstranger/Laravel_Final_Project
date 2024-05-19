<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class DealsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            'rent_start_and_end' => 'required|string',
            'registration' => 'required|boolean',
            'guests' => 'required|integer|max:15',
            'property_id' => 'required|integer|exists:properties,id',
            'tenant_id' => 'required|integer|exists:users,id',
        ];
    }
}
