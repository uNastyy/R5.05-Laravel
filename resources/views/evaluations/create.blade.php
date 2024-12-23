<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une évaluation</title>
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
    </style>
</head>
<body>
<div class="container">
    <h1>Ajouter une évaluation</h1>

    <form action="{{ route('evaluations.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" name="titre" id="titre" required>
            @error('titre')
            <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" required>
            @error('date')
            <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="coefficient">Coefficient</label>
            <input type="number" step="0.1" name="coefficient" id="coefficient" required>
            @error('coefficient')
            <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="module_id">Module</label>
            <select name="module_id" id="module_id" required>
                <option value="">Sélectionnez un module</option>
                @foreach($modules as $module)
                    <option value="{{ $module->id }}">{{ $module->nom }}</option>
                @endforeach
            </select>
            @error('module_id')
            <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Ajouter</button>
    </form>
</div>
</body>
</html>
