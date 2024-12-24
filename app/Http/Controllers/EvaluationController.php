<?php
namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\EvaluationEleve;
use App\Models\Module;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function index()
    {
        // Liste toutes les évaluations avec pagination
        $evaluations = Evaluation::with('module')->paginate(10);
        return view('evaluations.index', compact('evaluations'));
    }

    public function create()
    {
        // Charge les modules pour l'ajout d'une nouvelle évaluation
        $modules = Module::all();
        return view('evaluations.create', compact('modules'));
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'titre' => 'required|string|max:255',
            'date' => 'required|date',
            'coefficient' => 'required|numeric|min:0.1',
            'module_id' => 'required|exists:modules,id',
        ]);

        // Création de l'évaluation
        Evaluation::create($request->all());

        return redirect()->route('evaluations.index')->with('success', 'Évaluation ajoutée avec succès.');
    }

    public function showNotes($id)
    {
        // Récupérer l'évaluation et ses notes
        $evaluation = Evaluation::with('evaluationEleves.eleve')->findOrFail($id);

        return view('evaluations.notes', compact('evaluation'));
    }

    public function elevesSansMoyenne($evaluationId)
    {
        $evaluation = Evaluation::findOrFail($evaluationId);
        $elevesSansMoyenne = $evaluation->eleves()->wherePivot('note', '<', 10)->get();

        return view('evaluations.eleves-sans-moyenne', compact('elevesSansMoyenne', 'evaluation'));
    }
}
