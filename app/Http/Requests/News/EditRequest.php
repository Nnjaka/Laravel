<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

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
            'category_id' => ['required', 'integer', 'exists:news'],
            'source_id'   => ['required', 'integer', 'exists:sources,id'],
            'title'       => ['required', 'string', 'min:3', 'max:30'],
            'status'      => ['required', 'string', 'min:5', 'max:7'],
            'author'      => ['required', 'string'],
            'image'       => ['nullable', 'image', 'mimes:png,jpg,jpeg'],
            'description' => ['nullable', 'string'],
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
            'title' => 'заголовок'
        ];
    }
}
