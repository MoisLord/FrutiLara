<?php
require_once('dompdf/vendor/autoload.php'); //archivo para cargar las funciones de la 
		//libreria DOMPDF
		// lo siguiente es hacer rerencia al espacio de trabajo
use Dompdf\Dompdf; //Declaracion del espacio de trabajo

//llamda al archivo que contiene la clase
//datos, en ella posteriormente se colcora el codigo
//para enlazar a su base de datos
require_once('modelo/datos.php');

//declaracion de la clase usuarios que hereda de la clase datos
//la herencia se declara con la palabra extends y no es mas 
//que decirle a esta clase que puede usar los mismos metodos
//que estan en la clase de dodne hereda (La padre) como sir fueran de el

class reportentrada extends datos{
	//el primer paso dentro de la clase
	//sera declarar los atributos (variables) que describen la clase
	//para nostros no es mas que colcoar los inputs (controles) de
	//la vista como variables aca
	//cada atributo debe ser privado, es decir, ser visible solo dentro de la
	//misma clase, la forma de colcoarlo privado es usando la palabra private
	
	private $codigo; //recuerden que en php, las variables no tienen tipo predefinido
	private $nombre;
	private $categoria;
	private $cantidad;
	private $modelo;
	private $proveedor;
	
	//Ok ya tenemos los atributos, pero como son privados no podemos acceder a ellos desde fueran
	//por lo que debemos colcoar metodos (funciones) que me permitan leer (get) y colocar (set)
	//valores en ello, esto es  muy mal llamado geters y seters por si alguien se los pregunta
	
	function set_codigo($valor){
		$this->codigo = $valor; //fijencen como se accede a los elementos dentro de una clase
		//this que singnifica esto es decir esta clase luego -> simbolo que indica que apunte
		//a un elemento de this, es decir esta clase
		//luego el nombre del elemento sin el $
	}
	//lo mismo que se hizo para cedula se hace para usuario y clave
	
	function set_nombre($valor){
		$this->nombre = $valor;
	}
	function set_categoria($valor){
		$this->categoria = $valor;
	}
	function set_cantidad($valor){
		$this->cantidad = $valor;
	}
	function set_modelo($valor){
		$this->modelo = $valor;
	}
	function set_proveedor($valor){
		$this->$proveedor =$valor;
	}
	//el siguiente metodo enlza con la la base de datos
	//crea el html a partir de la consulta y envia los datos a la
	//libreria DOMPDF
	function generarPDF(){
		
		//El primer paso es generar una consulta SQl tal cual como lo hemos hecho en las 
		//clases anteriores, en este caso la consulta sera sobre la tabla usuarios
		//y tendra como parametros para filtro la cedula y el usuario
		
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			
			
			$resultado = $co->prepare("SELECT detalle_entrada.codigo_producto, detalle_entrada.Cantidad_producto, producto.nombre, categoria.descripcion_categoria, modelo.descripcion_modelo, entrada.rif_proveedores from detalle_entrada INNER JOIN producto ON detalle_entrada.codigo_producto=producto.codigo INNER JOIN categoria ON producto.id_categoria=categoria.id_categoria 
										INNER JOIN modelo ON producto.id_modelo=modelo.id_modelo INNER JOIN entrada ON entrada.id_entrada = detalle_entrada.id_entrada  where codigo_producto like :codigo_producto and 
										Cantidad_producto like :Cantidad_producto and nombre like :nombre and descripcion_categoria like :descripcion_categoria and descripcion_modelo like :descripcion_modelo and rif_proveedores LIKE :rif_proveedores");
			$resultado->bindValue(':codigo_producto','%'.$this->codigo.'%');
			$resultado->bindValue(':Cantidad_producto','%'.$this->cantidad.'%');
			$resultado->bindValue(':nombre','%'.$this->nombre.'%');
			$resultado->bindValue(':descripcion_categoria','%'.$this->categoria.'%');
			$resultado->bindValue(':descripcion_modelo','%'.$this->modelo.'%');
			$resultado->bindValue(':rif_proveedores','%'.$this->proveedor.'%');
			$resultado->execute();
			
			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
			
			//aqui es donde comienza el cambio, debido a que se va a armar una variable en memoria
			//con el contenido html que se enviara a la libreria dompdf
			$html = "<html><head>
			<link rel='stylesheet' type='text/css' href='datatables/datatables.css'/> 
			<link rel='stylesheet' href='css/bootstrap.min.css'>
			<script type='text/javascript' src='datatables/datatables.min.js'></script></head><body>
			";
			$html = $html."<div class='container-fluid'>";
			$html = $html."<h1 class='modal-title text-center text-success'>DETALLE DE ENTRADAS REGISTRADOS</h1>";
			$html = $html."<hr class='border border-success border-3 opacity-65'>";
			$html = $html."<div class='table-responsive'>";
			$html = $html."<table class='table table-striped table-bordered border-success table-hover'>";
			$html = $html."<thead>";
			$html = $html."<tr>";
			$html = $html."<th  class='text-bg-success p-3'style='text-align:center'>Codigo del producto</th>";
			$html = $html."<th class='text-bg-success p-3'style='text-align:center'>nombre del producto</th>";
			$html = $html."<th class='text-bg-success p-3'style='text-align:center'>Rif del proveedor</th>";
			$html = $html."<th  class='text-bg-success p-3'style='text-align:center'>Categoria del producto</th>";
			$html = $html."<th class='text-bg-success p-3'style='text-align:center'>modelo del producto</th>";
			$html = $html."<th  class='text-bg-success p-3'style='text-align:center'>Cantidad del producto</th>";
			$html = $html."</tr>";
			$html = $html."</thead>";
			$html = $html."<tbody>";
			if($fila){
				
				foreach($fila as $f){
					$html = $html."<tr>";
					$html = $html."<td style='text-align:center'>".$f['codigo_producto']."</td>";
					$html = $html."<td style='text-align:center'>".$f['nombre']."</td>";
					$html = $html."<td style='text-align:center'>".$f['rif_proveedores']."</td>";
					$html = $html."<td style='text-align:center'>".$f['descripcion_categoria']."</td>";
					$html = $html."<td style='text-align:center'>".$f['descripcion_modelo']."</td>";
					$html = $html."<td style='text-align:center'>".$f['Cantidad_producto']."</td>";
					$html = $html."</tr>";
				}

				//return json_encode($fila);
				
			}
			else{
				
				//return '';
			}
			$html = $html."</tbody>";
			$html = $html."</table>";
		    $html = $html."</div></div></div>";
			$html = $html."</body></html>";
			
			
		}catch(Exception $e){
			//return $e->getMessage();
		}
		
		
		

        
		echo"$html";
		
		exit;
 
		// Instanciamos un objeto de la clase DOMPDF.
		$pdf = new DOMPDF();
		 
		// Definimos el tamaño y orientación del papel que queremos.
		$pdf->set_paper("A4", "portrait");
		 
		// Cargamos el contenido HTML.
		$pdf->load_html(utf8_decode($html));
		 
		// Renderizamos el documento PDF.
		$pdf->render();
		 
		// Enviamos el fichero PDF al navegador.
		$pdf->stream('ReporteUsuarios.pdf', array("Attachment" => false));
		
		
	}
	
	
	
	
	
	
	
	
}
?>