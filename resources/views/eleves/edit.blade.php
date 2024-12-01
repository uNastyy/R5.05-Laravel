<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un élève</title>
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
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
        }
        input[type="text"], input[type="email"], input[type="date"], input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Modifier un élève</h1>

    <form action="{{ route('eleves.update', $eleve->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" value="{{ old('nom', $eleve->nom) }}" required>
            @error('nom')
            <div class="error" style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" value="{{ old('prenom', $eleve->prenom) }}" required>
            @error('prenom')
            <div class="error" style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="date_naissance">Date de Naissance</label>
            <input type="date" name="date_naissance" id="date_naissance" value="{{ old('date_naissance', $eleve->date_naissance) }}" required>
            @error('date_naissance')
            <div class="error" style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="numero_etudiant">Numéro étudiant</label>
            <input type="text" name="numero_etudiant" id="numero_etudiant" value="{{ old('numero_etudiant', $eleve->numero_etudiant) }}" required>
            @error('numero_etudiant')
            <div class="error" style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $eleve->email) }}" required>
            @error('email')
            <div class="error" style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">URL de l'image</label>
            <input type="text" name="image" id="image" value="{{ old('image', $eleve->image) }}">
            @error('image')
            <div class="error" style="color: red;">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <label>Image actuelle :</label>
            @if($eleve->image)
                <img src="{{ asset($eleve->image) }}" alt="Image de l'élève" style="width: 150px; height: auto; border-radius: 5px;">
            @else
                <p>Aucune image disponible.</p>
            @endif
        </div>

        <button type="submit">Mettre à jour</button>
    </form>
</div>
</body>
</html>
