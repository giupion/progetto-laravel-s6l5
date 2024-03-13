<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Visualizzazione dell'elenco di tutti i progetti
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    // Visualizzazione dei dettagli di un singolo progetto
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    // Creazione di un nuovo progetto (form)
    public function create()
    {
        return view('projects.create');
    }

    // Salva un nuovo progetto
    public function store(Request $request)
    {
        // Validazione dei dati inviati dal form
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            // Altri campi se necessario
        ]);

        // Creazione del nuovo progetto
        $project = Project::create($validatedData);

        return redirect()->route('projects.show', $project->id);
    }

    // Modifica di un progetto esistente (form)
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    // Aggiorna un progetto esistente
    public function update(Request $request, Project $project)
    {
        // Validazione dei dati inviati dal form
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            // Altri campi se necessario
        ]);

        // Aggiornamento del progetto
        $project->update($validatedData);

        return redirect()->route('projects.show', $project->id);
    }

    // Eliminazione di un progetto
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index');
    }
}