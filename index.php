<?php

    require_once ("controler/controle_servicos.php");
    require_once ("model/servico.php");

    $controleServico = new ControlerServicos();

    $servico = new Servico();
    $servico->setId(2);
    $servico->setNome("Retentor de comando");
    $servico->setDescricao("Retentor do Gol 1.0 2005 8v");
    $servico->setValor("10.20");
    

    //=== FUNÇÕES CHAMADAS - 1 POR VEZ ===
    //$servico = $controleServico->buscarId(2);
    //echo "<pre>";
    //print_r($retorno);
    //print_r($cliente);
    //echo "</pre>";
    //$servicos = $controleServico->buscar("");
    //$servicos_json = json_encode( $servicos);

    //echo $servicos_json;

    $controleServico->inserir($servico);
    //$controleCliente->atualizar($cliente);
    //$controleCliente->deletar($cliente);

?>