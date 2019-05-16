<?php

class TimeController{
	private $time;
	const DIR_VIEW = 'view/time';
	
	public function __construct($db){
		$this->time = new Time($db);
	}
	
	
	public function listar(){
		$times = $this->time->listar();
		require_once self::DIR_VIEW .'/list.php';
	}
	
	public function novo(){
		$time = array_combine(['id', 'nome', 'endereco'], array_fill(0, 3, ''));
		require_once self::DIR_VIEW .'/form.php';
	}
	
	public function salvar($time){
		echo json_encode($this->time->salvar($time));
	}
	
	public function remover($id){
		return $this->time->delete($id);
	}
	
	public function editar($id){
		$time = $this->time->buscar($id);
		require_once self::DIR_VIEW .'/form.php';
	}
	
	public function pesquisar($termo){
		$times = $this->time->pesquisar($termo);
		require_once self::DIR_VIEW .'/list.php';
	}
	
}