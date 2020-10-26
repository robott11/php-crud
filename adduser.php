<?php
$title = "Adicionar usuário";
include "includes/header.php";
?>

<div class="container">
    <h1 class="text-center">Adicionar usuário</h1>
    <form method="POST" action="adduser-submit.php" style="margin:auto;width:500px;">
        <div class="form-group">
            <label for="nameInput">Nome do Usuário</label>
            <input type="text" class="form-control" name="name" id="nameInput" aria-describedby="nameHelp">
            <small id="nameHelp" class="form-text text-muted">OBS: O nome de usuário é opcional.</small>
        </div>
        <div class="form-group">
            <label for="emailInput">Endereço de email</label>
            <input type="email" class="form-control" name="email" id="emailInput">
        </div>
        <button type="submit" class="btn btn-primary btn-block" name="adduser-submit-button">Adicionar</button>
        <a href="index.php" class="btn btn-secondary btn-sm" style="margin-top:10px;">Voltar</a>
    </form>
</div>

<?php include "footer.php"; ?>