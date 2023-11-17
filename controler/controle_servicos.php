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
            if (empty($s->getDescricao()))
                die("Informe a descrição.");
            if (empty($s->getValor()))
                die("Informe o valor.");
            $this->daoServico->inserir($s);
        }
        function atualizar(Servico $s){
            if (empty($s->getId()))
                die("Informe o ID.");
            $this->daoServico->atualizar($s);
        }
        function deletar($s){
            $this->daoServico->deletar($s);
        }
        //----  Inserir Echo confirmando o "Serviço deletado"!!!!   ----
    }
?>