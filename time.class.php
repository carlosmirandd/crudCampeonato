<?php
class time {

private $matricula = 0;
private $nome = 'sem nome';
private $data_fundacao = '0000-00-00';
private $vitorias = 'indefinido';
private $sede = 'indefinido';
private $presidente = 'indefinido';
private $treinador = 'indefinido';


public function setMatricula ($novaMatricula) {
   $this->matricula = $novaMatricula;
}
public function setNome ($novoNome){
    $this->nome = $novoNome;
}
public function setFundacao ($novoFundacao){
    $this->data_fundacao = $novoFundacao;
}
public function setVitorias ($novoVitorias){
    $this->vitorias = $novoVitorias;
}
public function setSede ($novoSede){
    $this->sede = $novoSede;
}
public function setPresidente($novoPresidente){
    $this->presidente = $novoPresidente;
}
public function setTreinador($novoTreinador){
    $this->treinador = $novoTreinador;
}


public function getMatricula(){
  return $this->matricula;
}
public function getNome(){
  return $this->nome;
}
public function getVitorias(){
   return $this->vitorias;
}
public function getFundacao(){
  return $this->data_fundacao;
}
public function getSede(){
  return $this->sede;
}
 

public function getPresidente() {
  return $this->presidente;
}
public function getTreinador() {
    return $this->treinador;
  }


}



?>