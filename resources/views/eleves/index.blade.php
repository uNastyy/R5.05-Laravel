<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des élèves</title>
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
        .btn-delete {
            background-color: red;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-delete:hover {
            background-color: darkred;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Liste des élèves</h1>

    @if(session('success'))
        <div class="success" style="color: green; text-align: center;">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de Naissance</th>
            <th>Numéro étudiant</th>
            <th>Email</th>
            <th>Suppression</th>
            <th>Modification</th>
            <th>Profil</th>
        </tr>
        </thead>
        <tbody>
        @foreach($eleves as $eleve)
            <tr>
                <td>{{ $eleve->nom }}</td>
                <td>{{ $eleve->prenom }}</td>
                <td>{{ $eleve->date_naissance }}</td>
                <td>{{ $eleve->numero_etudiant }}</td>
                <td>{{ $eleve->email }}</td>
                <td>
                    <!-- Formulaire pour supprimer l'élève -->
                    <form action="{{ route('eleves.destroy', $eleve->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet élève ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Supprimer</button>
                    </form>
                </td>
                <td>
                    <!-- Lien vers la page de modification -->
                    <a href="{{ route('eleves.edit', $eleve->id) }}" class="btn-edit" style="background-color: orange; color: white; padding: 5px 10px; text-decoration: none; border-radius: 5px;">Modifier</a>
                </td>
                <td>
                    <!-- Lien vers la page de profil de l'élève -->
                    <a href="{{ route('eleves.show', $eleve->id) }}" class="btn-profile" style="background-color: green; color: white; padding: 5px 10px; text-decoration: none; border-radius: 5px;">Voir Profil</a>
                </td>


            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="pagination">
        {{ $eleves->links() }}
    </div>
</div>
</body>
</html>
