<?php
//iniciando a sessão mensagem
session_start();

//chamando a conexao
require_once 'db_connect.php';

//verificando se existe btn-editar na super global POST
if(isset($_POST['btn-editar'])):
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    $endereco = mysqli_escape_string($connect, $_POST['endereco']);

    $id = mysqli_escape_string($connect, $_POST['id']);

    $sql = "UPDATE clientes  SET nome = '$nome', sobrenome ='$sobrenome', email = '$email', endereco = '$endereco' WHERE id = '$id'";

//verificando se foi inserido os dados no banco de dados
    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Atualizado com sucesso!";
        header('Location: index.php');
    else:
        $_SESSION['mensagem'] = "Error ao Atualizar!";
        header('Location: index.php');

    endif;
endif;