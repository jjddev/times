<?php
	require_once 'database/connection.php';
	require_once 'controller/JogadorController.php';
	require_once 'model/jogador.php';
	require_once 'model/time.php';

	$db = Connection::getConnection();
	$controller = new JogadorController($db);
	
	$action = isset($_GET['action']) ? $_GET['action'] : 'listar';
	
	$id = isset($_POST['id']) ? json_decode($_POST['id'], true) : 0;
	
	if($action == 'salvar') {	
		$jogador = json_decode($_POST['jogador'], true);
		$data = DateTime::createFromFormat('d/m/Y', $jogador['datanascimento']);
		$jogador['datanascimento'] = $data->format('Y-m-d');
		call_user_func_array([$controller, $action], [$jogador]);
	} else if ($action == 'remover') {
		call_user_func_array([$controller, $action], [$id]);
		$controller->listar();
	} else {
		call_user_func_array([$controller, $action], [$id]);
	}	