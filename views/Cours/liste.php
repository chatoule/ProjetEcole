<?php
session_start();
if (empty($_SESSION['cmp'])) {
    header("location:authent.php");
}
require_once("../../models/Provider.php");
$p = new Provider();
$db = $p->getconnection();

$totalCourstStmt = $db->query("SELECT COUNT(*) as total FROM cours");
$totalCour = $totalCourstStmt->fetch(PDO::FETCH_OBJ)->total;

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Étudiants</title>
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
            <p class="gest_veh">Gestions des Cours</p>
        </div>
    </div>
        <div class="form-group">
            <div class ="form-group">                       
                <div class="text-center mb-3">
                    <a  href="../../index.php?" class="btn btn-primary btnBoutton">
                        Retour à l'acceuil
                    </a>
                    <a  href="../../controllers/CoursCtrl.php?action=form" class="btn btn-success btnBoutton">
                        Ajouter Cours
                    </a>
                    <div class="btn btn-warning btnBoutton">
                        <span>Total Cours <?= $totalCour?></span>
                    </div>
                </div>
            </div>
        </div><br>

    <!-- Success Message -->
    <?php if (isset($_GET['message'])): ?>
        <div class="alert alert-success text-center">
            <?php echo htmlspecialchars($_GET['message']); ?>
        </div>
    <?php endif; ?>

    <!-- Student Table -->
    <table class="table table-bordered table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th>ID COURS</th>
                <th>nom_cours DU COURS</th>
                <th>DESCRIPTION DU COURS</th>
                <th>Nom du Prof</th>
                <th>CLASSE</th>
                <th>Action</th>
              
            </tr>
        </thead>
        <tbody>
            <?php
            require_once('../../models/CoursReposotory.php');
            $etService = new coursereposotory();
            $etudiants = $etService->getAll();

            foreach ($etudiants as $et): ?>
                <tr>
                    <td><?php echo htmlspecialchars($et['id_cours']); ?></td>
                    <td><?php echo htmlspecialchars($et['nom_cours']); ?></td>
                    <td><?php echo htmlspecialchars($et['desc_cours']); ?></td>
                    <td><?php echo htmlspecialchars($et['id_prof']); ?></td>
                    <td><?php echo htmlspecialchars($et['IdClasse']); ?></td>
            
                    <td>
                        <a href="edit.php?action=editForm&id_cours=<?php echo htmlspecialchars($et['id_cours']); ?>" class="btn btn-warning btn-sm">
                            Modifier
                        </a>
                        <a href="../../controllers/CoursCtrl.php?action=delete&id_cours=<?php echo htmlspecialchars($et['id_cours']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?');">
                            Supprimer
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
