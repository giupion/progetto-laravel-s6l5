<?php

// database/seeders/ProjectSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\User;

class ProjectsSeeder extends Seeder
{
    public function run()
    {
        // Ottieni un utente casuale
        $user = User::inRandomOrder()->first();

        // Crea alcuni progetti per l'utente selezionato
        $projectsData = [
            [
                'title' => 'Calcolatore Interstellare',
                'description' => 'Serve per tracciare la rotta della navigazione interstellare',
                'languages_used' => json_encode(['PHP', 'JavaScript', 'HTML', 'CSS']),
                'user_id' => $user->id,
            ],
            [
                'title' => 'Macchina del Tempo',
                'description' => 'Abbastanza ovvio, ritornare indietro nel tempo per cambiare il destino del mondo',
                'languages_used' => json_encode(['Python', 'Java']),
                'user_id' => $user->id,
            ],
            // Aggiungi altri progetti se necessario
        ];

        foreach ($projectsData as $projectData) {
            Project::create($projectData);
        }
    }
}
