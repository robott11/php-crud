<?php
$title = "Editar Usuário";
include "includes/header.php";
include "includes/class/contato.class.php";
$contato = new Contato();

if(!empty($_GET["id"])) {
    $id = $_GET["id"];

    $info = $contato->GetInfo($id);
    if(empty($info["email"])) {
        header("Location: index.php");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}
?>

<div class="container">
    <h1 class="text-center">Editar usuário</h1>
    <form method="POST" action="edit-submit.php" style="margin:auto;width:500px;">
        <input type="hidden" value="<?php echo $info["id"]; ?>" name="id">
        <div class="form-group">
            <label for="nameInput">Novo nome de usuário</label>
            <input type="text" class="form-control" name="new-name" value="<?php echo $info["name"]; ?>" id="nameInput">
        </div>
        <div class="form-group">
            <label for="emailInput">Novo endereço de email do usuário</label>
            <input type="email" class="form-control" name="new-email" value="<?php echo $info["email"]; ?>" id="emailInput" aria-describedby="editEmailHelp">
            <small id="editEmailHelp" class="form-text text-muted">Emails não podem se repetir.</small>
        </div>
        <button type="submit" class="btn btn-primary btn-block" name="adduser-submit-button">Salvar</button>
        <a href="index.php" class="btn btn-secondary btn-sm" style="margin-top:10px;">Voltar</a>
    </form>
</div>

<?php include "footer.php";