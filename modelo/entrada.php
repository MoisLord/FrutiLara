<?php

require_once('modelo/datos.php');



class entrada extends datos{
    
	function registrar($id_proveedor,$id_producto,$cantidad,$umatoria){
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
			   $gd = $co->query("insert into `detalle_entrada`
			   (id_entrada,codigo_producto,Cantidad_producto,cantidad_sumatoria)
			   values(
			   '$lid',
		       '$id_producto[$i]',
			   '$cantidad[$i]',
			   '$umatoria[$i]'
			   )");
		   }
		  $sql = $co->query("UPDATE producto JOIN detalle_entrada ON producto.codigo = detalle_entrada.codigo_producto SET producto.cantidad_total = detalle_entrada.cantidad_sumatoria WHERE detalle_entrada.id_entrada = '$lid'");
		   $r['resultado'] = 'registrar';
		   $r['mensaje'] =  "Inventario procesada, numero de inventario: $lid";
		   
		   
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
			$resultado = $co->query("Select * from proveedores");
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
			
			$resultado = $co->query("Select * from producto");
			
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
							$respuesta = $respuesta.$r['cantidad_total'];
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