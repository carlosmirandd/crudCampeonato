<?php

require_once("banco.php");
require_once("time.class.php");
require_once("timeDAO.php");

$al1 = new time();
$alDAO = new timeDAO();


$op = $_GET['op'];
if($op == 1){  //INCLUSAO

//SABER QUAL ENTRADA VAI SER EXECUTADA
$entrada= $_GET ['entrada'];

   //ENTRADA ! EXIBIR O FORMULARIO
if ($entrada == 1){
echo"
       <h1> CADASTRO DE TIME </h1>
  <hr>
       <form method='GET' action='principal.php'>
             MATRICULA: <input type='number' name='matricula'><BR>
             NOME:<input type='text' name='nome'> <br>
             DATA DE FUNDACAO:<input type='text' name='data_fundacao'><BR>
			 VITORIAS:<input type='number' name='vitorias'><BR>
             SEDE:<input type='text' name=sede><BR>
             PRESIDENTE:<input type='text' name=presidente><BR>
             TREINADOR: <input type='text' name=treinador><BR><BR>

             <input type ='hidden' name='op' value='1'>
             <input type= 'hidden' name='entrada' value='2'>
             <input type='submit' name='botao'>
             <input type='reset' name='botao'>
</form>
";
}

// PREENCHENDO O OBJETO COM OS DADOS VINDOS DO FORMULARIO DE INCLUSAO

if($entrada == 2) {

   $al1->setMatricula($_GET ['matricula']);
   $al1->setNome ($_GET ['nome']);
   $al1->setFundacao ($_GET ['data_fundacao']);
   $al1->setVitorias($_GET['vitorias']);
   $al1->setSede ($_GET ['sede']);
   $al1->setPresidente ($_GET  ['presidente']);
   $al1->setTreinador ($_GET ['treinador']);

//INVOCANDO O METODO DE INCLUIR ALUNO NO OBJETO alDAO
//que corresponde a inclusao do banco de dados contidos no objeto $al

$status = $alDAO -> incluirTime($al1);

//DE ACORDO COM O STATUS EXIBIR O RETORNO AO USUARIO

if($status==TRUE){
    echo "PARABÉNS!! SEU TIME FOI REGISTRADO!! ";
} else {
    echo"Algo deu errado no cadastro do time :/<BR>";
}

// EXIBIR O LINK DE VOLTA


   echo"<br><a href= 'index.php'>VOLTAR</A>";
  }
}

//listar
if($op==2){

$listarTime = $alDAO->listarTime();

if($listarTime==null);

echo"<center><h1>LISTAGEM DE TIMES<H1></center>
<hr>
<table border=2>

<TR><TH>MATRICULA</TH><TH>NOME</TH><TH>FUNDACAO</TH><TH>VITORIAS</TH><TH>SEDE</TH><TH>PRESIDENTE</TH><TH>TREINADOR</TH></TR>
";
// EXIBINDO OS DADOS
$total = count($listarTime);
 for($i=1; $i<=$total; $i++){

   $al1 = $listarTime[$i];
   $mat = $al1->getMatricula();
   $nom = $al1->getNome();
   $nas = $al1->getFundacao();
   $vit = $al1->getVitorias();
   $sed = $al1->getSede();
   $pres = $al1->getPresidente();    
   $tre = $al1->getTreinador();
   echo "\n<TR><Td>$mat</Td><Td>$nom</Td><Td>$nas</Td><Td>$vit</Td><Td>$sed</Td><Td>$pres</Td><TD>$tre</TD></TR>";
}

   echo"</table>";
        // EXIBIR O LINK DE VOLTAR
   echo "<br> <a href='index.php'>VOLTAR</A>";

}


// PESQUISAR
if($op==3){

// SABER QUAL ENTRADA A SER EXECUTADA
$entrada = $_GET['entrada'];

// ENTRADA 1 EXIBIR O FORMULÁRIO
if($entrada == 1) {
echo"
<h1> PESQUISA DE TIME </H1>
 <hr>
  <form method='GET' action='principal.php'>
   Digite a matrícula
    MATRICULA: <input type='number' name='matricula'><BR>
    <input type='hidden' name='op' value='3'>
    <input type='hidden' name='entrada' value='2'>
    <input type='submit' name='botao'>
    <input type='reset' name='botao'>
  </form>
";

}

// ENTRADA 2 PESQUISAR NO BANCO OS DADOS DO NOVO ALUNO
if($entrada == 2) {

 $mat = $_GET['matricula'];

  $al1 = $alDAO->pesquisarTime($mat);

 if($al1==null){
   echo"Seu time não está no campeonato!!";
   echo "<br> <a href='index.php'>VOLTAR</A>";
   exit(0);
}

echo"

<table border=2>
<TR><TH>MATRICULA</TH><TH>NOME</TH><TH>FUNDACAO</TH><TH>VITORIAS</TH><TH>SEDE</TH><TH>PRESIDENTE</TH><TH>TREINADOR</TH></TR>
";

// EXIBINDO OS DADOS
  $mat = $al1 ->getMatricula();
  $nom = $al1 ->getNome();
  $nas = $al1 ->getFundacao();
  $vit = $al1->getVitorias();
  $sed = $al1 ->getSede();
  $pres = $al1 ->getPresidente();
  $tre = $al1 ->getTreinador();


  echo "\n<TR><Td>$mat</Td><Td>$nom</Td><Td>$nas</Td><Td>$vit</Td><Td>$sed</Td><Td>$pres</Td><TD>$tre</TD></TR>";



        echo"</table>";
        // EXIBIR O LINK DE VOLTAR
        echo "<br> <a href='index.php'>VOLTAR</A>";

}
} 

// EXCLUIR
if($op==4){

// SABER QUAL ENTRADA A SER EXECUTADA
$entrada = $_GET['entrada'];

// ENTRADA 1 EXIBIR O FORMULÁRIO
if($entrada == 1) {
   echo"
   <h1> PESQUISA DE ELIMINAÇÃO </H1>
   <hr>
   <form method='GET' action='principal.php'>
      Digite a matrícula
   MATRICULA: <input type='number' name='matricula'><BR>
   <input type='hidden' name='op' value='4'>
   <input type='hidden' name='entrada' value='2'>
   <input type='submit' name='botao' >
   <input type='reset' name='botao'>
   </form>
   ";
}

// ENTRADA 2 PESQUISAR NO BANCO OS DADOS DO NOVO ALUNO
if($entrada == 2) {

   $mat = $_GET['matricula'];
   
      // MONTANDO O SQL PARA SELECIONAR DADOS NA TABELA ALUNO
   $al1 = $alDAO->pesquisarTime($mat);
		
   // VERIFICA SE O $al é nulo
   if($al1==null) {
         echo"Seu time não se encontra no campeonato ou já foi eliminado.";
            echo "<br> <a href='index.php'>VOLTAR</A>";	
             exit(0);					
   }

   // EXIBINDO OS DADOS
   $mat = $al1->getMatricula();
   $nom = $al1->getNome();
   $nas = $al1->getFundacao();
   $vit = $al1->getVitorias();
   $sed = $al1->getSede();
   $pres = $al1->getPresidente();	
   $tre = $al1->getTreinador();		


   //EXIBINDO O FORMULÁRIO JÁ PREENCHIDO
     echo"
      <h1> EXCLUSÃO DE TIMES </H1>
      <hr>
      <form method='GET' action='principal.php'>
          <table border=2>
         <TR><TH>MATRICULA</TH><TH>NOME</TH><TH>FUNDACAO</TH><TH>VITORIAS</TH><TH>SEDE</TH><TH>PRESIDENTE</TH><TH>TREINADOR</TH></TR>
         \n<TR><Td>$mat</Td><Td>$nom</Td><Td>$nas</Td><Td>$vit</Td><Td>$sed</Td><Td>$pres</Td><Td>$tre</Td></TR>	
             </TABLE>
         <br><br> DESEJA ELIMINAR O TIME?
         <INPUT type=radio name=opexcluir value =1> ELIMINAR
         <INPUT type=radio name=opexcluir value =2 checked> CANCELAR  <BR>
         <INPUT TYPE=HIDDEN name=matricula value=$mat>
         <input type='hidden' name='op' value='4'>
         <input type='hidden' name='entrada' value='3'>	
         <input type='submit' name='botao'>
         <input type='reset' name='botao'>	
      </form>	
   ";

     // EXIBIR O LINK DE VOLTAR
    echo "<br> <a href='index.php'>VOLTAR</A>";
   
}
// ENTRADA 2 EXCLUIR NO BANCO OS DADOS DO ALUNO
if($entrada == 3) {

   $matricula = $_GET['matricula'];
     $opexcluir = $_GET['opexcluir'];

   if($opexcluir==2) {
      echo"Seu time não foi eliminado!";
      echo "<br> <a href='index.php'>VOLTAR</A>";	
      
   } else {
          // MONTANDO O SQL PARA SELECIONAR DADOS NA TABELA ALUNO 
          $sql = "delete from times where matricula=$matricula";

      // ABRINDO CONEXÃO
           $conn = connect();
   
        //APLICANDO O SQL NA CONEXÃO, STATUS RECEBE O RETORNO
           $status = mysqli_query($conn, $sql);

   
      if($status==TRUE) {
         echo"SEU TIME FOI ELIMINADO!! DESCANSE EM PAZ!!!";
            echo "<br> <a href='index.php'>VOLTAR</A>";	
             exit(0);				
      }
   }	

}

}



//alterar
if($op==5){

// SABER QUAL ENTRADA A SER EXECUTADA
$entrada = $_GET['entrada'];

// ENTRADA 1 EXIBIR O FORMULÁRIO
if($entrada == 1) {
echo"
  <h1> PESQUISA DE TIMES PARA ALTERAÇÃO </H1>
  <hr>
   <form method='GET' action='principal.php'>
   Digite a matricula
   MATRICULA: <input type='number' name='matricula'><BR>
  <input type='hidden' name='op' value='5'>
  <input type='hidden' name='entrada' value='2'>
  <input type='submit' name='botao'>
  <input type='reset' name='botao'>
  </form>
         ";
}

if($entrada==2){

$mat = $_GET['matricula'];

     $al1 = $alDAO->pesquisarTime($mat);
   
   if($al1==null){
      echo"Seu time não foi encontrado.";
      echo "<br> <a href='index.php'>VOLTAR</A>";
      exit(0);

}

// EXIBINDO OS DADOS


$mat = $al1->getMatricula();
$nom = $al1->getNome();
$nas = $al1->getFundacao();
$vit = $al1->getVitorias();
$sed = $al1->getSede();
$pres = $al1->getPresidente();   
$tre = $al1->getTreinador();

//EXIBINDO O FORMULÁRIO JÁ PREENCHIDO
echo"
       <h1> ALTERAÇÃO DE TIMES </h1>
  <hr>
       <form method='GET' action='principal.php'>
             MATRICULA: <input type='number' name='matricula' value='$mat'><BR>
             NOME:<input type='text' name='nome' value='$nom'> <br>
             DATA DE FUNDACAO:<input type='text' name='data_fundacao' value='$nas'><BR>
             VITORIAS:<input type='number' name='vitorias' value='$vit'><BR>
			 ENDEREÇO:<input type='text' name='sede' value='$sed'><BR>
             PRESIDENTE: <input type='text' name='presidente' value='$pres'><br>
             TREINADOR: <input type='text' name='treinador' value='$tre'><br>

 <input type ='hidden' name='op' value='5'>
 <input type= 'hidden' name='entrada' value='3'>
        <input type='submit' name='botao'>
        <input type='reset' name='botao'>
</form>
";
        // EXIBIR O LINK DE VOLTAR
   echo "<br> <a href='index.php'>VOLTAR</A>";

}





if($entrada==3){

$al1->setMatricula($_GET ['matricula']);
$al1->setNome ($_GET ['nome']);
$al1->setFundacao ($_GET ['data_fundacao']);
$al1->setVitorias($_GET['vitorias']);
$al1->setSede ($_GET ['sede']);
$al1->setPresidente ($_GET  ['presidente']);
$al1->setTreinador ($_GET ['treinador']);

 $status = $alDAO->alterarTime($al1);


if($status==TRUE){

echo "Seu time foi alterado com êxito!!";
} else {
echo"Alteração não realizada.";
}

// EXIBIR O LINK DE VOLTA


echo"<br><a href= 'index.php'>VOLTAR</A>";
 
}


}

?>