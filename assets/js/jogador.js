function validarForm(){
	var msg = 'Os seguintes campos são de preenchimento obrigatório:\n';
	var valido = true;
	
	if(!$("#nome").val().trim()){
		msg += '* Nome.\n';
		valido = false;
	}
	
	if(!$("#endereco").val().trim()){
		msg += '* Endereço.\n';
		valido = false;
	}

	if(!$("#datanascimento").val().match(/\d{2}\/\d{2}\/\d{4}/)){
		msg += '* Data inválida.\n';
		valido = false;	
	}	
	
	if(!$("#altura").val().match(/\d\.\d{2}/)){
		msg += '* Altura inválida.\n';
		valido = false;	
	}	
	
	return {'erro': valido, 'msg': msg};
}

function listar(){
	$.ajax({
		method: "POST",
		url: 'jogador.php'
	}).done(function(response){
		$("body").html(response);
	});	
}

$("document").ready(function(){
	$("#submit").click(function(){
		var validacao = validarForm();
		if(!validacao.erro){
			alert(validacao.msg);
			return false;
		}
		
		var time = {'id': $("#id").val(), 'nome': $("#nome").val(), 'endereco': $("#endereco").val(), 'altura': $("#altura").val(), 'datanascimento': $("#datanascimento").val(), 'time': $("#time").val()};
		$.ajax({
			  method: "POST",
			  url: "jogador.php?action=salvar",
			  data: {'jogador': JSON.stringify(time)},
			  dataType: 'json'
			 	
		}).done(function(response){
			alert(response.msg);
			listar();
		});
	});
	
	$("#voltar").click(function(){
		listar();
	});
	
	$("a").click(function(event){
		event.preventDefault();
		  
		var id = $(this).attr("data-id");
		var url = $(this).attr("href");
		
		var action = url.split('=');
		if(action[1] == 'remover'){
			if(!confirm('deseja realmente remover esse jogador?')) return false;
		}
		
		$.ajax({
			method: "POST",
			url: url,
			data: {'id': JSON.stringify(id)}
				 	
		}).done(function(response){
			$("body").html(response);
		});
	});
	
	
	$("#pesquisar").click(function(event){
		
		  
		var termo = $('#termo').val();
		
		$.ajax({
			method: "POST",
			url: 'jogador.php?action=pesquisar',
			data: {'id': JSON.stringify(termo)}
				 	
		}).done(function(response){
			$("body").html(response);
		});
	});	
	
	
});
