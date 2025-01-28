<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'class_id' => ['required', 'integer', 'exists:classes,id'],
            'nis' => ['required', 'string', 'min:8', 'max:12', 'unique:students,npm'],
            'full_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'regex:/^[0-9]{10,15}$/'],
            'address' => ['required', 'string', 'max:500'],
            'entry_year' => ['required', 'integer', 'digits:4'],
            'parent_name' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages():array
    {
        return [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email tidak boleh lebih dari :max karakter.',
            'email.unique' => 'Email ini sudah terdaftar, gunakan email lainnya.',

            'password.required' => 'Kata sandi wajib diisi.',
            'password.string' => 'kata sandi harus berupa teks.',
            'password.min' => 'Kata sandi harus memiliki minimal :min karakter',
            'password.confirmed' => 'Konfirmasi kata sandi tidak sesuai.',

            'class_id.required' => 'Kelas wajib diisi.',
            'class_id.integer' => 'Kelas harus berupa angka.',
            'class_id.exists' => 'Kelas yang dipilih tidak valid.',

            'nis.required' => 'NIS wajib diisi.',
            'nis.string' => 'NIS harus berupa teks.',
            'nis.min' => 'NIS harus memiliki minimal :min karakter.',
            'nis.max' => 'NIS tidak boleh lebih dari :max karakter.',
            'nis.unique' => 'NIS ini sudah terdaftar.',

            'full_name.required' => 'Nama lengkap wajib diisi.',
            'full_name.string' => 'Nama lengkap harus berupa teks.',
            'full_name.max' => 'Nama lengkap tidak boleh lebih dari :max karakter.',

            'phone.required' => 'Nomor telepon wajib diisi.',
            'phone.string' => 'Nomor telepon harus berupa teks.',
            'phone.regex' => 'Format nomor telepon tidak valid.',

            'address.required' => 'Alamat wajib diisi.',
            'address.string' => 'Alamat harus berupa teks.',
            'address.max' => 'Alamat tidak boleh lebih dari :max karakter.',

            'entry_year.required' => 'Tahun masuk wajib diisi.',
            'entry_year.integer' => 'Tahun masuk harus berupa angka.',
            'entry_year.digits' => 'Tahun masuk harus terdiri dari 4 digit.',

            'parent_name.required' => 'Nama lengkap Orang Tua wajib diisi.',
            'parent_name.string' => 'Nama lengkap Orang Tua harus berupa teks.',
            'parent_name.max' => 'Nama lengkap Orang Tua tidak boleh lebih dari :max karakter.',
        ];
    }
}
