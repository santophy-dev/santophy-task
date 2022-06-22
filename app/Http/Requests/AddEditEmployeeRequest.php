<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddEditEmployeeRequest extends FormRequest
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
        if(!empty(request()->id)){
            return [
                    'name' => 'required|max:30',
                    'date_of_birth' => 'required',
                    // 'email' => 'required|check_email_format|check_email_unique',
                    'email' => 'required|check_email_format|unique:users,email,'.$this->id,
                    'phone' => 'required|phone_format',
                    'address' => 'required|max:200',
                    'image' => 'nullable|image|mimes:png,jpg'                
                ];
        } else {
            return [
                    'name' => 'required|max:30',
                    'date_of_birth' => 'required',
                    // 'email' => 'required|check_email_format|check_email_unique',
                    'email' => 'required|check_email_format|unique:users,email',
                    'phone' => 'required|phone_format',
                    'address' => 'required|max:200',
                    'image' => 'required|image|mimes:png,jpg'                
                ];
        }
    }

    public function messages() {
        return [
            'email.required' => 'The email is required.',
            'email.check_email_format' => 'The email should be valid.',
            'email.check_email_unique' => 'The email is already registered.',
            'phone.phone_format' => 'The phone number is not valid.',
            'image.required' => 'Image is required.',
            'image.mimes' => 'Image should be in jpg or png format.',
            'image.max' => 'Image max file size should be 5 MB.',
        ];
    }    
}
