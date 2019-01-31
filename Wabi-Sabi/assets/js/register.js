$(document).ready(function(){ // ejecuta el codigo a soon as the document is ready
	$("#hideLogin").click(function(){ //con el dolar sign creo un objeto con un id o class o etc
		$("#loginForm").hide();
		$("#registerForm").show();
	});

	$("#hideRegister").click(function(){
		$("#loginForm").show();
		$("#registerForm").hide();
	});

});