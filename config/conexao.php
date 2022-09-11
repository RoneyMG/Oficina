<?php
	class Conexao{

		public $con;
		
		public function conectar(){

			$this->con=mysqli_connect ("127.0.0.1","root","") or
			die("Não foi possível conectar: " . mysql_error());
			mysqli_select_db ($this->con,"minas_retifica");
			
		}
		
		public function desconectar(){

			mysqli_close($this->con);
		}
		
		public function executar($sql){
			mysqli_query($this->con,$sql); /*cadastro será a tabela da pagina cadastro*/
			return mysqli_affected_rows($this->con);
		}
		
		public function buscar($sql){
			
			$result = mysqli_query($this->con, $sql);
			$lista=array();

			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				array_push($lista, $row);
			}
			return $lista;


		}
		
	}
?>
