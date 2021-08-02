
    
$(document).ready(function() {
    
	$('#loginbtn').on('click', function() {
        event.preventDefault();
		var username = $('#username').val();
		var password = $('#password_log').val();
		if(username!="" && password!="" ){
			$.ajax({
				url: "../home/loginchk.php",
				type: "POST",
                timeout: 20000,
				data: {
					
					username: username,
					password: password,						
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						location.href = "../home/home.php";						
					}
					else if(dataResult.statusCode==201){
					
					}
					
				}
			});
		}
		
	});
});
