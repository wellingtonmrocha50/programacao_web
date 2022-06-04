<?php
//iniciando a sessão mensagem
session_start();

//chamando a conexao
require_once 'db_connect.php';

//verificando se existe btn-deletar na super global POST
if(isset($_POST['btn-deletar'])):
    $id = mysqli_escape_string($connect, $_POST['id']);

    $sql = "DELETE FROM clientes  WHERE id='$id'";

//verificando se foi inserido os dados no banco de dados
    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Deletado com sucesso!";
        header('Location: index.php');
    else:
        $_SESSION['mensagem'] = "Error ao Deletar!";
        header('Location: index.php');

    endif;
endif;