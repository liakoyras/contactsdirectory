function confirmDelete(id){
	
	var id;
	var prompt;
	
	if(getCookie('lang')){
		if (getCookie('lang') == 'GR'){
			prompt = "Eίστε σίγουροι ότι θέλετε να διαγράψετε την επαφή;";
		}else{
			prompt = "Are you sure you want to delete this contact?";
		} 
	}else{
		prompt = "Are you sure you want to delete this contact?";
	}
	
    if(confirm(prompt)){
		
		window.location.href="php/delete.php?contactid="+id;
        
    }else{
		
		window.location.href="catalogue.php";
		
    }

	
}