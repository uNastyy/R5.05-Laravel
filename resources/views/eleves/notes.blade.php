<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes de l'Élève : {{ $eleve->nom }} {{ $eleve->prenom }}</title>
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
        .btn-add-note {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px;
        }
        .btn-add-note:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Notes de l'Élève : {{ $eleve->nom }} {{ $eleve->prenom }}</h1>

    <table>
        <thead>
        <tr>
            <th>Évaluation</th>
            <th>Note</th>
        </tr>
        </thead>
        <tbody>
        @foreach($eleve->evaluationEleves as $evaluationEleve)
            <tr>
                <td>{{ $evaluationEleve->evaluation->titre }}</td>
                <td>{{ $evaluationEleve->note }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h2>Moyenne : {{ number_format($moyenne, 2) }}</h2>

    <a href="{{ route('eleves.index') }}">Retourner à la liste des élèves</a>
</div>
</body>
</html>
