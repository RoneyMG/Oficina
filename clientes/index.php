<?php

    require_once ("../controler/controle_clientes.php");
    require_once ("../model/cliente.php");

    //print_r($_SERVER['REQUEST_METHOD']);

    switch($_SERVER['REQUEST_METHOD'])
    {
        case 'POST': POST(); break;
        case 'PUT': PUT($_PUT); break;
        case 'DELETE': DELETE(); break;
        default : GET($_GET); break;
    }

    function GET($busca){
        
        $controleCliente = new ControlerClientes();

        $clientes = $controleCliente->buscar("");
        $clientes_json = json_encode($clientes);
    
        echo $clientes_json;

    }

    function POST(){

        $cliente = file_get_contents('php://input');

        $cli = json_decode($cliente);
        $controleCliente = new ControlerClientes();
        $c = new Cliente();

        $c->nome = $cli->nome;
        $c->telefone = $cli->telefone;
        $c->cpf = $cli->cpf;
        $c->endereco = $cli->endereco;
        
        $controleCliente->inserir($c);
    }
    function DELETE(){

        $idCLiente = file_get_contents('php://input');

        $controleCliente = new ControlerClientes();
                
        $controleCliente->deletar($idCLiente);

    }

?>