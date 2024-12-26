<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une note</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .btn-back {
            display: inline-block;
            padding: 10px 15px;
            text-decoration: none;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            margin-top: 20px;
            cursor: pointer;
        }
        .btn-back:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Ajouter une note</h1>

    <form action="{{ route('evaluations.store-note', ['evaluation' => $evaluation->id]) }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="eleve_id">Élève</label>
            <select name="eleve_id" id="eleve_id" required>
                <option value="">Sélectionnez un élève</option>
                @foreach($eleves as $eleve)
                    <option value="{{ $eleve->id }}">{{ $eleve->nom }} {{ $eleve->prenom }}</option>
                @endforeach
            </select>
            @error('eleve_id')
            <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="evaluation_id">Évaluation</label>
            <select name="evaluation_id" id="evaluation_id" required disabled>
                <option value="">Sélectionnez une évaluation</option>
                @foreach($evaluations as $eval)
                    <option value="{{ $eval->id }}" {{ (isset($evaluation) && $evaluation->id == $eval->id) ? 'selected' : '' }}>
                        {{ $eval->titre }}
                    </option>
                @endforeach
            </select>
            @error('evaluation_id')
            <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="note">Note</label>
            <input type="number" step="0.1" name="note" id="note" required>
            @error('note')
            <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Ajouter</button>
    </form>

    <a href="{{ route('evaluations.notes', $evaluation->id) }}" class="btn-back">Retour</a></div>
</body>
</html>
