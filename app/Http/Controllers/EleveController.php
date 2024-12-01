<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eleve;

class EleveController extends Controller
{
    public function index()
    {
        $eleves = Eleve::paginate(10); // Pagination des élèves
        return view('eleves.index', compact('eleves'));
    }

    public function create()
    {
        return view('eleves.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'numero_etudiant' => 'required|string|max:255|unique:eleves',
            'email' => 'required|string|email|max:255|unique:eleves',
            'image' => 'nullable|url|max:1024',
        ]);

        Eleve::create($validatedData);
        return redirect()->route('eleves.index')->with('success', 'Élève ajouté avec succès.');
    }

    public function show($id)
    {
        $eleve = Eleve::findOrFail($id);
        return view('eleves.show', compact('eleve'));
    }

    public function edit($id)
    {
        $eleve = Eleve::findOrFail($id);
        return view('eleves.edit', compact('eleve'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'numero_etudiant' => 'required|string|max:255|unique:eleves,numero_etudiant,' . $id,
            'email' => 'required|string|email|max:255|unique:eleves,email,' . $id,
            'image' => 'nullable|url|max:1024',
        ]);

        $eleve = Eleve::findOrFail($id);
        $eleve->update($validatedData);
        return redirect()->route('eleves.index')->with('success', 'Élève mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $eleve = Eleve::findOrFail($id);
        $eleve->delete();
        return redirect()->route('eleves.index')->with('success', 'Élève supprimé avec succès.');
    }

    public function showNotes($id)
    {
        $eleve = Eleve::with('evaluationEleves.evaluation')->findOrFail($id); // Récupérer l'élève avec ses notes
        $moyenne = $eleve->moyenne(); // Calculer la moyenne

        return view('eleves.notes', compact('eleve', 'moyenne'));
    }

    public function elevesSansMoyenne($evaluationId)
    {
        // Récupérer tous les élèves qui n'ont pas eu la moyenne pour une évaluation spécifique
        $eleves = Eleve::whereHas('evaluationEleves', function ($query) use ($evaluationId) {
            $query->where('evaluation_id', $evaluationId)
                ->where('note', '<', 10); // Supposons que la moyenne est 10
        })->get();

        return view('eleves.sans_moyenne', compact('eleves', 'evaluationId'));
    }
}
