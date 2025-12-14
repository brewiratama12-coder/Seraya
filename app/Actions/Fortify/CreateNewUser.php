<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

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
          'username' => ['required', 'string', 'max:255', 'unique:users'],
        'nama_lengkap' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)],
        'password' => $this->passwordRules(),
        'no_hp' => ['required', 'string', 'max:15'],
        ])->validate();

        return User::create([
           'username' => $input['username'],
        'nama_lengkap' => $input['nama_lengkap'],
        'email' => $input['email'],
        'no_hp' => $input['no_hp'],
        'password' => Hash::make($input['password']),
        'role' => 'user',
        ]);
    }
}
