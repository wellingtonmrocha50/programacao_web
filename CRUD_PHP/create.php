<?php
//iniciando a sessão mensagem
session_start();

//chamando a conexao
require_once 'db_connect.php';

//criando xss-cross site scripting-impede de adicionar codigo malicioso
function clear($input){
    global $connect;
    $var = mysqli_escape_string($connect, $input);

    //xss
    $var = htmlspecialchars($var);
    return $var;
}

//verificando se existe btn-cadastrar na super global POST
if(isset($_POST['btn-cadastrar'])):
    $nome = clear($_POST['nome']);
    $sobrenome = clear($_POST['sobrenome']);
    $email = clear($_POST['email']);
    $endereco = clear($_POST['endereco']);

    $sql = "INSERT INTO clientes (nome,sobrenome,email,endereco) VALUE ('$nome','$sobrenome','$email','$endereco')";

//verificando se foi inserido os dados no banco de dados
    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "cadastrado com sucesso!";
        header('Location: index.php');
    else:
        $_SESSION['mensagem'] = "Error ao cadastrar!";
        header('Location: index.php');

    endif;
endif;