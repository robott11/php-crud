<?php
include "includes/class/contato.class.php";
$contato = new Contato();

if(!empty($_POST["email"])) {
    $email = $_POST["email"];
    $name = $_POST["name"];

    $contato->AddUser($email, $name);
    header("Location: index.php");
} else {
    header("Location: adduser.php");
}