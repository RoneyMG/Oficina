<?php
    require_once ("../model/dao/dao_servico.php");

    class ControlerServicos{
        public $daoServico;

        function __construct(){
            $this->daoServico = new DaoServicos(); 
        }
        function buscarId($id){
            return $this->daoServico->buscarId($id);
        }
        function buscar($texto){
            return $this->daoServico->buscar($texto);
        }
        function inserir(Servico $s){
            if (empty($s->getNome()))
                die("Informe o Nome para salvar.");
            $this->daoServico->inserir($s);
        }
        function atualizar(Servico $s){
            if (empty($s->getId()))
                die("Informe o ID.");
            $this->daoServico->atualizar($s);
        }
        function deletar(Servico $s){
            $this->daoServico->deletar($s);
        }
        //----  Inserir Echo confirmando o "Serviço deletado"!!!!   ----
    }



?>