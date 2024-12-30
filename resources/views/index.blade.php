<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #343a40;
            color: white;
        }
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 60px);
            text-align: center;
        }
        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #343a40;
        }
        .nav-links {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        a, form button {
            text-decoration: none;
            font-size: 1.2rem;
            color: white;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            border: none;
            cursor: pointer;
        }
        a:hover, form button:hover {
            background-color: #0056b3;
        }
        form button {
            background-color: #dc3545;
            padding: 5px 10px;
            font-size: 1rem;
        }
        form button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
<div class="header">
    <span>Votre rôle: {{ $role }}</span>
    <form method="POST" action="{{ route('logout') }}" onsubmit="return confirm('Êtes-vous sûr de vouloir vous déconnecter ?');">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>
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
