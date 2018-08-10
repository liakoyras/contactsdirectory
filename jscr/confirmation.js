function confirmDelete(id){
	
	var id;
	
    if(confirm("Eίστε σίγουροι ότι θέλετε να διαγράψετε την επαφή;")){
		
		window.location.href="php/delete.php?contactid="+id;
        
    }else{
		
		window.location.href="catalogue.php";
		
    }

	
}