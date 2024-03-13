<?php
// database/seeders/UserSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    public function run()
    {
        // Crea alcuni utenti con dati predefiniti
        $usersData = [
            [
                'name' => 'Giuseppe',
                'surname' => 'Sansone',
                'email' => 'giuseppe@example.com',
                'password' => bcrypt('password'),
                'languages_known' => json_encode(['PHP', 'JavaScript']),
                'seniority' => 'Senior',
            ],
            [
                'name' => 'Jane',
                'surname' => 'Doe',
                'email' => 'jane@example.com',
                'password' => bcrypt('password'),
                'languages_known' => json_encode(['Java', 'Python']),
                'seniority' => 'Junior',
            ],
            // Aggiungi altri utenti se necessario
        ];

        foreach ($usersData as $userData) {
            // Verifica se l'utente con la stessa email esiste già nel database
            if (!User::where('email', $userData['email'])->exists()) {
                User::create($userData);
            }
        }
    }
}