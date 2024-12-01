<?php

if(isset($_POST["etudiant"])){
    header('location: ../views/Etudiant/liste.php');
}


elseif(isset($_POST["prof"])){
    header('location: ../views/Professeur/liste.php');
}


elseif(isset($_POST["salle"])){
    header('location: ../views/Salle/liste.php');
}


elseif(isset($_POST["cour"])){
    header('location: ../views/Cours/liste.php');
}

elseif(isset($_POST["home"])){
    header('location: ../index.php');
}
?>