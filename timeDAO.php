<?php

require_once("time.class.php");
require_once("banco.php");

class timeDAO{

public function incluirTime($al1){

    $mat = $al1 ->getMatricula();
    $nom = $al1 ->getNome();
    $nas = $al1 ->getFundacao();
    $vit = $al1 ->getVitorias();
    $sed = $al1 ->getSede();
    $pres = $al1 ->getPresidente();
    $tre = $al1 ->getTreinador();

    $sql = "insert into times values ('$mat', '$nom', '$nas', '$vit', '$sed', '$pres','$tre')";

    //ABRINDO CONEXÃO
    
   $conn = connect();       
   
    //APLICANDO O SQL NA CONEXAO ,STATUS RECEBE O RETORNO
    
   $status = mysqli_query($conn, $sql);

return $status;


}

public function pesquisarTime($mat){
  $al1 = null;

 // MONTANDO O SQL PARA SELECIONAR DADOS NA TABELA ALUNO
 $sql = "select * from times where matricula=$mat";

 // ABRINDO CONEXÃO
 $conn = connect();
 
 // APLICANDO O SQL NA CONEXÃO, STATUS RECEBE O RETORNO
 $dados = mysqli_query($conn, $sql);
 $total = mysqli_num_rows($dados);
 
 if($total>0) {
 
   $al1 = new time();
   $linha = mysqli_fetch_array($dados);
   $al1->setMatricula($linha["matricula"]);
   $al1->setNome($linha["nome"]);
   $al1->setFundacao($linha["data_fundacao"]);
   $al1->setVitorias($linha['vitorias']);
   $al1->setSede($linha["sede"]);
   $al1->setPresidente($linha["presidente"]);
   $al1->setTreinador($linha["treinador"]);

}
    return $al1;
}

public function excluirTime($mat){
$matricula = $_GET['matricula'];

   // MONTANDO O SQL PARA SELECIONAR DADOS NA TABELA ALUNO
$sql = "delete from times where matricula=$mat";

// ABRINDO CONEXÃO
$conn = connect();

// APLICANDO O SQL NA CONEXÃO, STATUS RECEBE O RETORNO
$status = mysqli_query($conn, $sql);
return $status;

}


public function alterarTime($al1){

    $mat = $al1 ->getMatricula();
    $nom = $al1 ->getNome();
    $nas = $al1 ->getFundacao();
    $vit = $al1 ->getVitorias();
    $sed = $al1 ->getSede();
    $pres = $al1 ->getPresidente();
    $tre = $al1 ->getTreinador();

 // MONTANDO O SQL PARA SELECIONAR DADOS NA TABELA ALUNO
     $sql = "update times set nome='$nom', sede='$sed', 
      data_fundacao='$nas', vitorias='$vit', presidente='$pres' , treinador='$tre' where matricula='$mat'";

 // ABRINDO CONEXÃO
 $conn = connect();
 
 // APLICANDO O SQL NA CONEXÃO, STATUS RECEBE O RETORNO
 $status = mysqli_query($conn, $sql);

 return $status;


}
public function listarTime() {
   //iniciando a lista vazia
       $listarTime = null;

       // MONTANDO O SQL PARA SELECIONAR DADOS NA TABELA ALUNO
       $sql = "select * from times ";
      
       // ABRINDO CONEXÃO
       $conn = connect();
       
       // APLICANDO O SQL NA CONEXÃO, STATUS RECEBE O RETORNO
       $dados = mysqli_query($conn, $sql);
       $total = mysqli_num_rows($dados);
       
       if($total>0) {

         $linha = mysqli_fetch_array($dados);
         for($i=1;$i<=$total;$i++) {

                $al1 = new time();
               $al1->setMatricula($linha['matricula']);
               $al1->setNome($linha['nome']);
               $al1->setFundacao($linha['data_fundacao']);
               $al1->setVitorias($linha['vitorias']);
               $al1->setSede($linha['sede']);
               $al1->setPresidente($linha['presidente']);
               $al1->setTreinador($linha['treinador']);
               $listarTime[$i] = $al1;
               $linha = mysqli_fetch_assoc($dados);
      
}
          return $listarTime;


}
}


}

?>