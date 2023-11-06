<?php

namespace App\Http\Requests;

use App\Models\Address;
use App\Models\Property;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PropertiesRequest extends FormRequest
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
        $tableNameProperties = (new Property())->getTable();
        $tableNameAddresses = (new Address())->getTable();
        $tableNameUsers = (new User())->getTable();
        return [
            'title' => ['required','string', 'max:255'],
            'category_id' => ['required', 'integer', "exists:{$tableNameProperties},id"],
            'description' => ['required', 'string', 'max:255'],
            'price_per_day' => ['required', 'numeric', 'regex:/^\d*(\.\d{1,2})?$/'],
            'address_id' => ['required', 'integer', "exists:{$tableNameAddresses},id"],
            'user_id' => ['required', 'integer', "exists:{$tableNameUsers},id"],
            'is_temporary_registration_possible' => ['nullable', 'boolean']
        ];
    }
}
