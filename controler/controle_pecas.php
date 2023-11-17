<?php
    require_once ("../model/dao/dao_peca.php");

    class ControlerPecas{
        public $daoPeca;

        function __construct(){
            $this->daoPeca = new DaoPecas(); 
        }
        function buscarId($id){
            return $this->daoPeca->buscarId($id);
        }
        function buscar($texto){
            return $this->daoPeca->buscar($texto);
        }
        function inserir(Peca $p){
            if (empty($p->getNome()))
                die("Informe o Nome para salvar.");
            if (empty($s->getDescricao()))
                die("Informe a descrição.");
            if (empty($s->getValor()))
                die("Informe o valor.");
            $this->daoPeca->inserir($p);
        }
        function atualizar(Peca $p){
            if (empty($p->getId()))
            die("Informe o ID.");

            $this->daoPeca->atualizar($p);
        }
        function deletar($p){//Ver se na funcao é para inserir Peca.
            $this->daoPeca->deletar($p);
        }
    }
?>