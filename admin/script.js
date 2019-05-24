function getProducts(){
	var xmlHtttp =new XMLHttpRequest();
	xmlHtttp.open("POST","ajaxProducts.php",true);
         //search value to be get
		var data = new FormData();
		data.append('keyword',this.value);
		xmlHtttp.send(data);
	

		xmlHtttp.onreadystatechange = function(){
			if (xmlHtttp.readyState == 4) {
				document.getElementById('content').innerHTML=xmlHtttp.responseText;
				document.getElementById('content').style.display='block';
         }

	}
}
function myLoad(){
          		element=document.getElementById('keyword');
          		element.addEventListener('keyup',getProducts);
          	}
document.addEventListener('DOMContentLoaded',myLoad);