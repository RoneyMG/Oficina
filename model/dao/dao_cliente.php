<?php

    require_once ("config/conexao.php");

    class DaoClientes{

        public $con;

        function __construct(){
            $this->con = new Conexao();
            
        }

        function buscar(Cliente $c){

            //CÓDIGO DE BUSCAR - SELECT
            $sql="SELECT * FROM clientes WHERE id='".$c->getID()."'";
            
            //========== !!!!!!!!!!!!!! acertar a exibição da busca no Mysql !!!!!!!!!!!!!!!!!! =============
            echo "";

            $this->con->conectar();
            $this->con->executar($sql);
            $this->con->desconectar();
        }
        function inserir(Cliente $c){
            
            //CÓDIGO DE INSERIR - INSERT
            $sql = "INSERT INTO clientes (nome, cpf, telefone) VALUES ('".$c->getNome()."', ".$c->getCpf().", '".$c->getTelefone()."')";
            
            $this->con->conectar();
            $this->con->executar($sql);
            $this->con->desconectar();

        }
        function atualizar(Cliente $c){

            //CÓDIGO DE ATUALIZAR - UPDATE
            $sql = "UPDATE clientes SET nome = 'Ana', cpf = '05795897736', telefone = '33334444' WHERE id='".$c->getId()."'";

            $this->con->conectar();
            $this->con->executar($sql);
            $this->con->desconectar();
        }
        function deletar(Cliente $c){

            //CÓDIGO DE DELETAR - DELETE
            //====================== !!!!!!!!!!!!!!!!!! acertar o comando Mysql !!!!!!!!!!!!!!! ========================
            $sql = "DELETE FROM clientes WHERE id='".$c->getId()."'";

            $this->con->conectar();
            $this->con->executar($sql);
            $this->con->desconectar();
        }

    }



?>