<?php

    require_once ("../config/conexao.php");

    class DaoPecas{

        public $con;

        function __construct(){
            $this->con = new Conexao();
        }

        function buscarId($id){

            //CÓDIGO DE BUSCAR - SELECT
            $pc = new Peca();

            //criar SQL para buscar servicos
            $sql="SELECT * FROM pecas WHERE id=".$id;
            
            $this->con->conectar();
            $retorno = $this->con->buscar($sql);
			
			if (empty($retorno))
				return new Peca();
			
            $pc->setId($retorno[0]['id']);
            $pc->setNome($retorno[0]['nome']);
            $pc->setDescricao($retorno[0]['descricao']);
            $pc->setValor($retorno[0]['valor']);
            
            $this->con->desconectar();
            return $pc;
        }

        function buscar($texto){

            //A variável é texto, pois ela vai receber nome ou id que será verificado no banco pelo SELECT.
            $lista = array();

            $sql="SELECT * FROM pecas WHERE nome LIKE '%".$texto."%' OR id LIKE '%".$texto."%';";
            
            //========== !!!!!!!!!!!!!! acertar a exibição da busca no Mysql !!!!!!!!!!!!!!!!!! =============
            
            $this->con->conectar();
            $retorno = $this->con->buscar($sql);
            foreach ($retorno as $r){
                $peca = new Peca();
                
                $peca->setId($retorno[0]['id']);
                $peca->setNome($retorno[0]['nome']);
                $peca->setDescricao($retorno[0]['descricao']);
                $peca->setValor($retorno[0]['valor']);
            
                array_push($lista, $peca);
            }
            $this->con->desconectar();
            return $lista;

        }
        function inserir(Peca $p){
            
            //CÓDIGO DE INSERIR - INSERT
            $sql = "INSERT INTO pecas (nome, descricao, valor) VALUES ('".$p->getNome()."', '".$p->getDescricao()."', '".$p->getValor()."')";
            
            $this->con->conectar();
            $this->con->executar($sql);
            $this->con->desconectar();

        }
        function atualizar(Peca $p){

            //CÓDIGO DE ATUALIZAR - UPDATE
            $sql = "UPDATE pecas SET nome = '".$p->getNome()."', descricao = '".$p->getDescricao()."', valor = '".$p->getValor()."' WHERE id='".$p->getId()."'";;

            //die($sql);

            $this->con->conectar();
            $this->con->executar($sql);
            $this->con->desconectar();
        }
        function deletar(Peca $p){

            //CÓDIGO DE DELETAR - DELETE
            //======== !!!!!!!!!! acertar o comando Mysql !!!!!!!!!! ==========
            $sql = "DELETE FROM pecas WHERE id=".$p->getId();

            $this->con->conectar();
            $this->con->executar($sql);
            $this->con->desconectar();
        }
    }



?>