<?php

namespace App\Http\Controllers;

use App\Mail\NouvelleNoteNotification;
use App\Models\Eleve;
use App\Models\Evaluation;
use App\Models\EvaluationEleve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EvaluationEleveController extends Controller
{
    public function index()
    {
        $evaluationEleves = EvaluationEleve::with('eleve', 'evaluation')->get();
        return view('evaluationEleves.index', compact('evaluationEleves'));
    }

    public function create()
    {
        $eleves = Eleve::all();
        $evaluations = Evaluation::all();
        return view('evaluationEleves.store', compact('eleves', 'evaluations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'evaluation_id' => 'required|exists:evaluations,id',
            'eleve_id' => 'required|exists:eleves,id',
            'note' => 'required|numeric|min:0|max:20',
        ]);

        $note = EvaluationEleve::create($validated);

        $eleve = $note->eleve;
        Mail::to($eleve->email)->send(new NouvelleNoteNotification($eleve, $note));

        return redirect()->back()->with('success', 'Note ajoutée.');
    }

    public function show($id)
    {
        $evaluationEleve = EvaluationEleve::with('eleve', 'evaluation')->findOrFail($id);
        return view('evaluationEleves.show', compact('evaluationEleve'));
    }

    public function edit($id)
    {
        $evaluationEleve = EvaluationEleve::findOrFail($id);
        $eleves = Eleve::all();
        $evaluations = Evaluation::all();
        return view('evaluationEleves.edit', compact('evaluationEleve', 'eleves', 'evaluations'));
    }

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

    public function destroy($id)
    {
        $evaluationEleve = EvaluationEleve::findOrFail($id);
        $evaluationEleve->delete();

        return redirect()->route('evaluationEleves.index')->with('success', 'Note supprimée avec succès.');
    }

    public function addNote(Evaluation $evaluation = null)
    {
        if (Auth::user()->role !== 'prof') {
            abort(403, 'Vous n’avez pas l’autorisation d’accéder à cette page.');
        }
        $eleves = Eleve::all();
        $evaluations = Evaluation::all();
        return view('evaluations.addNote', compact('eleves', 'evaluations', 'evaluation'));
    }

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

        return redirect()->route('evaluations.notes', ['id' => $evaluation->id])->with('success', 'Note ajoutée avec succès.');
    }

    public function elevesSansMoyenne($id)
    {
        $evaluation = Evaluation::findOrFail($id);
        $elevesSansMoyenne = $evaluation->eleves()->wherePivot('note', '<', 10)->get();

        return view('evaluations.eleves-sans-moyenne', compact('evaluation', 'elevesSansMoyenne'));
    }
}
