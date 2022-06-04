<?php
session_start();
require_once 'conexao.php';

//verificando se existe botao (submit)
if(isset($_POST['submit'])):
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    $number = mysqli_escape_string($connect, $_POST['number']);
    $date = mysqli_escape_string($connect, $_POST['date']);

    $sql = "INSERT INTO clientes (nome,email,number,date) VALUES ('$nome', '$email','$number','$date')";

    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Cadastrado com sucesso!";
        header('Location: index.php');
    else:
        $_SESSION['mensagem'] = "Erro ao Cadastrar!";
        header('Location: index.php?erro na conexao');
    endif;
endif;