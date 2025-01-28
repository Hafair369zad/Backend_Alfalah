<?php

namespace App\Http\Requests\User;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
        $rules = [
            'role' => ['required', 'string']
        ];

        if ($this->isMethod('post')) {
            $rules['role'][] = 'unique:roles,role';
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            $roleId = $this->route('role');
            $rules['role'][] = Rule::unique('roles', 'role')->ignore($roleId);
        }
        
        return $rules;
    }

    public function messages(): array
    {
        return [
            'role.required' => 'Peran pengguna wajib diiisi.',
            'role.string' => 'Peran pengguna harus berupa teks.',
            'role.unique' => 'Peran pengguna sudah terdaftar.'
        ];
    }
}
