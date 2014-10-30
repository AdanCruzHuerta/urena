	$(document).ready(function(){
		$("#btn_enviar").click(function(){
					var expRegEmail= /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;//Expresion regular correo
					var email = $("#email").val();
					var c_email = $("#c_email").val();
					var nombre = $("#nombre").val();
					var ap_paterno = $("#ap_paterno").val();
					var ap_materno = $("#ap_materno").val();
					var password = $("#password").val();
					var c_password = $("#c_password").val();
					var check_ok = $("#check_ok");

					if(email == "" || !expRegEmail.exec(email)){
						$("#email").addClass("campo-vacio");
					}else{
						$("#email").removeClass("campo-vacio");
					}
					if(c_email == "" || !expRegEmail.exec(c_email)){
						$("#c_email").addClass("campo-vacio");
					}else{
						$("#c_email").removeClass("campo-vacio");
					}
					if(nombre == ""){
						$("#nombre").addClass("campo-vacio");
					}else{
						$("#nombre").removeClass("campo-vacio");
					}
					if(ap_paterno == ""){
						$("#ap_paterno").addClass("campo-vacio");
					}else{
						$("#ap_paterno").removeClass("campo-vacio");
					}
					if(ap_materno == ""){
						$("#ap_materno").addClass("campo-vacio");
					}else{
						$("#ap_materno").removeClass("campo-vacio");
					}
					if(password == ""){
						$("#password").addClass("campo-vacio");
					}else{
						$("#password").removeClass("campo-vacio");
					}
					if(c_password == ""){
						$("#c_password").addClass("campo-vacio");
					}else{
						$("#c_password").removeClass("campo-vacio");
					}
					if(email == "" || c_email == "" || nombre == "" || ap_paterno == ""|| ap_materno == "" || password == "" || c_password == ""){
						// ----- CAMPOS LLENOS
						$("#mensaje").html("<p>Todos los campos son requeridos</p>");
						$("#mensaje").fadeIn();
						return false;
					}else if(!expRegEmail.exec(email) || !expRegEmail.exec(c_email)){
						// ------ EMAILS VALIDOS 
						$("#mensaje").html("<p>Ingresa una dirección de email válida </p>");
						$("#mensaje").fadeIn();
						return false;
					}else if(email != c_email){
						// ------ EMAILS IGUALES
						$("#mensaje").html("<p>Los email's ingresados no coinciden</p>");
						$("#mensaje").fadeIn();
						return false;
					}else if(password != c_password){
						// ------ PASSWORDS IGUALES
						$("#mensaje").html("<p>Las contraseñas no coinciden</p>");
						$("#mensaje").fadeIn();
						return false;
					}else if(!$(check_ok).is(':checked')){
						// ------ ACEPTAR TERMINOS Y CONDICIONES
						$("#mensaje").html("<p>Debes aceptar las politicas de privacidad</p>");
						$("#mensaje").fadeIn();
						return false;
					}else{
						var btn = $(this);
						btn.button('reset');
   						btn.button('loading');

						// realizamos peticion ajax
						$.ajax({
							url:'http://localhost/urena/index.php/home/valida_correo',
							timeout: 5000, //sets timeout to 3 seconds
							type:'post',
							data:{
								email: email
							}
						}).done(function(resp){
								var miJson = jQuery.parseJSON(resp);
								if(miJson){
									$("#mensaje").html('<p>El email ingresado ya existe, intente uno diferente</p>');
									$("#mensaje").fadeIn();
									btn.button('reset'); 
									return false;
								}else{
									$("#mensaje").hide();
									$.ajax({
										url:'http://localhost/urena/index.php/home/insert_cliente',
										timeout: 3000, //sets timeout to 3 seconds
										type:'post',
										data:{
											email:email,
											nombre:nombre,
											ap_paterno:ap_paterno,
											ap_materno:ap_materno,
											password:password
										}
									}).done(function(resp2){
										var miJson = jQuery.parseJSON(resp2);
										btn.button('reset');
										if(miJson){
											$("#success").html("<button type='button' class='close' data-dismiss='alert'>&times;</button><p>Revisa tu email, se te ha enviado un correo de Bienvenida</p>");
											$("#success").fadeIn();
										}else{
											btn.button('reset');
											$("#mensaje").html("<p>Intenta mas tarde. Gracias por tu comprensión</p>");
											$("#mensaje").fadeIn();
										}
									});
								}
							}
						);
						return false;	
					}
		});
	});