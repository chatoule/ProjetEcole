<?php
session_start();
if (empty($_SESSION['cmp'])) {
    header("location:authent.php");
}
require_once("../../models/Provider.php");
$p = new Provider();
$db = $p->getconnection();

$totalSallestStmt = $db->query("SELECT COUNT(*) as total FROM classe");
$totalSalle = $totalSallestStmt->fetch(PDO::FETCH_OBJ)->total;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste Salles</title>
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
            <p class="gest_veh">Gestions des Salles</p>
        </div>
    </div>
        <div class="form-group">
            <div class ="form-group">                       
                <div class="text-center mb-3">
                    <a  href="../../index.php?" class="btn btn-primary btnBoutton">
                        Retour à l'acceuil
                    </a>
                    <a  href="../../controllers/SalleCtrl.php?action=form" class="btn btn-success btnBoutton">
                        Ajouter une salle
                    </a>
                    <div class="btn btn-warning btnBoutton">
                        <span>Total Salle: <?= $totalSalle?></span>
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
    require_once('../../models/SalleReposotory.php');
    $etService = new salereposotory();
    $etudiants = $etService->getAll();
    ?>    

    <!-- Student table -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="thead-dark">
                <tr>
                    <th>IdClasse</th>
                    <th>NomClasse</th>
                    <th>Faculte</th>
                    <th>Capacite</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
            <?php foreach ($etudiants as $et) { ?>   
                <tr>
                    <td><?php echo $et['IdClasse']; ?></td>
                    <td><?php echo $et['NomClasse']; ?></td>
                    <td><?php echo $et['Faculte']; ?></td>
                    <td><?php echo $et['Capacite']; ?></td>
                    <td>
                    <a href="edit.php?action=editForm&IdClasse=<?php echo $et['IdClasse']; ?>" class="btn btn-warning btn-sm">Modifier</a>
                    <a href="../../controllers/SalleCtrl.php?action=delete&IdClasse=<?php echo $et['IdClasse']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?')">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
