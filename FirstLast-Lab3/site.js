var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       var myText = xhttp.responseText;
	   //console.log(myText);
	   var myData = JSON.parse(myText);
	   console.log(myData);
    }
};
xhttp.open("GET", "elements.json", true);
xhttp.send();