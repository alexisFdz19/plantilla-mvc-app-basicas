<?php

class TareaModel extends AppModel
{
	public function __construct(){
		parent::__construct();
	}

	public function getTareas(){
		$tareas = $this->_db->query("SELECT * FROM tareas");
		
		return $tareas->fetchall();
	}

	public function guardar($datos = array()){

		$consulta = $this->_db->prepare(

			"INSERT INTO tareas

				(nombre, descripcion, fecha, prioridad, categoria_id)
				VALUES
				(:nombre, :descripcion, :fecha, :prioridad, :categoria_id)

			"

		);

		$consulta->bindParam(":nombre", $datos["nombre"]);
		$consulta->bindParam(":descripcion", $datos["descripcion"]);
		$consulta->bindParam(":fecha", $datos["fecha"]);		
		$consulta->bindParam(":prioridad", $datos["prioridad"]);
		$consulta->bindParam(":categoria_id", $datos["categoria_id"]);

		if ($consulta->execute()){

			return true;

		}else{

			return false;

		}

	}
}
