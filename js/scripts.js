
	//to restrict multiple clicks
	/*function clicks(){
		var clicks;
	
		//generate getters and setters
		this.setClicks=setClicks;
		this.getClicks=getClicks;
	}

	//setter Function
	function setClicks(clicks){
		this.clicks=clicks;
	}

	//getter Function
	function getClicks(clicks){
		return this.clicks;
	}
*/



function filter(str){

var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function(){
		if (this.readyState==4 && this.status==200){
			document.querySelector('#output').innerHTML=this.responseText;
		}
	};
	xmlhttp.open("GET","filter.php?q="+str,true);
		xmlhttp.send();
}

function search(str){

	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function(){
		if (this.readyState==4 && this.status==200){
			document.querySelector('#output').innerHTML=this.responseText;
		}
	};
	xmlhttp.open("GET","search.php?q="+str,true);
		xmlhttp.send();
}

function addFavourite(id){
	
var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function(){
		if (this.readyState==4 && this.status==200){
			
		}
	};
	xmlhttp.open("GET","addFavourites.php?id="+id,true);
		xmlhttp.send();
}

function removeFavourite(id){

	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function(){
		if (this.readyState==4 && this.status==200){
			
		}else{
			return;
		}
	};
	xmlhttp.open("GET","removeFavourites.php?id="+id,true);
		xmlhttp.send();
}

function incrementViews(id){

	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function(){
		if (this.readyState==4 && this.status==200){
			document.querySelector('#output')=this.responseText;
		}else{
			return;
		}
	};
	xmlhttp.open("GET","incrementViews.php?id="+id,true);
		xmlhttp.send();
}