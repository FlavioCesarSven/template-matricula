<?php 

    class cOperadorE {
        private $idoperador;
        private $nomb_ope;
        private $estd_ope;

        function getIdoperador(){
            return $this -> idoperador;
        }
        function getNomb_ope(){
            return $this -> nomb_ope;
        }

        function getEstd_ope(){
            return $this -> estd_ope;
        }

        function setIdoperador($idoperador)
        {
            $this -> idoperador = $idoperador;
        }

        function setNomb_ope($nomb_ope)
        {
            $this -> nomb_ope = $nomb_ope;
        }

        function setEstd_ope($estd_ope)
        {
            $this -> estd_ope = $estd_ope;
        }
    }

?>