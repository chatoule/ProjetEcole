<?php

session_start();
if (empty($_SESSION['cmp'])) {
    header("location:authent.php");
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>School</title> 

  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<nav class="navbar">
    <div class="logo-container">
        <ul>
            <li class="degist">ProjetEcole</li>
        </ul>
    </div>
    <div class="deconnexion-container">
        <ul>
            <li>
                <a class="deconnexion" href="log.php?quitter=1" style="color: red;">Déconnexion</a>
            </li>
        </ul>
    </div>
</nav>
<style>
    .container-1 {
  background-color: #097d229d; /* Gris plus foncé pour le cadre */
  padding: 80px;
  border-radius: 5px;
  display: grid;
  grid-template-columns: repeat(4, 1fr); /* 4 colonnes pour les grands écrans */
  gap: 20px;
  max-width: 1000px;
  margin: 40px auto;
}

/* Responsive pour tablettes (768px) */
@media (max-width: 992px) {
  .container-1 {
    grid-template-columns: repeat(2, 1fr); /* Passe à 2 colonnes */
    padding: 60px; /* Ajuste le padding */
  }
}

/* Responsive pour mobiles (576px) */
@media (max-width: 576px) {
  .container-1 {
    grid-template-columns: 1frs; /* Passe à 1 colonne */
    padding: 40px; /* Réduit le padding */
  }
}

.gest_veh {
  font-size: 36px;
  margin: -9px 0px 0px 0px;
  font-weight: bold;
  color: #097d22;
  text-align: center; /* Centrer le texte */
}

/* Ajustement responsive pour la taille du texte */
@media (max-width: 768px) {
  .gest_veh {
    font-size: 28px; /* Réduit la taille du texte */
  }
}

.form-group {
  display: flex;
  gap: 20px;
  margin-bottom: 20px;
  flex-wrap: wrap; /* Permet aux éléments de passer à la ligne si nécessaire */
}

/* Ajustement pour petits écrans */
@media (max-width: 576px) {
  .form-group {
    flex-direction: column; /* Aligne les éléments verticalement */
    gap: 10px;
  }
}

.container-2 {
  padding: 10px;
  margin: 5px 0px -50px 400px; /* Centre la div */
  text-align: center;
  border-image-slice: 1;
  max-width: 80%; /* Réduit la largeur pour les petits écrans */
}

/* Ajustement pour la classe degist */
.degist {
  background: linear-gradient(to right, #fff, #fff);
  -webkit-background-clip: text;
  color: transparent;
  font-family: "black ops";
  font-size: 24px;
  font-weight: bold;
  display: inline-block;
}

/* Responsive pour la classe degist */
@media (max-width: 768px) {
  .degist {
    font-size: 20px;
  }
}

</style>
    <div class="container mt-5">
        <div class="container-2">
            <div class="form-group">
                    <!-- Page du Jour -->
                <p class="gest_veh">Page d'Acceuil</p>
            </div>
        </div>
    </div>

    <form action="controllers/page.php" method="POST">

        <div class="container-1">

            <button class="btn btn-og" type="submit" name="etudiant">
                <span>Gestion des Etudiants</span>
            </button>

            <button class="btn btn-of" type="submit" name="prof">
                <span>Gestion des Professeurs</span>
            </button>

            <button class="btn btn-op" type="submit" name="salle">
                <span>Gestion des Classes</span>
            </button>

            <button class="btn btn-ok" type="submit" name="cour">
                <span>Gestion des Cours</span>
            </button>

        </div>
        
    </form>

</body>
</html>
