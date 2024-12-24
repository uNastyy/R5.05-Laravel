<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des modules</title>
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
        .btn-add, .btn-edit, .btn-delete, .btn-show {
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
            color: white;
        }
        .btn-add {
            background-color: green;
        }
        .btn-add:hover {
            background-color: darkgreen;
        }
        .btn-edit {
            background-color: orange;
        }
        .btn-edit:hover {
            background-color: darkorange;
        }
        .btn-delete {
            background-color: red;
        }
        .btn-delete:hover {
            background-color: darkred;
        }
        .btn-show {
            background-color: blue;
        }
        .btn-show:hover {
            background-color: darkblue;
        }
        .btn-home{
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
        .btn-home:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Liste des modules</h1>

    <a href="{{ route('modules.create') }}" class="btn-add">Ajouter un nouveau module</a>

    @if(session('success'))
        <div style="color: green; text-align: center;">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
        <tr>
            <th>Code</th>
            <th>Nom</th>
            <th>Coefficient</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($modules as $module)
            <tr>
                <td>{{ $module->code }}</td>
                <td>{{ $module->nom }}</td>
                <td>{{ $module->coefficient }}</td>
                <td>
                    <a href="{{ route('modules.show', $module->id) }}" class="btn-show">Voir</a>
                    <a href="{{ route('modules.edit', $module->id) }}" class="btn-edit">Modifier</a>
                    <form action="{{ route('modules.destroy', $module->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce module ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <a href="{{ route('home') }}" class="btn-home">Retour à l'accueil</a>

    <div class="pagination">
        {{ $modules->links() }}
    </div>
</div>
</body>
</html>
