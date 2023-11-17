<?php

require_once ("../controler/controle_pecas.php");
require_once ("../model/peca.php");

/*
$peca = new Peca();
$peca->setId(4);
$peca->setNome("Junta de cabeçote");
$peca->setDescricao("Junta de cabeçote do motor do Gol 1.0 2005 8v");
$peca->setValor("195.50");*/

switch($_SERVER['REQUEST_METHOD'])
{
    case 'POST': POST();break;
    case 'PUT': PUT($_PUT);break;
    case 'DELETE': DELETE();break;
    default : GET($_GET);break;
}

function GET($busca){
    $controlePeca = new ControlerPecas();
    $pecas = $controlePeca->buscar("");
    $pecas_json = json_encode($pecas);
    echo $pecas_json;
}

function POST(){
    $peca = file_get_contents('php://input');
    $pc = json_decode($peca);
    $controlePeca = new ControlerPecas();
    $p = new Peca();
    $p->nome = $pc->nome;
    $p->descricao = $pc->descricao;
    $p->valor = $pc->valor;
    $controlePeca->inserir($p);

}

function DELETE(){
    $idPeca = file_get_contents('php://input');
    $controlePeca = new ControlerPecas();
    $controleCliente->deletar($idPeca);
}

/*=== FUNÇÕES CHAMADAS - 1 POR VEZ ===
$controlePeca->inserir($peca);
$peca = $controlePeca->buscarId(5);
$pecas = $controlePeca->buscar("Pistão");
$pecas_json = json_encode( $peca);
echo $pecas_json;
$controlePeca->deletar($peca);
$controlePeca->atualizar($peca);*/
?>