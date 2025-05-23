<?php

namespace App\Actions\Fortify;

use App\Models\Cart;
use App\Models\FavoritesList;
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
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'int', 'max:1000000000'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'lastName' => $input['lastName'],
            'phone' => $input['phone'],
            'password' => Hash::make($input['password']),
            'rol_id' => $input['rol_id'],
        ]);       

        FavoritesList::create([
            'user_id' => $user->id,
        ]);

        Cart::create([
            'user_id' => $user->id,
        ]);
        
        return $user;
    }
}
