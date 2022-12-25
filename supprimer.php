<?php  
session_start();

include("conn.php");
try {

    $connection = new PDO("mysql:host=$server;dbname=$bd", $user, $mdp);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    $resultat=$connection->prepare("DELETE FROM etudiant WHERE Id=:num");

    $resultat->bindValue(':num',$_GET["id"],PDO::PARAM_INT);
  
    $executer=$resultat->execute();
    if($executer){
        header("Location:admin.php?msg5=Etudiant supprimé avec succès!");
    }
    else
    header("Location:admin.php?msg5=Erreur de suppression.");

}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
?>