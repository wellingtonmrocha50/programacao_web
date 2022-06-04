<?php
//conexao banco de dados
$servername ="localhost";
$usename = "root";
$password ="";
$db_name = "dentalcare";

$connect = mysqli_connect($servername,$usename,$password,$db_name);
mysqli_set_charset($connect, "utf8");

if(mysqli_connect_error()):
    echo "Erro na conexao:" .myqli_connect_error();
endif;