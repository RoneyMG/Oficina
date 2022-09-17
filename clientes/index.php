<?php

require_once ("../controler/controle_clientes.php");
require_once ("../model/cliente.php");

$controleCliente = new ControlerClientes();

$clientes = $controleCliente->buscar("");
$clientes_json = json_encode( $clientes);

echo $clientes_json;

?>