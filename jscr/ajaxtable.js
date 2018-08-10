function showContacts(){
	
	if(window.XMLHttpRequest){

		// code for IE7+, Firefox, Chrome, Opera, Safari
		var xmlhttp = new XMLHttpRequest();

	}else{

		// code for IE6, IE5
		var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

	}

	xmlhttp.onreadystatechange = function(){

		if (this.readyState == 4 && this.status == 200){
			document.getElementById("contactTable").innerHTML = this.responseText;

		}
	};

	xmlhttp.open("GET","php/getcontact.php",true);
	xmlhttp.send();

}

showContacts();