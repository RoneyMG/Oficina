<?php

    require_once ("config/conexao.php");

    class DaoServicos{

        public $con;

        function __construct(){
            $this->con = new Conexao();
        }

        function buscarId($id){

            //CÓDIGO DE BUSCAR - SELECT
            $serv = new Servico();

            //criar SQL para buscar servicos
            $sql="SELECT * FROM servicos WHERE id=".$id;
            
            $this->con->conectar();
            $retorno = $this->con->buscar($sql);
			
			if (empty($retorno))
				return new Servico();
			
            $serv->setId($retorno[0]['id']);
            $serv->setNome($retorno[0]['nome']);
            

            $this->con->desconectar();
            return $serv;
        }

        function buscar($texto){

            //CÓDIGO DE BUSCAR - SELECT
            $lista = array();

            $sql="SELECT * FROM servicos WHERE nome LIKE '%".$texto."%' OR id LIKE '%".$texto."%';";
            
            //========== !!!!!!!!!!!!!! acertar a exibição da busca no Mysql !!!!!!!!!!!!!!!!!! =============
            
            $this->con->conectar();
            $retorno = $this->con->buscar($sql);
            foreach ($retorno as $r){
                $servico = new Servico();
                
                $servico->setId($r['id']);
                $servico->setNome($r['nome']);
            
                array_push($lista, $servico);
            }
            $this->con->desconectar();
            return $lista;

        }
        function inserir(Servico $s){
            
            //CÓDIGO DE INSERIR - INSERT
            $sql = "INSERT INTO servicos (nome) VALUES ('".$s->getNome()."')";
            
            $this->con->conectar();
            $this->con->executar($sql);
            $this->con->desconectar();

        }
        function atualizar(Servico $s){

            //CÓDIGO DE ATUALIZAR - UPDATE
            $sql = "UPDATE servicos SET nome = '".$s->getNome()."' WHERE id='".$s->getId()."'";

            //die($sql);

            $this->con->conectar();
            $this->con->executar($sql);
            $this->con->desconectar();
        }
        function deletar(Servico $s){

            //CÓDIGO DE DELETAR - DELETE
            //====================== !!!!!!!!!!!!!!!!!! acertar o comando Mysql !!!!!!!!!!!!!!! ========================
            $sql = "DELETE FROM servicos WHERE id=".$s->getId();

            $this->con->conectar();
            $this->con->executar($sql);
            $this->con->desconectar();
        }
    }



?>
