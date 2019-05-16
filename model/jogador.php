<?php
class jogador{
	private $db;
	public function __construct($db){
		$this->db = $db;
	}
	
	public function listar(){
		$sql = 'SELECT j.*, t.nome as time FROM jogadores as j INNER JOIN times as t ON j.time_id = t.id';
		$stmt = $this->db->prepare($sql);
		if(!$stmt->execute()){
			echo '<pre>';
			print_r($stmt->errorInfo());
		}
		return $stmt->fetchAll();
	}
	
	public function salvar($jogador){
		$retorno = !empty($jogador['id']) ? $this->update($jogador) : $this->insert($jogador);
		return $retorno['erro'] ? ['erro' => 'true', 'msg' => 'Falha na operação'] : ['erro' => 'false', 'msg' => 'Operação realizada com sucesso'];
	}
	
	private function insert($jogador){
		$sql = 'INSERT INTO jogadores (nome, datanascimento, altura, endereco, time_id) VALUES(:nome, :datanascimento, :altura, :endereco, :time_id);';
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(':nome', $jogador['nome']);
		$stmt->bindValue(':datanascimento', $jogador['datanascimento']);
		$stmt->bindValue(':altura', $jogador['altura']);
		$stmt->bindValue(':endereco', $jogador['endereco']);
		$stmt->bindValue(':time_id', $jogador['time']);
		
		if(!$stmt->execute()){
			return ['erro' => true, $stmt->errorInfo()];
		}
		
		return ['erro' => false];
		
	}
	
	private function update($jogador){
		$sql = 'UPDATE jogadores SET
					nome = :nome,
					datanascimento = :datanascimento,
					altura = :altura,
					time_id = :time_id,
					endereco = :endereco
				WHERE id = :id';
		
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(':id', $jogador['id']);
		$stmt->bindValue(':nome', $jogador['nome']);
		$stmt->bindValue(':datanascimento', $jogador['datanascimento']);
		$stmt->bindValue(':altura', $jogador['altura']);
		$stmt->bindValue(':endereco', $jogador['endereco']);
		$stmt->bindValue(':time_id', $jogador['time']);

		if(!$stmt->execute()){
			return ['erro' => true, $stmt->errorInfo()];
		}
		
		return ['erro' => false];
	}
	
	public function delete($id){
		$sql = 'DELETE FROM jogadores WHERE id = :id';
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(':id', $id);
		if(!$stmt->execute()){
			return ['erro' => true, $stmt->errorInfo()];
		}
		
		return ['erro' => false, 'msg' => 'Jogador removida com sucesso'];		
	}
	
	public function buscar($id){
		$sql = 'SELECT * FROM jogadores WHERE id = :id';
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(':id', $id);

		if(!$stmt->execute()){
			return ['erro' => true, $stmt->errorInfo()];
		}
		
		return $stmt->fetch();
	}
	
	public function pesquisar($nome){
		$sql = 'SELECT j.*, t.nome as time FROM jogadores as j
				INNER JOIN times as t ON j.time_id = t.id
				WHERE lower(j.nome) like :nome';
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(':nome', '%'. mb_convert_case($nome, MB_CASE_LOWER) .'%');

		if(!$stmt->execute()){
			return ['erro' => true, $stmt->errorInfo()];
		}
		
		return $stmt->fetchAll();
	}	
	
}