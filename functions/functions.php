<?php
require_once "./configs/bootstrap.php";


function addUser ($connection, $prenom, $nom, $mail, $tel, $age, $spe){

    $req = $connection->prepare("INSERT INTO users VALUES(NULL, '$prenom', '$nom','$mail', '$tel', '$age', '$spe')");
    $req->execute();

    if($req){
        header("location: ./listeContact.php");
    }else {
        $message = "Utilisateur non ajouté";
    }
}

function updateUser ($connection, $prenom, $nom, $mail, $tel, $age, $id, $spe){

    $req = $connection->prepare("UPDATE users SET prenom = '$prenom' , nom = '$nom' , mail = '$mail', tel = '$tel', age ='$age', spe='$spe' WHERE id = $id");
    $req->execute();

    if($req){
        header("location: ./listeContact.php");
    }else {
        $message = "Utilisateur non modifé";
    }

}

function deleteUser($connection, $id){

    $req = $connection->prepare("DELETE FROM users WHERE id =?");
    $req->execute(array($id));

    if($req){
        header("location: ./listeContact.php");
    }else {
        $message = "Utilisateur non supprimé";
    }

}
