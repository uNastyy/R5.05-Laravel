<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un élève</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-top: 10px;
            color: #555;
        }
        input {
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input:focus {
            border-color: #007bff;
            outline: none;
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
        .success {
            color: green;
            text-align: center;
            margin-bottom: 15px;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px;
            margin-top: 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Ajouter un élève</h1>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('eleves.store') }}" method="POST">
        @csrf

        <label for="nom">Nom :</label>
        <input type="text" name="nom" value="{{ old('nom') }}">
        @error('nom')
        <div class="error">{{ $message }}</div>
        @enderror

        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" value="{{ old('prenom') }}">
        @error('prenom')
        <div class="error">{{ $message }}</div>
        @enderror

        <label for="date_naissance">Date de naissance :</label>
        <input type="date" name="date_naissance" value="{{ old('date_naissance') }}">
        @error('date_naissance')
        <div class="error">{{ $message }}</div>
        @enderror

        <label for="numero_etudiant">Numéro étudiant :</label>
        <input type="text" name="numero_etudiant" value="{{ old('numero_etudiant') }}">
        @error('numero_etudiant')
        <div class="error">{{ $message }}</div>
        @enderror

        <label for="email">Email :</label>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email')
        <div class="error">{{ $message }}</div>
        @enderror

        <label for="image">Image (lien) :</label>
        <input type="text" name="image" value="{{ old('image') }}">
        @error('image')
        <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit">Ajouter</button>
    </form>
</div>
</body>
</html>
