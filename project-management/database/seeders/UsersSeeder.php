<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run()
    {
        // Creazione di un nuovo utente
        $user = new User();
        $user->name = 'John';
        $user->surname = 'Doe';
        $user->email = 'john@example.com';
        $user->password = Hash::make('password');
        $user->save();
    }
}