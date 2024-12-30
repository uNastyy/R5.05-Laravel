<?php
namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\EvaluationEleve;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvaluationController extends Controller
{
    public function index()
    {
        if (Auth::user()->role !== 'prof') {
            abort(403, 'Vous n’avez pas l’autorisation d’accéder à cette page.');
        }
        $evaluations = Evaluation::with('module')->paginate(10);
        return view('evaluations.index', compact('evaluations'));
    }

    public function create()
    {
        $modules = Module::all();
        return view('evaluations.create', compact('modules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'date' => 'required|date',
            'coefficient' => 'required|numeric|min:0.1',
            'module_id' => 'required|exists:modules,id',
        ]);
        Evaluation::create($request->all());
        return redirect()->route('evaluations.index')->with('success', 'Évaluation ajoutée avec succès.');
    }

    public function showNotes($id)
    {
        $evaluation = Evaluation::with('evaluationEleves.eleve')->findOrFail($id);
        return view('evaluations.notes', compact('evaluation'));
    }
}
