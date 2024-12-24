<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du module</title>
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
        .module-details {
            margin-top: 20px;
        }
        .module-details h2 {
            margin-bottom: 20px;
        }
        .module-details p {
            margin: 10px 0;
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
    <h1>Détails du module</h1>

    <div class="module-details">
        <h2>{{ $module->nom }}</h2>
        <p><strong>Code:</strong> {{ $module->code }}</p>
        <p><strong>Coefficient:</strong> {{ $module->coefficient }}</p>
    </div>

    <a href="{{ route('modules.index') }}" class="btn-back">Retour à la liste des modules</a>
</div>
</body>
</html>
