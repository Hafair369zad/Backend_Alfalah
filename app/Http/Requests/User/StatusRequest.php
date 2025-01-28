<?php

namespace App\Http\Requests\User;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StatusRequest extends FormRequest
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
            'status' => ['required', 'string']
        ];
    
        if ($this->isMethod('post')) {
            $rules['status'][] = 'unique:statuses,status';
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            $statusId = $this->route('status');
            $rules['status'][] = Rule::unique('statuses', 'status')->ignore($statusId);
        }
    
        return $rules;
    }

    public function messages(): array
    {
        return [
            'status.required' => 'Status pengguna wajib diiisi.',
            'status.string' => 'Status pengguna harus berupa teks.',
            'status.unique' => 'Status pengguna sudah terdaftar.'
        ];
    }
}
