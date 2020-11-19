<!--end of session logged in user check-->

<footer>&copy 2020- Business Together</footer>

<!--javascript scripts-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script src="js/scripts.js"></script>
<script>

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
</script>
</body>
</html>
