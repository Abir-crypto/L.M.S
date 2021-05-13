<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
        if($this->session()->has('librarian_id')) {
            return [
                'book_name' => 'required',
                'genre' => 'required',
                'author' => 'required',
                'count' => 'required',
            ];
        }
        else{
            return [
                'book_name' => 'required',
                'genre' => 'required',
                'author' => 'required',
            ];
        }
    }
}
