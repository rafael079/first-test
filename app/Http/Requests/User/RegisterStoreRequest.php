<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class RegisterStoreRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:50', 'min:3'],
            'email' => ['required', 'string', 'email:rfc,dns', Rule::unique('users')],
            'password' => ['required', 'confirmed', 'max:20', Password::min(6)]
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'data' => $validator->errors()
        ], 422));
    }

    public function messages()
    {
        return [
            'name.required' => __('Nome é obrigatório'),
            'name.max' => __('Nome deve ter no máximo :max caracteres'),
            'email.required' => __('Email é obrigatório'),
            'email.email' => __('Email informado deve ser um email válido'),
            'email.unique' => __('Email informado já existe'),
            'password.required' => __('A Senha é obrigatório'),
            'password.max' => __('A Senha deve ter no máximo :max caracteres'),
            'password.min' => __('A Senha deve ter no mínimo :min caracteres'),
            'password.confirmed' => __('A Senha e a Confirmação devem ser idênticas'),
        ];
    }


}
