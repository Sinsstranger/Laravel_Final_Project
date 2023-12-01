<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'first_name' =>['required','string', 'max:150'],
            'last_name'=>['required','string', 'max:150'],
            'phone' =>['required', 'string', 'max:20'],

        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Юзернэйм',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'email' => 'Адрес электронной почты',
            'phone' => 'Телефон',
        ];
    }
}
