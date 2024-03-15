<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    // Visualizzazione dell'elenco di tutti i progetti
    public function index()
    {
        // Recupera l'ID dell'utente corrente
        $userId = auth()->id();

        // Recupera solo i progetti dell'utente corrente
        $projects = Project::where('user_id', $userId)->get();

        return view('projects.index', compact('projects'));
    }

    // Visualizzazione dei dettagli di un singolo progetto
    public function show(Project $project)
    {
        $project->load('tasks');
        return view('projects.show', compact('project'));
    }

    // Creazione di un nuovo progetto (form)
    public function create()
    {
        return view('projects.create');
    }
//mio
    // Salva un nuovo progetto
    public function store(Request $request)
    {
        // Validazione dei dati inviati dal form
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'language_used' => 'nullable|string',
            'start_date' => 'nullable|date',
            'expire_date' => 'nullable|date',
        ]);
    
        // Aggiungi l'ID dell'utente autenticato ai dati validati
        $validatedData['user_id'] = Auth::id();
    
        // Crea un nuovo progetto con i dati validati
        Project::create($validatedData);
    
        // Reindirizza all'elenco dei progetti dopo aver salvato il nuovo progetto
        return redirect()->route('projects.index');
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
        'language_used' => 'nullable|string',
        'start_date' => 'nullable|date',
        'expire_date' => 'nullable|date',
    ]);

    // Aggiorna i dati del progetto con i nuovi dati validati
    $project->update($validatedData);

    // Reindirizza alla visualizzazione del progetto dopo averlo aggiornato
    return redirect()->route('projects.show', $project->id);
}
    // Eliminazione di un progetto
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index');
    }
}
