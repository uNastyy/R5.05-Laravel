<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        .nav-links {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        a {
            text-decoration: none;
            font-size: 1.2rem;
            color: white;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Accueil</h1>
    <div class="nav-links">
        <a href="{{ route('eleves.index') }}">Liste des élèves</a>
        <a href="{{ route('evaluations.index') }}">Liste des évaluations</a>
        <a href="{{ route('modules.index') }}">Liste des modules</a>
    </div>
</div>
</body>
</html>
