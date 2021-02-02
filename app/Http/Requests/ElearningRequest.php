<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ElearningRequest extends FormRequest
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
            
                'name'=>'required|max:191|min:3',
                'email'=>'required|max:191|min:12',
                'password'=>'required|max:191|min:8',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Name n\'est peut  pas vide obigatoire',
            'email.required'=>'Email n\'est peut  pas vide obigatoire',
            'password.required'=>'Password n\'est peut  pas vide obigatoire',
            'name.min'=>'Name au moins 3 character',
            'email.min'=>'Email au moinss 13 charctaire',
            'password.min'=>'Password ua moins 8 ',
            'name.max'=>'Votre name est plus long veuiller au plus 191 characters',
            'email.max'=>'Votre email est plus long veuiller au plus 191 characters',
            'password.max'=>'Votre mot de pass est plus long veuiller au plus 191 characters ',

        ];
    }
}
