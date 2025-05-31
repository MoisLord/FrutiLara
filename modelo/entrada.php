<?php

require_once('modelo/datos.php');



class entrada extends datos{
    
	function registrar($id_proveedor,$id_producto,$cantidad){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try{
		   $fecha = date('Y-m-d');
		   $guarda = $co->query("insert into entrada(rif_proveedores,
		   fecha) 
		   values ('$id_proveedor','$fecha')");
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
			   $resultado = $co->query("SELECT COUNT(*) AS count FROM detalle_entrada WHERE codigo_producto = '$id_producto[$i]'"); 
			   $row = $resultado->fetch(PDO::FETCH_ASSOC); 
			   $exists = $row['count'];
			   if ($exists > 0) { 
				$co->query("UPDATE detalle_entrada SET Cantidad_producto = Cantidad_producto + '$cantidad[$i]' WHERE codigo_producto = '$id_producto[$i]'");
			 } else { 
				$co->query("INSERT INTO detalle_entrada (id_entrada, codigo_producto, Cantidad_producto) VALUES ('$lid', '$id_producto[$i]', '$cantidad[$i]')");
			 }
		   }
		   $r['resultado'] = 'registrar';
		   $r['mensaje'] =  "Entrada de Inventario procesada, numero de entrada: $lid";
		   
		   
		}	
		catch(Exception $e){
			$r['resultado'] = 'error';
			$r['mensaje'] =  $e->getMessage();
		}
		return $r;
	}
	
	
	function listadoproveedor(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array(); // en este arreglo
			// se enviara la respuesta a la solicitud y el
			// contenido de la respuesta
		try{
			$resultado = $co->query("SELECT * from proveedores WHERE proveedores.estado_registro = 1");
			$respuesta = '';
			if($resultado){
				foreach($resultado as $r){
					$respuesta = $respuesta."<tr style='cursor:pointer' onclick='colocaproveedor(this);'>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['rif'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['documento'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['nombre'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['telefono'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['direccion'];
						$respuesta = $respuesta."</td>";
					$respuesta = $respuesta."</tr>";
				}
			}
				$r['resultado'] = 'listadoproveedor';
			    $r['mensaje'] =  $respuesta;
			    
			
			
		}catch(Exception $e){
			$r['resultado'] = 'error';
			$r['mensaje'] =  $e->getMessage();
		}
			return $r;
	}
	
	function listadoproductos(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try{
			
			$resultado = $co->query("SELECT * from producto WHERE producto.estado_registro = 1");
			
			if($resultado){
				
				$respuesta = '';
				foreach($resultado as $r){
					$respuesta = $respuesta."<tr style='cursor:pointer' onclick='colocaproducto(this);'>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['codigo'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['nombre'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['minimo'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
						    $respuesta = $respuesta.$r['maximo'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['Cantidad_producto'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['precio_producto'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['tasa_precio'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['metodo_pago'];
						$respuesta = $respuesta."</td>";
					
					
					
					$respuesta = $respuesta."</tr>";
				}
				
			    
			}
			$r['resultado'] = 'listadoproductos';
			$r['mensaje'] =  $respuesta;
			
		}catch(Exception $e){
			$r['resultado'] = 'error';
		    $r['mensaje'] =  $e->getMessage();
		}
		
		return $r;
		
	}
	
	


	
	
	
}
?>