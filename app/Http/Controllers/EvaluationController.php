<?php
namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\EvaluationEleve;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    // Autres méthodes...

    public function showNotes($id)
    {
        // Récupérer l'évaluation et ses notes
        $evaluation = Evaluation::with('evaluationEleves.eleve')->findOrFail($id);

        return view('evaluations.notes', compact('evaluation'));
    }
}
