function xmlhttp(){
		var xmlhttp;
		try{xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");}
		catch(e){
			try{xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");}
			catch(e){
				try{xmlhttp = new XMLHttpRequest();}
				catch(e){
					xmlhttp = false;
				}
			}
		}
		if (!xmlhttp) 
				return null;
			else
				return xmlhttp;
	}

function buscar(){
		var query = document.getElementById('q').value;
		var A = document.getElementById('resultados');
		var B = document.getElementById('loading');
	    var C = document.getElementById('c').value;
	
		var ajax = xmlhttp();

		ajax.onreadystatechange=function(){
				if(ajax.readyState==1){
						B.innerHTML = "<img src='../../img/loading.gif' alg='Loading...'>";
					}
				if(ajax.readyState==4){
						A.innerHTML = ajax.responseText;
						B.innerHTML = "";
					}
			}
		//ajax.open("GET","busqueda.php?q="+encodeURIComponent(query),true);
	    ajax.open("GET","busqueda.php?condiciona="+encodeURIComponent(C)+"&q="+encodeURIComponent(query),true);
		ajax.send(null);
		return false;
	}