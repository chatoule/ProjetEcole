<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification Étudiant</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <style>
        /* Global Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: #c4c4c4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
        }

        .register-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .register-container:hover {
            transform: scale(1.05);
            opacity: 0.9;
        }

        h2 {
            color: #333;
            font-size: 28px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            font-size: 14px;
            color: #333;
        }

        input[type="email"],
        input[type="password"],
        input[type="text"],
        input[type="date"],
        input[type="number"],
        select {
            width: 100%;
            padding: 12px 15px;
            margin-top: 8px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        input[type="email"]:focus,
        input[type="password"]:focus,
        input[type="text"]:focus,
        input[type="number"]:focus,
        input[type="date"]:focus
        select:focus {
            border-color: #065718;
            outline: none;
        }

        button {
            background-color: #065718;
            color: white;
            border: none;
            padding: 15px;
            font-size: 16px;
            width: 100%;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #065718;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 15px;
        }

        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }

        .footer a {
            color: #065718;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body class="">

<div class="register-container">
    
    
    <?php
    $matricule = $_GET['matricule'];
    require_once('../../models/EtudiantReposotory.php');
    $etService = new EtudiantReposotory();
    $etudiant = $etService->getByMatricule($matricule);
    ?>

    <!-- Student Modification Form -->
    <form action="../../controllers/EtudiantCtrl.php" method="post" class="mx-auto p-4 bg-white shadow-sm rounded" style="max-width: 600px;">
        <h5 class="text-center mb-4">Formulaire de Modification Étudiant</h5>
        <div class="form-group">
            <label for="matricule">MATRICULE</label>
            <input type="text" id="matricule" name="matricule" class="form-control" value="<?= $etudiant['matricule'] ?>" readonly required>
        </div>
        
        <div class="form-group">
            <label for="nom">NOM</label>
            <input type="text" id="nom" name="nom" class="form-control" value="<?php echo $etudiant['nom']; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="prenom">PRENOM</label>
            <input type="text" id="prenom" name="prenom" class="form-control" value="<?= $etudiant['prenom'] ?>" required>
        </div>
        
        <div class="form-group">
            <label for="sexe">SEXE</label>
            <select id="sexe" name="sexe" class="form-control" required>
                <option value="">Veuillez choisir le sexe de l'étudiant</option>
                <option value="H" <?php if($etudiant['sexe']=='H') echo 'selected' ?>>Homme</option>
                <option value="F" <?php if($etudiant['sexe']=='F') echo 'selected' ?>>Femme</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="tel">TÉLÉPHONE</label>
            <input type="number" id="tel" name="tel" class="form-control" value="<?= $etudiant['tel'] ?>" required>
        </div>
        
        <div class="form-group">
            <label for="ddn">DATE DE NAISSANCE</label>
            <input type="date" id="ddn" name="ddn" class="form-control" value="<?= $etudiant['ddn'] ?>" required>
        </div>
        
        <input type="hidden" name="action" value="modifier">
        <div class="text-center">
            <a href="../../controllers/EtudiantCtrl.php?action=liste" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Retour</a>
            <button type="submit" class="btn btn-success"style="margin-top: 5px;">Modifier</button>
        </div>
    </form>
</div>

</body>
</html>
