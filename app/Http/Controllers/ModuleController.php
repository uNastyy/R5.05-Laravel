<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;

class ModuleController extends Controller
{
    public function index()
    {
        $modules = Module::paginate(10);
        return view('modules.index', compact('modules'));
    }

    public function create()
    {
        return view('modules.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required|string|max:255|unique:modules',
            'nom' => 'required|string|max:255',
            'coefficient' => 'required|numeric|min:0',
        ]);

        Module::create($validatedData);
        return redirect()->route('modules.index')->with('success', 'Module ajouté avec succès.');
    }

    public function show($id)
    {
        $module = Module::findOrFail($id);
        return view('modules.show', compact('module'));
    }

    public function edit($id)
    {
        $module = Module::findOrFail($id);
        return view('modules.edit', compact('module'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'code' => 'required|string|max:255|unique:modules,code,' . $id,
            'nom' => 'required|string|max:255',
            'coefficient' => 'required|numeric|min:0',
        ]);

        $module = Module::findOrFail($id);
        $module->update($validatedData);
        return redirect()->route('modules.index')->with('success', 'Module mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $module = Module::findOrFail($id);
        $module->delete();
        return redirect()->route('modules.index')->with('success', 'Module supprimé avec succès.');
    }
}
