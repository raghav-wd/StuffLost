var x, xmlhttp, xmlDoc;
xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "quotes.xml", false);
xmlhttp.send();
xmlDoc = xmlhttp.responseXML;
x = xmlDoc.getElementsByTagName("quote");
var table

for (i = 0; i < x.length; i++) {
    table += x[i].getElementsByTagName("text")[0].childNodes[0].nodeValue;
}
document.getElementById('quote').innerHTML = table;
