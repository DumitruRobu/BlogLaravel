<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            "name" => "required|string",
            "email" => "required|string|email|unique:users,email,". $this->user_id,

            //v2 tot functional input type hidden din editUser.blade nici nu trebuie:
         // "email" => "required|email|unique:users,email,".$this->user->id,
            "role" => "required|integer",
            "user_id" => "required|integer|exists:users,id"
        ];
    }

    public function messages()
    {
        return [
            "name.required"=> "Populeaza cimpul nume",
            "name.string"=> "Cimpul nume trebuie sa fie in format text",

            "email.required"=> "Populeaza cimpul email",
            "email.string"=> "Cimpul email trebuie sa fie in format text",
            "email.email"=> "Cimpul email trebuie sa fie in format mail@mail.com",
            "email.unique"=> "Acest email deja este in folosinta",
        ];
    }
}
