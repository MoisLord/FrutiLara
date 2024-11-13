
<?php

require_once('modelo/datos.php');



class salida extends datos{
    
	function registrar($id_cliente,$id_producto,$cantidad,$resta){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try{
		   $fecha = date('Y-m-d');
		   $guarda = $co->query("insert into salida(cedula_cliente,
		   fecha) 
		   values ('$id_cliente','$fecha')");
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
			   $gd = $co->query("insert into `detalle_salida`
			   (id_salida,codigo_producto,Cantidad_producto,cantidad_restada)
			   values(
			   '$lid',
		       '$id_producto[$i]',
			   '$cantidad[$i]',
			   '$resta[$i]'
			   )");
		   }
		   $sql=$co->query("UPDATE detalle_entrada JOIN detalle_salida ON detalle_entrada.codigo_producto=detalle_salida.codigo_producto SET detalle_entrada.Cantidad_producto=detalle_salida.cantidad_restada WHERE detalle_salida.id_salida= '$lid' ");
		   //" UPDATE detalle_entrada JOIN detalle_salida ON detalle_entrada.id_producto = detalle_salida.codigo_producto 
		   //SET detalle_entrada.cantidad_total = detalle_entrada.cantidad_total - detalle_salida.cantidad_restada 
		   //WHERE detalle_salida.id_salida = '$lid'
		   $r['resultado'] = 'registrar';
		   $r['mensaje'] =  "Salida de Inventario procesada, numero de salida: $lid";
		   
		   
		}	
		catch(Exception $e){
			$r['resultado'] = 'error';
			$r['mensaje'] =  $e->getMessage();
		}
		return $r;
	}
	
	
	function listadocliente(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array(); // en este arreglo
			// se enviara la respuesta a la solicitud y el
			// contenido de la respuesta
		try{
			$resultado = $co->query("Select * from cliente");
			$respuesta = '';
			if($resultado){
				foreach($resultado as $r){
					$respuesta = $respuesta."<tr style='cursor:pointer' onclick='colocaclientes(this);'>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['cedula'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['nombre_apellido'];
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
				$r['resultado'] = 'listadoclientes';
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
			
			$resultado = $co->query("SELECT producto.codigo,producto.nombre,producto.minimo,producto.maximo,detalle_entrada.Cantidad_producto from producto JOIN detalle_entrada ON
			producto.codigo = detalle_entrada.codigo_producto");
			//SELECT p.codigo, p.nombre, p.minimo, p.maximo, d.cantidad, d.fecha_entrada FROM producto p JOIN detalle_entrada d ON p.id_producto = d.id_producto
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