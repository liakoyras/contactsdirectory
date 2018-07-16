/*Responsive Hamburger Menu*/

function hamburger() {
    var x = document.getElementById("myTopnav");
    if (x.className === "navbar") {
        x.className += " responsive";
    } else {
        x.className = "navbar";
    }
}

/*Other functions/buttons*/

function home() {
	
    location.href = '../index.php'; 
	
}

function goback(){
	
	window.history.back();
	
}

function scrollHome(){
	
	var welcome = document.getElementById("main");
	var position = welcome.offsetTop;
	var add, newpos;
	
	var width = window.innerWidth;
	
	if(width <= 600){
		
		add = 130;
		newpos = position - add;
		
	}else{
		
		newpos = position;
		
	}
	
	window.scrollTo(0, newpos);
	
}

function logout(){
	
	location.href = 'php/logout.php'; 
	
}