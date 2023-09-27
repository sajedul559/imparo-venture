<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
        return [
            'title'                  => ['required', 'string', 'max:100','unique:projects,title,'.$this->company],
            'slug'                   => ['nullable', 'max:100'],
            'content'               => ['nullable'],
            'image'                 => ['nullable'],
            
            'status'                => ['required', 'string', 'max:50'],
          

            'intro_title' => ['required', 'string', 'max:100'],
            'intro_description' => ['required', 'string', 'max:2000'],
            'intro_image' => ['nullable'],


            "gallery"         =>['nullable'],

            'gallery_title' => ['nullable', 'string', 'max:100'],
            'gallery_description' => ['nullable', 'string', 'max:2000'],
            'gallery_images' => ['nullable'],
            'gallery_images_old' => ['nullable'],
            


        ];
         // For update
         if ($this->project) {
            $rules['category_id'] = ['nullable'];
            $rules['intro_description'] = ['nullable', 'string', 'max:2000'];
            $rules['gallery_title'] = ['nullable', 'string', 'max:100'];
            $rules['title'] = ['nullable','string', 'max:100'];
            $rules['feature_id'] = ['nullable'];
        }
        return $rules;

        















    }
}
