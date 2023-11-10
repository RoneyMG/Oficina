<?php

require_once ("../controler/controle_pecas.php");
require_once ("../model/peca.php");

$controlePeca = new ControlerPecas();

$peca = new Peca();
$peca->setId(4);
$peca->setNome("Junta de cabeçote");
$peca->setDescricao("Junta de cabeçote do motor do Gol 1.0 2005 8v");
$peca->setValor("195.50");

//=== FUNÇÕES CHAMADAS - 1 POR VEZ ===

//$controlePeca->inserir($peca);

//$peca = $controlePeca->buscarId(5);

//$pecas = $controlePeca->buscar("Pistão");
//$pecas_json = json_encode( $peca);
//echo $pecas_json;

//$controlePeca->deletar($peca);

$controlePeca->atualizar($peca);

?>