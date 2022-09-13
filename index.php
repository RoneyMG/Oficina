<?php

    require_once ("controler/controle_clientes.php");
    require_once ("model/cliente.php");
    require_once ("model/endereco.php");

    $controleCliente = new ControlerClientes();



    //$cliente = new Cliente();
    //$cliente->setId(12);
    //$cliente->setNome("Bia");
    //$cliente->setCpf("05795897736");
    //$cliente->setTelefone("27744556");

    //=== FUNÇÕES CHAMADAS - 1 POR VEZ ===
    $cliente = $controleCliente->buscarId(14);
    echo "<pre>";
    //print_r($retorno);
    print_r($cliente);
    echo "</pre>";
    $clientes = $controleCliente->buscar('pedro');
    echo "<pre>";
    //print_r($retorno);
    print_r($clientes);
    echo "</pre>"
    //$controleCliente->inserir($cliente);
    //$controleCliente->atualizar($cliente);
    //$controleCliente->deletar($cliente);

?>