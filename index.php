<?php
$title = "CRUD oo";
include "includes/header.php";
include "includes/class/contato.class.php";
$contato = new Contato();
?>

<div class="container">
    <h1 class="text-center">Contatos</h1>
    <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $list = $contato->GetAll();
            foreach($list as $item):
            ?>
            <tr>
                <td scope="row"><?php echo $item[id]; ?></td>
                <td><?php echo $item[name]; ?></td>
                <td><?php echo $item[email]; ?></td>
                <td>
                    <div class="d-flex justify-content-between">
                        <a href="edit.php?id=<?php echo $item[id]; ?>" class="btn btn-primary btn-sm btn-block" style="margin: 0 5px">Editar</a>
                        <a href="delete.php?id=<?php echo $item[id]; ?>" class="btn btn-danger btn-sm btn-block" style="margin: 0 5px">Deletar</a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="adduser.php">Adicionar Usuário</a>    
</div>

<?php include "footer.php"; ?>