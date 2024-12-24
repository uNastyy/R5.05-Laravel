<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le module</title>
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
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-top: 10px;
        }
        input[type="text"], input[type="number"] {
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .btn-submit {
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-submit:hover {
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
        }
        .btn-back:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Modifier le module</h1>

    <form action="{{ route('modules.update', $module->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="code">Code du module</label>
        <input type="text" id="code" name="code" value="{{ $module->code }}" required>

        <label for="nom">Nom du module</label>
        <input type="text" id="nom" name="nom" value="{{ $module->nom }}" required>

        <label for="coefficient">Coefficient</label>
        <input type="number" id="coefficient" name="coefficient" value="{{ $module->coefficient }}" required>

        <button type="submit" class="btn-submit">Enregistrer les modifications</button>
    </form>

    <a href="{{ route('modules.index') }}" class="btn-back">Retour à la liste des modules</a>
</div>
</body>
</html>
