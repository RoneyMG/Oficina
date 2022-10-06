<?php

    require_once ("../config/conexao.php");

    class DaoClientes{

        public $con;

        function __construct(){
            $this->con = new Conexao();
        }

        function buscarId($id){

            //CÓDIGO DE BUSCAR - SELECT
            $cli = new Cliente();

            $sql="SELECT * FROM clientes WHERE id=".$id;
            
            $this->con->conectar();
            $retorno = $this->con->buscar($sql);
			
			if (empty($retorno))
				return new Cliente();
			
            $cli->setId($retorno[0]['id']);
            $cli->setNome($retorno[0]['nome']);
            $cli->setCpf($retorno[0]['cpf']);
            $cli->setTelefone($retorno[0]['telefone']);
            $cli->setEndereco($retorno[0]['endereco']);//Para o ENDEREÇO

            $this->con->desconectar();
            return $cli;
        }

        function buscar($texto){

            //CÓDIGO DE BUSCAR - SELECT
            $lista = array();

            $sql="SELECT * FROM clientes WHERE nome LIKE '%".$texto."%' OR cpf LIKE '%".$texto."%';";
            
            //========== !!!!!!!!!!!!!! acertar a exibição da busca no Mysql !!!!!!!!!!!!!!!!!! =============
            
            $this->con->conectar();
            $retorno = $this->con->buscar($sql);
            foreach ($retorno as $r){
                $cliente = new Cliente();
                
                $cliente->setId($r['id']);
                $cliente->setNome($r['nome']);
                $cliente->setCpf($r['cpf']);
                $cliente->setTelefone($r['telefone']);
                $cliente->setEndereco($r['endereco']);//Para o ENDEREÇO

                array_push($lista, $cliente);
            }
            $this->con->desconectar();
            return $lista;

        }
        function inserir(Cliente $c){
            
            //CÓDIGO DE INSERIR - INSERT
            $sql = "INSERT INTO clientes (nome, cpf, telefone, endereco) VALUES ('".$c->getNome()."', '".$c->getCpf()."', '".$c->getTelefone()."', '".$c->getEndereco()."')";
            
            $this->con->conectar();
            $this->con->executar($sql);
            $this->con->desconectar();

        }
        function atualizar(Cliente $c){

            //CÓDIGO DE ATUALIZAR - UPDATE
            $sql = "UPDATE clientes SET nome = '".$c->getNome()."', cpf = '".$c->getCpf()."', telefone = '".$c->getTelefone()."', endereco = '".$c->getEndereco()."' WHERE id='".$c->getId()."'";

            //die($sql);

            $this->con->conectar();
            $this->con->executar($sql);
            $this->con->desconectar();
        }
        function deletar($c){

            //CÓDIGO DE DELETAR - DELETE
            //====================== !!!!!!!!!!!!!!!!!! acertar o comando Mysql !!!!!!!!!!!!!!! ========================
            $sql = "DELETE FROM clientes WHERE id=".$c;

            $this->con->conectar();
            $this->con->executar($sql);
            $this->con->desconectar();
        }

    }



?>