<?php 
session_start();
include("navbar.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="style.css" >
    
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row pt-4">
<form action="ajouter.php" method="POST">
    <fieldset>
    <legend> Nouveau Etudiant</legend>
    <div class="form-group">
        <label for="input1" class="col-sm-2 control-label">Prenom</label>
        <div class="col-sm-10">
            <input type="text" name="prenom" placeholder="prenom" class="form-control" id="input1">

        </div>
    </div>
    <div class="form-group">
        <label for="input1" class="col-sm-2 control-label">Nom</label>
        <div class="col-sm-10">
            <input type="text" name="nom" placeholder="nom" class="form-control" id="input1">

        </div>
    </div>
    <div class="form-group">
        <label for="input1" class="col-sm-2 control-label">Login</label>
        <div class="col-sm-10">
            <input type="text" name="login" placeholder="login" class="form-control" id="input1">

        </div>
    </div>
    <div class="form-group">
        <label for="input1" class="col-sm-2 control-label">Mot de Passe</label>
        <div class="col-sm-10">
            <input type="password" name="mdp" placeholder="mot de passe" class="form-control" id="input1">

        </div>
    </div>
    <div class="form-group">
        <label for="input1" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input type="email" name="email" placeholder="email" class="form-control" id="input1">

        </div>
    </div>
    <div class="form-group">
        <label for="input1" class="col-sm-2 control-label">Adresse</label>
        <div class="col-sm-10">
            <input type="text" name="adresse" placeholder="adresse" class="form-control" id="input1">

        </div>
    </div>
    <div class="form-group">
        <label for="input1" class="col-sm-2 control-label">Telephone</label>
        <div class="col-sm-10">
            <input type="text" name="telephone" placeholder="telephone" class="form-control" id="input1">

        </div>
    </div>
    <div class="pt-4">
       
            <input type="submit" value="Ajouter"  class="btn btn-primary m-3" >
            <a href="admin.php"><button class="btn btn-success m-3" type="button">   Voir liste etudiants</button> </a>


    </div>

    </fieldset>
   
 </form>
 </div>
 </div>
</body>
</html>
<?php
include("conn.php");

try {
    //connexion au serveur de BD
    $conn = new PDO("mysql:host=$server;dbname=$bd", $user, $mdp);
    // Définir le mode d'erreur PDO comme l'exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo "Connected successfully";
   $stmt = $conn->prepare("INSERT INTO etudiant ( Prenom,Nom,Login,Mdp,Email,Adresse,Telephone) VALUES (:Prenom, 
    :Nom,:Login,:Mdp,:Email,:Adresse,:Telephone)");
   
    $stmt->bindParam(':Prenom', $prenom);
    $stmt->bindParam(':Nom', $nom);
    $stmt->bindParam(':Login', $login);
    $stmt->bindParam(':Mdp', $mdp);
    $stmt->bindParam(':Email', $mail);
    $stmt->bindParam(':Adresse', $adresse);
    $stmt->bindParam(':Telephone', $tel);
 
   if(isset($_REQUEST["prenom"])){
    $prenom=$_REQUEST["prenom"];
    $nom=$_REQUEST["nom"];
    $login=$_REQUEST["login"];
    $mdp=$_REQUEST["mdp"];
    $mail=$_REQUEST["email"];
    $adresse=$_REQUEST["adresse"];
    $tel=$_REQUEST["telephone"];
    $stmt->execute(); 
    header("location:admin.php?msg3=Etudiant ajouté avec succés.");
   }
  
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}

?>