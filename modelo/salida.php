
<?php

require_once('modelo/datos.php');



class salida_producto extends datos{

	function incluir($cedula_cliente,$codigo_producto,$cifra,$fecha){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
		   $fecha = date('Y-m-d');
		   $guarda = $co->query("insert into salida_producto(cedula_cliente,codigo_producto,estado,cifra,fecha) 
		   values ('$cedula_cliente','$codigo_producto','$cifra','$fecha')");
		   $lid = $co->lastInsertId(); //retorna el valor del campo
		   //autoincremental
		   
		   //una vez que se tiene lleno el maestro de factura, se pasa a 
		   //llenar el detalle de la venta
		   
		   //como los datos cedula_producto, cantidad y precio son 
		   //arreglos, los recorreresmo utilizando un for
		   //para ello primero buscamos el tamaño del arreglos
		   //y luego ubicamos cada posicion
		   
		   return "Venta procesada, numero de factura: $lid";
		}	
		catch(Exception $e){
			return $e->getMessage();
		}
		
	}
	
	function listadodeproductos(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			
			$resultado = $co->query("Select * from salida_producto");
			
			if($resultado){
				
				$respuesta = '';
				foreach($resultado as $r){
					$respuesta = $respuesta."<tr style='cursor:pointer' onclick='colocaarea(this);'>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['cedula_cliente'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['codigo_producto'];
						$respuesta = $respuesta."</td>";
					$respuesta = $respuesta."</tr>";
				}
				return $respuesta;
			    
			}
			else{
				return '';
			}
			
		}catch(Exception $e){
			return $e->getMessage();
		}
		
	}
	
	function listadodeprecios(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			
			$resultado = $co->query("Select * from salida_producto");
			
			if($resultado){
				
				$respuesta = '';
				foreach($resultado as $r){
					$respuesta = $respuesta."<tr style='cursor:pointer' onclick='colocaequipo(this);'>";
						$respuesta = $respuesta."<td style='display:none'>";
							$respuesta = $respuesta.$r['cedula_cliente'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['codigo_producto'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['cifra'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['fecha'];
						$respuesta = $respuesta."</td>";
					$respuesta = $respuesta."</tr>";
				}
				return $respuesta;
			    
			}
			else{
				return '';
			}
			
		}catch(Exception $e){
			return $e->getMessage();
		}
		
	}
	
	


	
	
	
}
?>