<?php 

    class cPeriodoE {
        private $idperiodo;
        private $nomb_per;
        private $fini_per;
        private $ffin_per;
        private $estd_per;

        function getIdperiodo(){
            return $this -> idperiodo;
        }
        function getNomb_per(){
            return $this -> nomb_per;
        }

        function getEstd_per(){
            return $this -> estd_per;
        }

        function getInicio_per(){
            return $this -> fini_per;
        }

        function getFfin_per(){
            return $this -> ffin_per;
        }

        function setIdperiodo($idperiodo)
        {
            $this -> idperiodo = $idperiodo;
        }

        function setNomb_per($nomb_per)
        {
            $this -> nomb_per = $nomb_per;
        }

        function setInicio_per($fini_per)
        {
            $this -> fini_per = $fini_per;
        }

        function setFfin_per($ffin_per)
        {
            $this -> ffin_per = $ffin_per;
        }

        function setEstd_per($estd_per)
        {
            $this -> estd_per = $estd_per;
        }
    }

?>