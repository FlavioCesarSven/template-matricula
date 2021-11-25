<?php 

class cMatriculaE{
private $idmatricula;
private $fech_mat;
private $fval_mat;
private $frat_mat;
private $fotv_mat;
private $turn_mat;
private $estd_mat;
private $idestudiante;
private $idciclo;
private $idperiodo;
private $idusuario;

public function getIdmatricula(){
    return $this->idmatricula;
}

public function setIdmatricula($idmatricula){
    $this->idmatricula = $idmatricula;
}

public function getFech_mat(){
    return $this->fech_mat;
}

public function setFech_mat($fech_mat){
    $this->fech_mat = $fech_mat;
}

public function getFval_mat(){
    return $this->fval_mat;
}

public function setFval_mat($fval_mat){
    $this->fval_mat = $fval_mat;
}

public function getFrat_mat(){
    return $this->frat_mat;
}

public function setFrat_mat($frat_mat){
    $this->frat_mat = $frat_mat;
}

public function getFotv_mat(){
    return $this->fotv_mat;
}

public function setFotv_mat($fotv_mat){
    $this->fotv_mat = $fotv_mat;
}

public function getTurn_mat(){
    return $this->turn_mat;
}

public function setTurn_mat($turn_mat){
    $this->turn_mat = $turn_mat;
}

public function getEstd_mat(){
    return $this->estd_mat;
}

public function setEstd_mat($estd_mat){
    $this->estd_mat = $estd_mat;
}

public function getIdestudiante(){
    return $this->idestudiante;
}

public function setIdestudiante($idestudiante){
    $this->idestudiante = $idestudiante;
}

public function getIdciclo(){
    return $this->idciclo;
}

public function setIdciclo($idciclo){
    $this->idciclo = $idciclo;
}

public function getIdperiodo(){
    return $this->idperiodo;
}

public function setIdperiodo($idperiodo){
    $this->idperiodo = $idperiodo;
}

public function getIdusuario(){
    return $this->idusuario;
}

public function setIdusuario($idusuario){
    $this->idusuario = $idusuario;
}

}


?>