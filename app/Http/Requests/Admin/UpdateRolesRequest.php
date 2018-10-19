<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateRolesRequest extends FormRequest
{
    public function __construct(Request $request)
    {
        /*
         * Initialize variables
         */
    }
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
            'role_name' => 'required|unique:roles,name,' . $this->route('role'),
        ];
    }
    /**
     * Get the validation message that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'role_name.required' => trans('label.role_field_required_error_msg'),
        ];
    }
}
