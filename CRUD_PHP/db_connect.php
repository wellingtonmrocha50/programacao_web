<?php
//conexao com banco de dados

$servername = "localhost";
$usename = "root";
$password = "";
$bd_name = "crud";

$connect = mysqli_connect($servername,$usename,$password,$bd_name);
mysqli_set_charset($connect, "utf8");

if(mysqli_connect_error()):
    echo "erro na conexao:".mysqli_connect_error();
endif;