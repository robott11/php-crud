<?php
include "includes/class/contato.class.php";
$contato = new Contato();

if(!empty($_POST["id"])) {
    $newName = $_POST["new-name"];
    $newEmail = $_POST["new-email"];
    $id = $_POST["id"];

    if(!empty($newEmail)) {

        $contato->Edit($newName, $newEmail, $id);
    }
}
header("Location: index.php");