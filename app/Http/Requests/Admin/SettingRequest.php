<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

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
             $id = strpos(request()->route()->uri, 'update') ? ',' . request()->id : '';

        return [
            
        'name'=>'required',
        'description'=>'required',
        'logo'=>'required',
        'facebook'=>'required',
        'twiter'=>'required',
        'linked_in'=>'required',
        'youtube'=>'required',
        'phone'=>'required',
        'gmail'=>'required',
            //
        ];
    }
     public function messages()
    {
        return [
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            alert()->error(' ', $validator->errors()->first());
            return redirect()->back()->withErrors($validator)->withInput();
        });
    }
}
