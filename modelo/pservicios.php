<?php

require_once('modelo/datos.php');



class pservicios extends datos{
    
	private function registrar($id_servicios,$servicios_codigo_servicio,$costo,$pago,){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try{
		   $fecha = date('Y-m-d');
		   $guarda = $co->query("insert into servicios (codigo_servicio, descripcion_servicio, estado_registro)
		   values ('$servicios_codigo_servicio','$fecha_pago_servicio')");
		   $lid = $co->lastInsertId(); //retorna el valor del campo
		   //autoincremental
		   
		   //una vez que se tiene lleno el maestro de factura, se pasa a 
		   //llenar el detalle de la venta
		   
		   //como los datos codigo_servicio, cantidad y precio son 
		   //arreglos, los recorreresmo utilizando un for
		   //para ello primero buscamos el tamaño del arreglos
		   //y luego ubicamos cada posicion
		   
		   $tamano = count($id_servicios);
		   
		    for($i=0;$i<$tamano;$i++){
			   $gd = $co->query("insert into `pago_servicios`(id_servicios, servicios_codigo_servicio,
			   costo, pago, fecha_pago_servicio, estado_registro)
			   values(
			   '$lid',
		       '$id_servicios[$i]',
			   '$servicios_codigo_servicio[$i]',
			   '$costo[$i]'
			   '$pago[$i]'
			   )");
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
	
	
	function listadoservicios(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array(); // en este arreglo
			// se enviara la respuesta a la solicitud y el
			// contenido de la respuesta
		try{
			$resultado = $co->query("SELECT * from servicios WHERE servicios.estado_registro = 1");
			$respuesta = '';
			if($resultado){
				foreach($resultado as $r){
					$respuesta = $respuesta."<tr style='cursor:pointer' onclick='colocaservicios(this);'>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['codigo_servicio'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['descripcion_servicio'];
						$respuesta = $respuesta."</td>";
					$respuesta = $respuesta."</tr>";
				}
			}
				$r['resultado'] = 'listadoservicios';
			    $r['mensaje'] =  $respuesta;
			    
			
			
		}catch(Exception $e){
			$r['resultado'] = 'error';
			$r['mensaje'] =  $e->getMessage();
		}
			return $r;
	}
	
	
	
	
}
?>