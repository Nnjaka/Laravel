<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'        => ['required', 'string', 'max:255'],
            'email'       => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . Auth::id()],
            'password'    => ['required'],
            'newPassword' => ['required', 'string', 'min:8']
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute нужно заполнить'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'имя пользователя',
            'password' => 'пароль',
            'newPassword' => 'новый пароль'
        ];
    }
}
