<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>votre inscription a été validée</title>
</head>
<body>
    <h1>félicitations, {{ $student->name }} !</h1>
    <p>votre inscription pour le domaine choisi a été validée</p>
    <p>votre numéro matricule est : <strong>{{ $student->matricule }}</strong></p>
    <p>bienvenue dans notre institution "CampusConnect" !</p>
    <p>cordialement,</p>
    <p>L'administration</p>
</body>
</html>