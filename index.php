<?php
	require_once 'database/connection.php';
	require_once 'controller/TimeController.php';
	require_once 'model/time.php';

	$db = Connection::getConnection();
	$controller = new TimeController($db);
	
	$action = isset($_GET['action']) ? $_GET['action'] : 'listar';
	
	$id = isset($_POST['id']) ? $_POST['id'] : 0;
	
	$id = json_decode($id, true);
	$time = isset($_POST['time']);
	
	if($action == 'salvar') {	
		call_user_func_array([$controller, $action], [json_decode($_POST['time'], true)]);
	} else if ($action == 'remover') {
		call_user_func_array([$controller, $action], [$id]);
		$controller->listar();
	} else {
		call_user_func_array([$controller, $action], [$id]);
	}	
	
	/*
	if($action == 'novo'){
		$controller->novo();
	}else if($action == 'salvar'){
		$time = json_decode($_POST['time'], true);
		$controller->salvar($time);
	}else if($action == 'editar'){
			$id = json_decode($_POST['id'], true);
			//$controller->editar($id);
			call_user_func_array([$controller, 'editar'], [$id]);
	}else if($action == 'remover'){
		$id = json_decode($_POST['id'], true);
		$controller->remover($id);
		$controller->listar();
	}else{
		$controller->listar();
	}
	*/
	
