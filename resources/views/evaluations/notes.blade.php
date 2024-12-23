<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes de l'Évaluation : {{ $evaluation->titre }}</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .btn-back, .btn-add-note {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }
        .btn-back:hover, .btn-add-note:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Notes de l'Évaluation : {{ $evaluation->titre }}</h1>

    <a href="{{ route('evaluations.addNote', $evaluation->id) }}" class="btn-add-note">Ajouter une note</a>

    <table>
        <thead>
        <tr>
            <th>Élève</th>
            <th>Note</th>
        </tr>
        </thead>
        <tbody>
        @foreach($evaluation->evaluationEleves as $evaluationEleve)
            <tr>
                <td>{{ $evaluationEleve->eleve->nom }} {{ $evaluationEleve->eleve->prenom }}</td>
                <td>{{ $evaluationEleve->note }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <a href="{{ route('evaluations.index') }}" class="btn-back">Retourner aux évaluations</a>
</div>
</body>
</html>
