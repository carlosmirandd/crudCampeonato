<?php

function connect(){

$banco= "campeonato";            // nome do banco de dados
$user= "root";              // nome do usuario
$servidor = "127.0.0.1";   // endereço do servidor
$senha = "";             // senha do usuario

$conn =mysqli_connect("$servidor", "$user", "$senha", "$banco") or die ("problema na conexão");
return $conn;
}

?>