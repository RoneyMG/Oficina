<?php

    require_once ("../controler/controle_servicos.php");
    require_once ("../model/servico.php");

	switch($_SERVER['REQUEST_METHOD'])
    {
        case 'POST': POST(); break;
        case 'PUT': PUT($_PUT); break;
        case 'DELETE': DELETE(); break;
        default : GET($_GET); break;
    }

	function GET($busca){
        
        $controleServico = new ControlerServicos();

        $Servicos = $controleServico->buscar("");
        $Servicos_json = json_encode($Servicos);
    
        echo $Servicos_json;

    }

    function POST(){

        $Servico = file_get_contents('php://input');

        $cli = json_decode($Servico);
        $controleServico = new ControlerServicos();
        $c = new Servico();

        $c->nome = $cli->nome;
        $c->telefone = $cli->telefone;
        $c->cpf = $cli->cpf;
        $c->endereco = $cli->endereco;
        
        $controleServico->inserir($c);
    }
    function DELETE(){

        $idServico = file_get_contents('php://input');

        $controleServico = new ControlerServicos();
                
        $controleServico->deletar($idServico);

    }

?>