<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'email'      => ['required', 'string', 'max:100','unique:admins,email,'.$this->admin],
            'username'      => ['required', 'string', 'max:100','unique:admins,username,'.$this->admin],
            'phone'      => ['required', 'string', 'max:15','unique:admins,phone,'.$this->admin],
            'first_name' => ['required', 'string', 'max:50'],
            'last_name'  => ['nullable', 'string', 'max:50'],
            'provider'     => ['nullable', 'string', 'max:50'],
            'password' => ['required', 'string','max:50','min:6','confirmed'],
            'password_confirmation' => 'required',
            'type'       => ['nullable', 'string','max:50'],
            'image'         => ['nullable','mimes:png,jpg,svg','max:1024'],
            'status'     => ['nullable', 'string', 'max:50'],
            'role'     => ['nullable'],
        ];
        // For update
        if ($this->admin) {
            $rules['password'] = ['nullable','confirmed'];
            $rules['password_confirmation'] = ['nullable'];
            $rules['status'] = ['nullable', 'string', 'max:250'];
            $rules['image']           = ['nullable','image','mimes:jpeg,jpg,png','max:1024'];
            $rules['email'] = ['nullable'];
            $rules['phone'] = ['nullable'];
            $rules['username'] = ['nullable'];
            $rules['first_name'] = ['nullable'];
        }
        return $rules;
    }
}
