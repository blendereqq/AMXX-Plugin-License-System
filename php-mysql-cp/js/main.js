function CloseMessage(){
	$("#message").empty();
}
function ms(id) {
		$.ajax({
				type:'post',
				url:'ajax.php',
				data:{'master':id},
				response:'text',
				success: function(html) {
					$("#message").empty();
					$("#message").append(html);
				}
		});
		if(id==1){
		document.getElementById("status").innerHTML = "Server Status: <span id='status-on'>ON</span>";
		}
		if(id==2){
		document.getElementById("status").innerHTML = "Server Status: <span id='status-off'>OFF</span>";
		}
		if(id==3){
		document.getElementById("status").innerHTML = "Server Status: <span id='status-on'>ON</span>";
		}
		
}
