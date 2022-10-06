<?php

    require_once ("../controler/controle_servicos.php");
    require_once ("../model/servico.php");

    $controleServico = new ControlerServicos();

    $servico = new Servico();
    $servico->setId(2);
    $servico->setNome("Retentor de comando");
    $servico->setDescricao("Retentor do Gol 1.0 2005 8v");
    $servico->setValor("10.20");
    

    //=== FUNÇÕES CHAMADAS - 1 POR VEZ ===
    //$controleServico->inserir($servico);
    //$servico = $controleServico->buscarId(2);
    $servicos = $controleServico->buscar("2005");
    $servicos_json = json_encode( $servicos);

    echo $servicos_json;

    


    //$controleCliente->atualizar($cliente);
    //$controleCliente->deletar($cliente);

?>