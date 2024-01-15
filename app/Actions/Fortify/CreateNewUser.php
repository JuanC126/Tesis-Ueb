<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Validation\ValidationException;
use App\Notifications\WelcomeNotification;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;
    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'terms_accepted' => 'required|accepted', 
    ];
    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        try {
            // Utilizar Validator::make para realizar la validación
            $validator = Validator::make($input, $this->rules);

            // Verificar si hay errores en la validación
            if ($validator->fails()) {
                throw ValidationException::withMessages([
                    'terms_accepted' => ['Debe aceptar los términos y condiciones.'],
                ]);
            }

            // Crear el usuario si la validación pasa
            $user = User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'terms_accepted' => $input['terms_accepted'],
            ]);

            $user->notify(new WelcomeNotification());

            return $user;
            

        } catch (ValidationException $e) {
            // Capturar la excepción de validación y manejarla según sea necesario
            throw $e;
        }

        
    }
        
    }

