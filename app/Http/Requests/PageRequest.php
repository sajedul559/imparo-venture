<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            'title'                  => ['required', 'string', 'max:100','unique:projects,title,'.$this->project],
            'slug'                   => ['nullable', 'max:100'],
            'feature_id'             =>['required'],
            'category_id'            =>['required'],
            'project_address'        =>['nullable'],
            'content'               => ['nullable'],
            'image'                 => ['nullable'],
            'images'                 => ['nullable'],
            'overview_text'         => ['nullable', 'string'],
            'overview_title'        => ['nullable', 'string'],
            'overview_description'  => ['nullable'],
            'status'                => ['required', 'string', 'max:50'],
            //home page 
            "specification"         =>['nullable'],
            "specific_image"        => ['nullable'],
            "specification_key"     => ['nullable', 'string'],
            "specification_value"   => ['nullable', 'string'],
            "feature_title"         => ['nullable', 'string'],
            "feature_description"   => ['nullable', 'string'],
            "galleryImage"          => ['nullable'],
            'old'           => ['nullable'],
            "progress"         =>['nullable'],

            'progress_title' => ['required', 'string', 'max:100'],
            'progress_description' => ['required', 'string', 'max:2000'],
            'progress_name' => ['nullable', 'string', 'max:100'],
            'progress_status' => ['nullable', 'string', 'max:100'],
            'progress_images' => ['nullable'],
            'progress_images_old'  =>['nullable'],


        ];
         // For update
         if ($this->project) {
            $rules['category_id'] = ['nullable'];
            $rules['progress_description'] = ['nullable', 'string', 'max:2000'];
            $rules['progress_title'] = ['nullable', 'string', 'max:100'];
            $rules['title'] = ['nullable','string', 'max:100'];
            $rules['feature_id'] = ['nullable'];
        }
        return $rules;

        















    }
}
