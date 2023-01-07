<?php

use src\models\Auth;

require "vendor/autoload.php";

$config = new Auth;

?>

<?php require "partials/header.php"; ?>
<?php require "partials/aside.php" ?>

<div class="container-fluid my-4 px-5">
    <h2>Cadastro de setores</h2>
</div>
<div class="container-fluid my-2 px-5">
    <div style="max-width: 500px; min-width: 250px;">
        <form action="sectors_cad_action.php" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Nome do setor</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Ex: financeiro" required>
            </div>
            <button type="submit" class="btn btn-outline-primary">Cadastrar setor</button>
        </form>
    </div>
</div>

<?php require "partials/footer.php"; ?>