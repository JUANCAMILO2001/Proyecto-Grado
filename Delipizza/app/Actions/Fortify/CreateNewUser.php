<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

use App\Models\DocumentType;

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
            'names' => ['required', 'string', 'max:255'],
            'lastnames' => ['required', 'string', 'max:255'],
            'document_number' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required'],
            'phone' => ['required', 'string', 'max:255'],
            'document_type' => ['required', 'string', 'max:255'],
            'state_id' => '1',
        ])->validate();

        return User::create([
            'names' => $input['names'],
            'lastnames' => $input['lastnames'],
            'document_number' => $input['document_number'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'phone' => $input['phone'],
            'document_type' => $input['document_type'],
            'state_id' => '1',
        ]);
    }
}
