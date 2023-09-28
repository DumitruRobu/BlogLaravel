<?php

namespace App\Http\Requests\Admin\Post;

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
            "title"=>"required|string",
            "content"=>"required|string",
            "preview_image"=>"nullable",
            "main_image"=>"nullable",
            "category_id"=>"required|integer|exists:categories,id",
            "tag_ids"=>"nullable|array",
            "tag_ids.*"=>"nullable|integer|exists:tags,id", //Controlam ca valoarea fiecare element sa fie in prezenta in tabela tags, coloana id.

        ];
    }

    public function messages()
    {
        return [
            'title.required'=>"Denumirea trebuie sa fie populata",
            'title.string'=>"Denumirea/Titlul trebuie sa fie de tip text",

            'content.required'=>"Continutul trebuie sa fie populat",
            'content.string'=>"Continutul trebuie sa fie de tip text",

            'preview_image.required'=>"Imaginea de preview trebuie sa fie populata",
            'preview_image.file'=>"Imaginea de preview trebuie sa fie de tip file",

            'main_image.required'=>"Imaginea principala trebuie sa fie populata",
            'main_image.file'=>"Imaginea principala trebuie sa fie de tip file",

            'category_id.required'=>"Categoria trebuie sa fie populata",
            'category_id.integer'=>"Categoria trebuie sa fie de tip integer",
            'category_id.exists'=>"Categoria trebuie sa fie existenta in baza de date!",

            'tag_ids.array' =>"E necesar de trimis o lista de date!"
        ];
    }
}
