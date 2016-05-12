<?php

class ControladoresController extends ControladorBase{

	public function __construct() {
		parent::__construct();
	}



	public function index(){
	
		//Creamos el objeto usuario
     	$controladores = new ControladoresModel(); 
		
	   //Conseguimos todos los usuarios
		$resultSet=$controladores->getAll("id_controladores");
				
		$resultEdit = "";

		
		session_start();

	
		if (isset(  $_SESSION['usuario_usuarios']) )
		{

			$nombre_controladores = "Controladores";
			$id_rol= $_SESSION['id_rol'];
			$resultPer = $controladores->getPermisosVer("   controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
			
			if (!empty($resultPer))
			{
				if (isset ($_GET["id_controladores"])   )
				{

					$nombre_controladores = "Controladores";
					$id_rol= $_SESSION['id_rol'];
					$resultPer = $controladores->getPermisosEditar("   controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
						
					if (!empty($resultPer))
					{
					
						$_id_controladores = $_GET["id_controladores"];
						$columnas = " id_controladores, nombre_controladores";
						$tablas   = "controladores";
						$where    = "id_controladores = '$_id_controladores' "; 
						$id       = "nombre_controladores";
							
						$resultEdit = $controladores->getCondiciones($columnas ,$tablas ,$where, $id);

					}
					else
					{
						$this->view("Error",array(
								"resultado"=>"No tiene Permisos de Editar Controladores"
					
						));
					
					
					}
					
				}
		
				
				$this->view("Controladores",array(
						"resultSet"=>$resultSet, "resultEdit" =>$resultEdit
			
				));
		
				
				
			}
			else
			{
				$this->view("Error",array(
						"resultado"=>"No tiene Permisos de Acceso a Controladores"
				
				));
				
				exit();	
			}
				
		}
		else 
		{
				$this->view("ErrorSesion",array(
						"resultSet"=>""
			
				));
		
		}
	
	}
	
	public function InsertaControladores(){
			
		session_start();
		

		$nombre_controladores = "Controladores";
		$id_rol= $_SESSION['id_rol'];
		$resultPer = $permisos_rol->getPermisosEditar("   controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
		
		
		if (!empty($resultPer))
		{
		
		
		
			$resultado = null;
			$controladores=new ControladoresModel();
		
			//_nombre_controladores
			
			if (isset ($_POST["nombre_controladores"]) )
				
			{
				
				
				
				$_nombre_controladores = $_POST["nombre_controladores"];
				
				if(isset($_POST["id_controladores"])) 
				{
					
					$_id_controladores = $_POST["id_controladores"];
					$colval = " nombre_controladores = '$_nombre_controladores'   ";
					$tabla = "controladores";
					$where = "id_controladores = '$_id_controladores'    ";
					
					$resultado=$controladores->UpdateBy($colval, $tabla, $where);
					
				}else {
					
			
				
				$funcion = "ins_controladores";
				
				$parametros = " '$_nombre_controladores'  ";
					
				$controladores->setFuncion($funcion);
		
				$controladores->setParametros($parametros);
		
		
				$resultado=$controladores->Insert();
			 }
		
			}
			$this->redirect("Controladores", "index");

		}
		else
		{
			$this->view("Error",array(
					
					"resultado"=>"No tiene Permisos de Insertar Controladores"
		
			));
		
		
		}
		
	}
	
	public function borrarId()
	{

		session_start();
		
		$permisos_rol=new PermisosRolesModel();
		$nombre_controladores = "Roles";
		$id_rol= $_SESSION['id_rol'];
		$resultPer = $permisos_rol->getPermisosEditar("   controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
			
		if (!empty($resultPer))
		{
			if(isset($_GET["id_controladores"]))
			{
				$id_controladores=(int)$_GET["id_controladores"];
				
				$controladores=new ControladoresModel();
				
				$controladores->deleteBy(" id_controladores",$id_controladores);
				
				
			}
			
			$this->redirect("Controladores", "index");
			
			
		}
		else
		{
			$this->view("Error",array(
				"resultado"=>"No tiene Permisos de Borrar Controladores"
			
			));
		}
				
	}
	
	
	public function Reporte(){
	
		//Creamos el objeto usuario
		$roles=new RolesModel();
		//Conseguimos todos los usuarios
		
	
	
		session_start();
	
	
		if (isset(  $_SESSION['usuario']) )
		{
			$resultRep = $roles->getByPDF("id_rol, nombre_rol", " nombre_rol != '' ");
			$this->report("Roles",array(	"resultRep"=>$resultRep));
	
		}
					
	
	}
	
	
	
}
?>