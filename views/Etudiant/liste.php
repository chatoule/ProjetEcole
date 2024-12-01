<?php

require_once("../../models/Provider.php");
$p = new Provider();
$db = $p->getconnection();

session_start();
if (empty($_SESSION['cmp'])) {
    header("location:authent.php");
}

$totalEtudiantStmt = $db->query("SELECT COUNT(*) as total FROM etudiant");
$totalEtudiant = $totalEtudiantStmt->fetch(PDO::FETCH_OBJ)->total;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste Étudiants</title>
    <link rel="stylesheet" href="../../css/bootstrap.css">

    <style>       
        .gest_veh {
        font-size: 36px;
        margin: -9px 0px 0px 0px;
        font-weight: bold;
        color: #097d22;
        text-align: center; /* Centrer le texte */
        }
        .btnBoutton{
            width: 140px;
            height:35px;
        }
    </style>

</head>
<body class="bg-light">
<div class="container mt-5">
    <br>
    <div class="container-2">
        <div class="form-group">
            <!-- Page du Jour -->
            <p class="gest_veh">Gestions des Etudiants</p>
        </div>
    </div>
        <div class="form-group">
            <div class ="form-group">                       
                <div class="text-center mb-3">
                    <a  href="../../index.php?" class="btn btn-primary btnBoutton">
                        Retour à l'acceuil
                    </a>
                    <a  href="../../controllers/EtudiantCtrl.php?action=form" class="btn btn-success btnBoutton">
                        Ajouter Etudiant
                    </a>
                    <div class="btn btn-warning btnBoutton">
                        <span>Total Etudiants : <?= $totalEtudiant?></span>
                    </div>
                </div>
            </div>
        </div><br>
    <!-- Success message -->
    <?php 
    if (isset($_GET['message'])) {
    ?>
        <div class="alert alert-success text-center" role="alert">
            <?php echo $_GET['message']; ?>
        </div>
    <?php 
    }
    ?>

    <?php
    require_once('../../models/EtudiantReposotory.php');
    $etService = new EtudiantReposotory();
    $etudiants = $etService->getAll();
    ?>    

    <!-- Student table -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="thead-dark">
                <tr>
                    <th>MATRICULE</th>
                    <th>NOM</th>
                    <th>PRENOM</th>
                    <th>SEXE</th>
                    <th>TÉLÉPHONE</th>
                    <th>DATE DE NAISSANCE</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($etudiants as $et) { ?>   
                <tr>
                    <td><?php echo $et['matricule']; ?></td>
                    <td><?php echo $et['nom']; ?></td>
                    <td><?php echo $et['prenom']; ?></td>
                    <td><?php echo $et['sexe']; ?></td>
                    <td><?php echo $et['tel']; ?></td>
                    <td><?php echo $et['ddn']; ?></td>
                    <td>
                        <a href="../../controllers/EtudiantCtrl.php?action=editForm&matricule=<?php echo $et['matricule']; ?>" class="btn btn-warning btn-sm">Modifier</a>
                        <a href="../../controllers/EtudiantCtrl.php?action=delete&matricule=<?php echo $et['matricule']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?')">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
