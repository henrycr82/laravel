<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'body' => 'required|min:5',
        ];
    }

    //con este metodo coloco los mensajes de error en español
    /*public function messages()
    {
        return [
           'title.required' => 'El título de la nota es obligatorio',
           'body.required' => 'El contenido de la nota es obligatorio',
           'body.min' => 'El contenido debe tener un mínimo de :min caracteres'
        ];
    }*/
}
