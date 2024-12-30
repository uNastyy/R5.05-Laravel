<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle Note</title>
</head>
<body>
<h1>Bonjour {{ $eleve->prenom }} {{ $eleve->nom }}</h1>
<p>Une nouvelle note a été ajoutée pour vous :</p>
<ul>
    <li><strong>Note :</strong> {{ $note->note }}</li>
    <li><strong>Date :</strong> {{ $note->created_at->format('d/m/Y') }}</li>
    <li><strong>Évaluation :</strong> {{ $note->evaluation->titre }}</li>
</ul>
<p>Merci de consulter votre espace personnel pour plus de détails.</p>
</body>
</html>
