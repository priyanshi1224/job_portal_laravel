<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'username' => 'required',
            'useremail' => 'required|email|unique:users,email',
            'password' => 'required|min:6|same:cpassword',
            'cpassword' => 'required:'
        ];
    }
    public function attributes()
    {
        return [
            'username' => 'User Name',
            'useremail' => 'Email Address',
            'cpassword' => 'Conform Password',

        ];
    }

    protected $stopOnFirstFailure = true;
}
