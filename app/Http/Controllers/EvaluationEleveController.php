<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Evaluation;
use App\Models\EvaluationEleve;
use Illuminate\Http\Request;

class EvaluationEleveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evaluationEleves = EvaluationEleve::with('eleve', 'evaluation')->get();
        return view('evaluationEleves.index', compact('evaluationEleves'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $eleves = Eleve::all();
        $evaluations = Evaluation::all();
        return view('evaluationEleves.store', compact('eleves', 'evaluations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'eleve_id' => 'required|exists:eleves,id',
            'evaluation_id' => 'required|exists:evaluations,id',
            'note' => 'required|numeric|min:0|max:20',
        ]);

        $evaluationEleve = new EvaluationEleve();
        $evaluationEleve->eleve_id = $request->eleve_id;
        $evaluationEleve->evaluation_id = $request->evaluation_id;
        $evaluationEleve->note = $request->note;
        $evaluationEleve->save();

        return redirect()->route('evaluationEleves.index')->with('success', 'Note ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $evaluationEleve = EvaluationEleve::with('eleve', 'evaluation')->findOrFail($id);
        return view('evaluationEleves.show', compact('evaluationEleve'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $evaluationEleve = EvaluationEleve::findOrFail($id);
        $eleves = Eleve::all();
        $evaluations = Evaluation::all();
        return view('evaluationEleves.edit', compact('evaluationEleve', 'eleves', 'evaluations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'eleve_id' => 'required|exists:eleves,id',
            'evaluation_id' => 'required|exists:evaluations,id',
            'note' => 'required|numeric|min:0|max:20',
        ]);

        $evaluationEleve = EvaluationEleve::findOrFail($id);
        $evaluationEleve->eleve_id = $request->eleve_id;
        $evaluationEleve->evaluation_id = $request->evaluation_id;
        $evaluationEleve->note = $request->note;
        $evaluationEleve->save();

        return redirect()->route('evaluationEleves.index')->with('success', 'Note mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $evaluationEleve = EvaluationEleve::findOrFail($id);
        $evaluationEleve->delete();

        return redirect()->route('evaluationEleves.index')->with('success', 'Note supprimée avec succès.');
    }

    /**
     * Show the form for adding a note to an evaluation.
     */
    public function addNote(Evaluation $evaluation = null)
    {
        $eleves = Eleve::all();
        $evaluations = Evaluation::all();
        return view('evaluations.addNote', compact('eleves', 'evaluations', 'evaluation'));
    }

    /**
     * Store the newly added note in storage.
     */
    public function storeNote(Request $request, Evaluation $evaluation)
    {
        $request->validate([
            'eleve_id' => 'required|exists:eleves,id',
            'note' => 'required|numeric|min:0|max:20',
        ]);

        $evaluationEleve = new EvaluationEleve();
        $evaluationEleve->eleve_id = $request->eleve_id;
        $evaluationEleve->evaluation_id = $evaluation->id;
        $evaluationEleve->note = $request->note;
        $evaluationEleve->save();

        return redirect()->route('evaluations.notes', ['id' => $evaluation->id])->with('success', 'Note added successfully.');
    }

    public function elevesSansMoyenne($id)
    {
        $evaluation = Evaluation::findOrFail($id);
        $elevesSansMoyenne = $evaluation->eleves()->wherePivot('note', '<', 10)->get();

        return view('evaluations.eleves-sans-moyenne', compact('evaluation', 'elevesSansMoyenne'));
    }
}
