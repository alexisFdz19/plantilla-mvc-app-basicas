<?php

class tareasController extends AppController
{
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$tareas = $this->loadmodel("tarea");
		$this->_view->tareas = $tareas->getTareas();
		
		$this->_view->titulo = "Listado de tareas";
		$this->_view->renderizar("index");
	}

	public function Agregar(){

		if($_POST){
			$tareas = $this->loadModel("tarea");
			$this->_view->tareas = $tareas->guardar($_POST);
		}

		$categorias = $this->loadModel("categoria");
		$this->_view->categorias = $categorias->listarTodo();

		$this->_view->titulo = "Agregar tarea";
		$this->_view->renderizar("agregar");


	}
}
