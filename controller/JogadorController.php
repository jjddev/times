<?php

class jogadorController{
	private $jogador;
	const DIR_VIEW = 'view/jogador';
	
	public function __construct($db){
		$this->jogador = new jogador($db);
		$this->time = new time($db);
	}
	
	
	public function listar(){
		$jogadores = $this->jogador->listar();
		require_once self::DIR_VIEW .'/list.php';
	}
	
	public function novo(){
		$jogador = array_combine(['id', 'nome', 'datanascimento', 'altura', 'endereco'], array_fill(0, 5, ''));
		$times = $this->time->listar();
		require_once self::DIR_VIEW .'/form.php';
	}
	
	public function salvar($jogador){
		echo json_encode($this->jogador->salvar($jogador));
	}
	
	public function remover($id){
		return $this->jogador->delete($id);
	}
	
	public function editar($id){
		$times = $this->time->listar();
		$jogador = $this->jogador->buscar($id);
		require_once self::DIR_VIEW .'/form.php';
	}
	
	public function pesquisar($termo){
		$jogadores = $this->jogador->pesquisar($termo);
		require_once self::DIR_VIEW .'/list.php';
	}
}