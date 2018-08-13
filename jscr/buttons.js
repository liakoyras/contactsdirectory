/*Responsive Hamburger Menu*/

function hamburger(){
    var x = document.getElementById("myTopnav");
    if (x.className === "navbar") {
        x.className += " responsive";
    } else {
        x.className = "navbar";
    }
}

/*Show Password*/

function showPassword(){
	
    var x = document.getElementById("passfield");
	var y = document.getElementById("reppassfield");
    if(x.type === "password"){
		
        x.type = "text";
		y.type = "text";
		
    }else{
		
        x.type = "password";
		y.type = "password";
		
    }
	
}

/*Other functions/buttons*/

function home(){
	
    location.href = '../index.php'; 
	
}

function scrollHome(){
	
	var welcome = document.getElementById("main");
	var position = welcome.offsetTop;
	var add, newpos;
	
	var width = window.innerWidth;
	
	if(width <= 600){
		
		add = 38;
		
	}else{
		
		add = 47;
		
	}
	
	newpos = position - add;
	window.scrollTo(0, newpos);
	
}

function logout(){
	
	location.href = 'php/logout.php'; 
	
}