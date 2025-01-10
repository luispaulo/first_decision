<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterService
{
    public function registerUser(array $data)
    {
        $validator = Validator::make($data, [
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|email',
            'password' => 'required|string|min:6|max:20|confirmed',
        ], [
            'name.required' => 'O campo nome é obrigatório.',
            'name.min' => 'O nome deve ter pelo menos 3 caracteres.',
            'name.max' => 'O nome não pode ter mais de 50 caracteres.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'Insira um endereço de e-mail válido.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.min' => 'A senha deve ter no mínimo 6 caracteres.',
            'password.max' => 'A senha não pode ter mais de 20 caracteres.',
            'password.confirmed' => 'A confirmação de senha não corresponde.',
        ]);

        if ($validator->fails()) {
            return [
                'success' => false,
                'errors' => $validator->errors(),
            ];
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return [
            'success' => true,
            'message' => 'Usuário registrado com sucesso!',
            'data' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ],
        ];
    }

    public function listUsers()
    {
        $users = User::select('id', 'name', 'email', 'created_at')->paginate(10);

        return [
            'success' => true,
            'data' => $users,
        ];
    }
}
