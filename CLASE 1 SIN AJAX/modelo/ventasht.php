<?php

require_once('modelo/datos.php');



class ventasht extends datos{
    
	function facturar($id_cliente,$id_producto,$cantidad,$precio){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
		   $fecha = date('Y-m-d');
		   $guarda = $co->query("insert into factura(fecha_factura,
		   id_cliente) 
		   values ('$fecha','$id_cliente')");
		   $lid = $co->lastInsertId(); //retorna el valor del campo
		   //autoincremental
		   
		   //una vez que se tiene lleno el maestro de factura, se pasa a 
		   //llenar el detalle de la venta
		   
		   //como los datos id_producto, cantidad y precio son 
		   //arreglos, los recorreresmo utilizando un for
		   //para ello primero buscamos el tamaño del arreglos
		   //y luego ubicamos cada posicion
		   
		   $tamano = count($id_producto);
		   
		   for($i=0;$i<$tamano;$i++){
			   $gd = $co->query("insert into `detalle factura`
			   (id_factura,id_producto,cantidad,precio)
			   values(
			   '$lid',
		       '$id_producto[$i]',
			   '$cantidad[$i]',
			   '$precio[$i]'
			   )");
		   }
		   
		   
		   return "Venta procesada, numero de factura: $lid";
		}	
		catch(Exception $e){
			return $e->getMessage();
		}
		
	}
	
	
	function listadodeclientes(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			
			$resultado = $co->query("Select * from cliente");
			
			if($resultado){
				
				$respuesta = '';
				foreach($resultado as $r){
					$respuesta = $respuesta."<tr style='cursor:pointer' onclick='colocacliente(this);'>";
						$respuesta = $respuesta."<td style='display:none'>";
							$respuesta = $respuesta.$r['id_cliente'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['cedula_cliente'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['nombre_cliente'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['telefono_cliente'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['direccion'];
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
	
	function listadodeproductos(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			
			$resultado = $co->query("Select * from producto");
			
			if($resultado){
				
				$respuesta = '';
				foreach($resultado as $r){
					$respuesta = $respuesta."<tr style='cursor:pointer' onclick='colocaproducto(this);'>";
						$respuesta = $respuesta."<td style='display:none'>";
							$respuesta = $respuesta.$r['id_producto'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['codigo'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['nombre_producto'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['stock_producto'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['precio_venta'];
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