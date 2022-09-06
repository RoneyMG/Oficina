<?php
    class DaoClientes{
        function buscar(){

        }
        function inserir(Cliente $c){

            $sql = "INSERT INTO clientes (nome, cpf, telefone) VALUES ('$c->getNome()', '$c->getCpf()', '$c->getTelefone()')";
            $res=mysqli_query($con,$sql);
			$linha=mysqli_affected_rows($con);
        }
        function editar(){

        }
        function deletar(){

        }

    }



?>