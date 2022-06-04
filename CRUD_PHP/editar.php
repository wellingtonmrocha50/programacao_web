<?php
include_once 'db_connect.php';
include_once 'header.php';

//verificando se existe id atraves do GET
if(isset($_GET['id'])):
    $id = mysqli_escape_string($connect, $_GET['id']);

    $sql = "SELECT * FROM clientes WHERE id = '$id'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
endif;
?>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Editar Cliente</h3>

        <form action="atualizar.php" method="POST">
            <input type="hidden" name = "id"value="<?php echo $dados['id'];?>">
            <div class="input-field col s12">
                <input type="text" name="nome" id="nome" value="<?php echo $dados['nome'];?>">
                <label for="nome">Nome</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="sobrenome" id="sobrenome" value="<?php echo $dados['sobrenome'];?>">
                <label for="sobrenome">SobreNome</label>
            </div>

            <div class="input-field col s12">
                <input type="email" name="email" id="email" value="<?php echo $dados['email'];?>">
                <label for="email">Email</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="endereco" id="endereco" value="<?php echo $dados['endereco'];?>">
                <label for="endereco">endereco</label>
            </div>

            <button type="submit" name="btn-editar" class="btn">Atualizar</button>
            <a href="index.php"class="btn green">Lista de Cliente</a>
        </form>
    </div>
</div>

<?php
include_once 'footer.php';
?>
