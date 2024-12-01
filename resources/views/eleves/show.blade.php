<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil de l'élève</title>
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
        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .profile-header img {
            border-radius: 50%;
            width: 120px;
            height: 120px;
            margin-right: 20px;
        }
        .profile-details {
            font-size: 18px;
        }
        .profile-details strong {
            display: block;
            margin-bottom: 10px;
        }
        .btn-back {
            display: inline-block;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
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
    <h1>Profil de l'élève</h1>

    <div class="profile-header">
        <!-- Affichage de l'image de profil si disponible -->
        @if($eleve->image)
            <img src="{{ $eleve->image }}" alt="Photo de profil">
        @else
            <img src="https://via.placeholder.com/120" alt="Photo de profil par défaut">
        @endif

        <div class="profile-details">
            <strong>Nom : {{ $eleve->nom }}</strong>
            <strong>Prénom : {{ $eleve->prenom }}</strong>
            <strong>Date de naissance : {{ $eleve->date_naissance }}</strong>
            <strong>Numéro étudiant : {{ $eleve->numero_etudiant }}</strong>
            <strong>Email : {{ $eleve->email }}</strong>
        </div>
    </div>

    <!-- Bouton retour vers la liste des élèves -->
    <a href="{{ route('eleves.index') }}" class="btn-back">Retour à la liste des élèves</a>
</div>
</body>
</html>
