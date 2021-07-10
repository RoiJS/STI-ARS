$(document).ready(function(){
	
	$('body').delegate('.loginForm','submit',function(e){
		e.preventDefault();
		username = $.trim($('.username').val());
		password = $.trim($('.password').val());
		
		if(username !=0 && password != 0){
			login = ajax({action : "login", username : username , password : password},true);
			if(login == 0){
				bootbox.alert(messageBody("warning",'Invalid username or password'), function(){
					document.getElementById("username").focus();	
					$('.username').val('');
					$('.password').val('');
				});
			}else{
				window.location = '?pg=user';
			}
		}else{
			bootbox.alert(messageBody('warning','Please fill up all required fields.'));
		}
	});
});