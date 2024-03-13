<?php

// database/seeders/TaskSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\Project;

class TasksSeeder extends Seeder
{
    public function run()
    {
        // Ottieni tutti i progetti
        $projects = Project::all();

        // Per ogni progetto, crea alcune attività
        foreach ($projects as $project) {
            $tasksData = [
                [
                    'title' => 'Layout',
                    'description' => 'Costruire il layout del sito' . $project->id,
                    'completed' => false,
                    'project_id' => $project->id,
                ],
                [
                    'title' => 'Costruzione Backend del sito',
                    'description' => 'Costruzione Backend del sito' . $project->id,
                    'completed' => false,
                    'project_id' => $project->id,
                ],
                // Aggiungi altri task se necessario
            ];

            foreach ($tasksData as $taskData) {
                Task::create($taskData);
            }
        }
    }
}
