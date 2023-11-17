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
			
            $serv->setId($retorno[0]['id']);
            $serv->setNome($retorno[0]['nome']);
            $serv->setDescricao($retorno[0]['descricao']);
            $serv->setValor($retorno[0]['valor']);
            //$serv = $this->preencherServicos($retorno[0]);

            $this->con->desconectar();
            return $serv;
        }

        /*function preencherServicos($servico){
            $s = new Servico();
            $s->setId($servico['id']);
            $s->setNome($servico['nome']);
            $s->setDescricao($servico['descricao']);
            $s->setValor($servico['valor']);
            return $s;
        }*/

        function buscar($texto){

            //CÓDIGO DE BUSCAR - SELECT
            $lista = array();

            $sql="SELECT * FROM servicos WHERE nome LIKE '%".$texto."%';";
            
            //========== !!!!!!!!!!!!!! acertar a exibição da busca no Mysql !!!!!!!!!!!!!!!!!! =============
            
            $this->con->conectar();
            $retorno = $this->con->buscar($sql);
            foreach ($retorno as $r){
                //$servico = $this->preencherServicos($r);    
                $peca = new Peca();
                $peca->setId($r[0]['id']);
                $peca->setNome($r[0]['nome']);
                $peca->setDescricao($r[0]['descricao']);
                $peca->setValor($r[0]['valor']);
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
            $sql = "UPDATE servicos SET nome = '".$s->getNome()."', descricao = '".$s->getDescricao()."', valor = '".$s->getValor()."' WHERE id='".$s->getId()."'";

            //die($sql);

            $this->con->conectar();
            $this->con->executar($sql);
            $this->con->desconectar();
        }
        function deletar(Servico $s){

            //$sql = "DELETE FROM servicos WHERE id=".$s->getId();
            $sql = "DELETE FROM servicos WHERE id=".$s;

            $this->con->conectar();
            $this->con->executar($sql);
            $this->con->desconectar();
        }
    }
?>
