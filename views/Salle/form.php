<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Ajout De salle</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../form.css">
</head>

<body class="bg-light">

<div class="register-container">

    <!-- Professor Addition Form -->
    <form action="../../controllers/SalleCtrl.php" method="post" class="mx-auto p-4 bg-white shadow-sm rounded" style="max-width: 600px;">
    <h5 class="text-center mb-4">Formulaire d'Ajout des Salles</h5>

        <div class="form-group">
            <label for="IdClasse">ID Classe</label>
            <input type="number" id="IdClasse" name="IdClasse" class="form-control" autocomplete="off" required>
        </div>
        
        <div class="form-group">
            <label for="NomClasse">NomClasse</label>
            <input type="text" id="NomClasse" name="NomClasse" class="form-control" autocomplete="off" required>
        </div>
        
        <div class="form-group">
            <label for="Faculte	">Faculte</label>
            <input type="text" id="Faculte" name="Faculte" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="Capacite">Capacite</label>
            <input type="number" id="Capacite" name="Capacite" class="form-control" required>
        </div>
        
        <input type="hidden" name="action" value="ajout">
        <div class="text-center">
            <a href="../../controllers/SalleCtrl.php?action=liste" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Retour</a>
            <button type="reset"style="background-color:red; margin-bottom:10px; margin-top:5px">VIDER</button>
            <button type="submit" class="btn btn-success">AJOUTER</button>
        </div>
    </form>
</div>

</body>

</html>
