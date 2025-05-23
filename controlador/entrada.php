<?php
 
  // Solo iniciar sesión si no está activa
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
//REGISTRO EN BITÁCORA: solo si la sesión está activa y hay un usuario definido
if (isset($_SESSION['usuario'])) {
    require_once("app/controllers/ControlBitacora.php");
    $bitacora = new ContBitacora();
    $bitacora->registrarAccion($_SESSION['usuario'], 'Notas de Entrada', 'Ingresó al módulo de Notas de Entrada');
}

class entrada {

    public function registrar($idproveedor, $idp, $cant) {
        // Aquí va la lógica para registrar la entrada en la base de datos
        try {
            $pdo = $this->conecta(); // Usa método de conexión
            $sql = "INSERT INTO nota_entrada (idproveedor, idp, cantidad) VALUES (?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$idproveedor, $idp, $cant]);
            return ['success' => true, 'mensaje' => 'Registro exitoso'];
        } catch (PDOException $e) {
            return ['success' => false, 'mensaje' => 'Error: ' . $e->getMessage()];
        }
    }
}
//llamada al archivo que contiene la clase
//usuarios, en ella estara el codigo que me //permitirá
//guardar, consultar y modificar dentro de mi base //de datos


//lo primero que se debe hacer es verificar al //igual que en la vista que exista el archivo
if (!is_file("modelo/".$pagina.".php")){
	//alli pregunte que si no es archivo se niega //con !
	//si no existe envio mensaje y me salgo
	echo "Falta definir la clase ".$pagina;
	exit;
}  
require_once("modelo/".$pagina.".php");  
  if(is_file("vista/".$pagina.".php")){
	  
	  if(!empty($_POST)){
		  
		$o = new entrada(); 	
		$accion = $_POST['accion'];
		if($accion=='listadoproveedor'){
			$respuesta = $o->listadoproveedor();
			echo json_encode($respuesta);
		}
		elseif($accion=='listadoproductos'){
			$respuesta = $o->listadoproductos();
			echo json_encode($respuesta);
		}
		elseif($accion=='registrar'){
		    $respuesta = $o->registrar($_POST['idproveedor'],$_POST['idp'],$_POST['cant']);
			echo json_encode($respuesta);
	    }
		exit; 
	  }
	 
	  require_once("vista/".$pagina.".php"); 
  }
  else{
	  echo "pagina en construccion";
  }
?>
