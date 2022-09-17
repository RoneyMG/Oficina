<?php

    require_once ("controler/controle_clientes.php");
    require_once ("model/cliente.php");
    require_once ("model/endereco.php");

    $controleCliente = new ControlerClientes();

    $cliente = new Cliente();
    $cliente->setId(2);
    $cliente->setNome("Jailson");
    $cliente->setCpf("05835409702");
    $cliente->setTelefone("27981720628");
    $cliente->setEndereco("Rua Juscelino Kubitscheck de Oliveira, 11, Tabajara, Cariacica/ES");

    //$controleCliente->atualizar($cliente);

    //=== FUNÇÕES CHAMADAS - 1 POR VEZ ===
    $cliente = $controleCliente->buscarId(2);
    //echo "<pre>";
    //print_r($retorno);
    //print_r($cliente);
    //echo "</pre>";
    $clientes = $controleCliente->buscar("");
    $clientes_json = json_encode( $clientes);

    echo $clientes_json;

    //$controleCliente->inserir($cliente);
    //$controleCliente->atualizar($cliente);
    //$controleCliente->deletar($cliente);

?>