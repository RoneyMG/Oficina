<?php

    require_once ("../config/conexao.php");

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
			$serv = $this->preencherServicos($retorno[0]);

            $this->con->desconectar();
            return $serv;
        }

        function preencherServicos($servico){
            $s = new Servico();
            $s->setId($servico['id']);
            $s->setNome($servico['nome']);
            $s->setDescricao($servico['descricao']);
            $s->setValor($servico['valor']);

            return $s;

        }

        function buscar($texto){

            //CÓDIGO DE BUSCAR - SELECT
            $lista = array();

            $sql="SELECT * FROM servicos WHERE nome LIKE '%".$texto."%' OR descricao LIKE '%".$texto."%';";
            
            //========== !!!!!!!!!!!!!! acertar a exibição da busca no Mysql !!!!!!!!!!!!!!!!!! =============
            
            $this->con->conectar();
            $retorno = $this->con->buscar($sql);
            foreach ($retorno as $r){

                $servico = $this->preencherServicos($r);    
                
                array_push($lista, $servico);
            }
            $this->con->desconectar();
            return $lista;

        }
        function inserir(Servico $s){
            
            //CÓDIGO DE INSERIR - INSERT
            $sql = "INSERT INTO servicos (nome, descricao, valor) VALUES ('".$s->getNome()."', '".$s->getDescricao()."', '".$s->getValor()."')";
            
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
