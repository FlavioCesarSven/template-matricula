<?php 

    class cProgramaE {
        private $idprograma;
        private $nomb_pro;
        private $desc_pro;
        private $estd_pro;

        function getIdprograma(){
            return $this -> idprograma;
        }
        function getNomb_pro(){
            return $this -> nomb_pro;
        }
        function getDesc_pro(){
            return $this -> desc_pro;
        }
        function getEstd_pro(){
            return $this -> estd_pro;
        }

        function setIdprograma($idprograma)
        {
            $this -> idprograma = $idprograma;
        }

        function setNomb_pro($nomb_pro)
        {
            $this -> nomb_pro = $nomb_pro;
        }

        function setDesc_pro($desc_pro)
        {
            $this -> desc_pro = $desc_pro;
        }

        function setEstd_pro($estd_pro)
        {
            $this -> estd_pro = $estd_pro;
        }
    }

?>