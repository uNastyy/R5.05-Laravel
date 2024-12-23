<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des évaluations</title>
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
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .pagination a {
            margin: 0 5px;
            padding: 10px;
            text-decoration: none;
            color: #007bff;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .pagination a:hover {
            background-color: #ddd;
        }
        .pagination .active {
            background-color: #007bff;
            color: white;
            border: 1px solid #007bff;
        }
        .btn-add {
            background-color: green;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .btn-add:hover {
            background-color: darkgreen;
        }
        .btn-notes {
            background-color: #007bff;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-notes:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Liste des évaluations</h1>

    <a href="{{ route('evaluations.create') }}" class="btn-add">Ajouter une nouvelle évaluation</a>

    @if(session('success'))
        <div style="color: green; text-align: center;">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
        <tr>
            <th>Titre</th>
            <th>Date</th>
            <th>Coefficient</th>
            <th>Module</th>
            <th>Notes pour cette évalation</th>
        </tr>
        </thead>
        <tbody>
        @foreach($evaluations as $evaluation)
            <tr>
                <td>{{ $evaluation->titre }}</td>
                <td>{{ $evaluation->date }}</td>
                <td>{{ $evaluation->coefficient }}</td>
                <td>{{ $evaluation->module->nom }}</td>
                <td>
                    <a href="{{ route('evaluations.notes', $evaluation->id) }}" class="btn-notes">Voir les notes</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="pagination">
        {{ $evaluations->links() }}
    </div>
</div>
</body>
</html>
