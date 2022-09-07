<?php

    require_once ("model/dao/dao_cliente.php");

    class ControlerClientes{
        public $daoCliente;

        function __construct(){
            $this->daoCliente = new DaoClientes();
            
        }

        function buscar(){

        }
        function inserir(Cliente $c){
            if (empty($c->getNome()))
                die("Informe o Nome para salvar.");
            if (!$this->validaCPF($c->getCpf()))
                die("CPF Inválido.");
            if (empty($c->getTelefone()))
                die("Informe o Nome para salvar.");
            
            $this->daoCliente->inserir($c);
        }
        function atualizar(Cliente $c){
            if (empty($c->getId()))
            die("Informe o ID.");

            $this->daoCliente->atualizar($c);
        }
        function deletar(){
            $this->daoCliente->deletar($c);
        }
        function validaCPF($cpf) {
 
            // Extrai somente os números
            $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
             
            // Verifica se foi informado todos os digitos corretamente
            if (strlen($cpf) != 11) {
                return false;
            }
            // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
            if (preg_match('/(\d)\1{10}/', $cpf)) {
                return false;
            }
            // Faz o calculo para validar o CPF
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf[$c] * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf[$c] != $d) {
                    return false;
                }
            }
            return true;
        }

    }



?>