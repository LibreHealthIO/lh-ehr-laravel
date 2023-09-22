<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
    'username' => 'required|string|unique:users,username',
    'email' => 'nullable|email|unique:users,email',
    'first_name' => 'required|string',
    'middle_name' => 'nullable|string',
    'last_name' => 'required|string',
    'tax_id' => 'required|string|unique:users,federal_tax_id',
    'dea_number' => 'required|string|unique:users,federal_drug_id',
    'npi' => 'required|integer|unique:users,npi',
    'suffix' => 'required|string',
    'taxonomy' => 'required|string',
    'job_description' => 'nullable|string',
    'role' => 'required|string',
    'default_warehouse' => 'nullable|string',
    'default_facility' => 'required|string',
    'provider_type' => 'nullable|string',
    'license_number' => 'nullable|string',
    'additional_details' => 'nullable|string',
    ];
    }
    }
