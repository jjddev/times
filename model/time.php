<?php
class Time{
	private $db;
	public function __construct($db){
		$this->db = $db;
	}
	
	public function listar(){
		$sql = 'SELECT * FROM times';
		$stmt = $this->db->prepare($sql);
		if(!$stmt->execute()){
			echo '<pre>';
			print_r($stmt->errorInfo());
		}
		return $stmt->fetchAll();
	}
	
	public function salvar($time){
		$retorno = !empty($time['id']) ? $this->update($time) : $this->insert($time);
		return $retorno['erro'] ? ['erro' => 'true', 'msg' => 'Falha na operação'] : ['erro' => 'false', 'msg' => 'Operação realizada com sucesso'];
	}
	
	private function insert($time){
		$sql = 'INSERT INTO times (nome, endereco) VALUES(:nome, :endereco);';
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(':nome', $time['nome']);
		$stmt->bindValue(':endereco', $time['endereco']);
		
		if(!$stmt->execute()){
			return ['erro' => true, $stmt->errorInfo()];
		}
		
		return ['erro' => false];
		
	}
	
	private function update($time){
		$sql = 'UPDATE times SET
					nome = :nome,
					endereco = :endereco
				WHERE id = :id';
		
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(':id', $time['id']);
		$stmt->bindValue(':nome', $time['nome']);
		$stmt->bindValue(':endereco', $time['endereco']);

		if(!$stmt->execute()){
			return ['erro' => true, $stmt->errorInfo()];
		}
		
		return ['erro' => false];
	}
	
	public function delete($id){
		$sql = 'DELETE FROM times WHERE id = :id';
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(':id', $id);
		if(!$stmt->execute()){
			return ['erro' => true, $stmt->errorInfo()];
		}
		
		return ['erro' => false, 'msg' => 'Pessoa removida com sucesso'];		
	}
	
	public function buscar($id){
		$sql = 'SELECT * FROM times WHERE id = :id';
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(':id', $id);

		if(!$stmt->execute()){
			return ['erro' => true, $stmt->errorInfo()];
		}
		
		return $stmt->fetch();
	}
	
	public function pesquisar($nome){
		$sql = 'SELECT * FROM times WHERE lower(nome) like :nome';
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(':nome', '%'. mb_convert_case($nome, MB_CASE_LOWER) .'%');

		if(!$stmt->execute()){
			return ['erro' => true, $stmt->errorInfo()];
		}
		
		return $stmt->fetchAll();
	}
	
}