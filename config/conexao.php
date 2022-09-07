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
		
		public function selecionar($sql){
			
			$result = mysqli_query($sql);
			$lista=array();

			while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				$lista[$row]=$row;
			}
			return $lista;


		}

		
		
	}
?>
