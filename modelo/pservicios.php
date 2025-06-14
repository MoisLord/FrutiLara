<?php

require_once('modelo/datos.php');


class pservicios extends datos{
	//declaré los atributos (variables) que describen la clase
	//para colocar los inputs del archivo (controles) de
	//la vista como variables
	//cada atributo debe ser privado, es decir, ser visible solo dentro de la
	//misma clase, la forma de colcocarlo en privado es usando la palabra private

	//Aqui coloque los inputs de la vista en private
	private $id_servicios; //recordatorio que en php, las variables no tienen tipo predefinido
	private $servicios_codigo_servicio;
	private $costo;
	private $pago;
	private $fecha_pago_servicio;
	private $estado_registro;

	//Ok ya puesto los atributos, pero ahora como son privados no podemos acceder a ellos
	//desde afuera por lo que debemos colocar metodos (funciones)
	//que me permitan leer (get) y colocar (set) valores en ello

	function set_id_servicios($valor)
	{
		$this->id_servicios = $valor; //este es como se accede a los elementos dentro de una clase
		//this singnifica (esto), es decir, esta clase luego se usa el simbolo ( -> )
		// que indica que apunte a un elemento de this, osea esta clase
		//luego el marca el elemento sin el simbolo ($)
	}
	//lo mismo que se hizo para id_marca se hace para marca

	function set_servicios_codigo_servicio($valor)
	{
		$this->servicios_codigo_servicio = $valor;
	}

	function set_costo($valor)
	{
		$this->costo = $valor;
	}

	function set_pago($valor)
	{
		$this->pago = $valor;
	}

	function set_fecha_pago_servicio($valor)
	{
		$this->fecha_pago_servicio = $valor;
	}

	function set_estado_registro($valor)
	{
		$this->estado_registro = $valor;
	}

	//ahora el mismo procedimiento pero para leer, es decir (get)

	function get_id_servicios()
	{
		return $this->id_servicios;
	}

	function get_servicios_codigo_servicio()
	{
		return $this->servicios_codigo_servicio;
	}

	function get_costo()
	{
		return $this->costo;
	}

	function get_pago()
	{
		return $this->pago;
	}

	function get_fecha_pago_servicio()
	{
		return $this->fecha_pago_servicio;
	}

	function get_estado_registro()
	{
		return $this->estado_registro;
	}

	//Lo siguiente que demos hacer es crear los metodos para incluir, consultar, modificar y eliminar


	function registrar($servicios_codigo_servicio, $descripcion_servicio, $estado_registro, $costo, $pago, $fecha_pago_servicio)
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try {
			// Registrar en la tabla servicios
			$p = $co->prepare("INSERT INTO servicios (codigo_servicio, descripcion_servicio, estado_registro)
							   VALUES (:codigo_servicio, :descripcion_servicio, :estado_registro)");
			$p->bindParam(':codigo_servicio', $servicios_codigo_servicio);
			$p->bindParam(':descripcion_servicio', $descripcion_servicio);
			$p->bindParam(':estado_registro', $estado_registro);
			$p->execute();
			$lid = $co->lastInsertId();
	
			// Registrar en la tabla pago_servicios
			$tamano = count($costo); // Asume que $costo, $pago y $fecha_pago_servicio son arrays
	
			for ($i = 0; $i < $tamano; $i++) {
				$p2 = $co->prepare("INSERT INTO pago_servicios (id_servicios, costo, pago, fecha_pago_servicio, estado_registro)
									VALUES (:id_servicios, :costo, :pago, :fecha_pago_servicio, :estado_registro)");
				$p2->bindParam(':id_servicios', $lid);
				$p2->bindParam(':costo', $costo[$i]);
				$p2->bindParam(':pago', $pago[$i]);
				$p2->bindParam(':fecha_pago_servicio', $fecha_pago_servicio[$i]);
				$p2->bindParam(':estado_registro', $estado_registro);
				$p2->execute();
			}
	
			$r['resultado'] = 'registrar';
			$r['mensaje'] = "Entrada de servicios procesada, número de entrada: $lid";
		} catch (Exception $e) {
			$r['resultado'] = 'error';
			$r['mensaje'] = $e->getMessage();
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