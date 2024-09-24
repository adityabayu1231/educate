<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'fullname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['nullable', 'string', 'max:20', 'regex:/^(?:\+62|62|0)8[1-9][0-9]{6,11}$|^(?:\+62|62|0)2[1-9][0-9]{5,9}$/'],
            'role_id' => ['required', 'exists:roles,id'],
            'password' => $this->passwordRules(),
        ])->validate();

        return User::create([
            'fullname' => $input['fullname'],
            'email' => $input['email'],
            'phone_number' => $input['phone_number'] ?? null,
            'role_id' => $input['role_id'],
            'password' => Hash::make($input['password']),
            'is_active' => $input['is_active'] ?? true,
        ]);
    }
}
