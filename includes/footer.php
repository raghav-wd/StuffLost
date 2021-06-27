<footer class="container-3">

    

    <p id="quote"></p>
    <p>Stuff Lost&copy;?</p>

</footer>

    <script>
            var xhttp = new XMLHttpRequest(); var text1="";
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            myFunctions(this);
        }
    };
    xhttp.open("POST", "quotes.xml", true);
    xhttp.send();

    function myFunctions(xml) {
        myFunction(xml);
    }
    function myFunction(xml) {
        xmlDoc = xml.responseXML;
        var x = xmlDoc.getElementsByTagName("quote");
        var index = Math.round(Math.random()*(x.length-1));
        console.log(index);
        var y= x[index].getElementsByTagName("text")[0].childNodes[0].nodeValue;
        text1 = y;
        document.getElementById('quote').innerHTML = text1;
    }


	</script>
    <!--<script>
    var xhttp = new XMLHttpRequest();
    var text = "";var x;var xmlDoc;
    xhttp.open("POST", "quotes.xml", true);
    xhttp.send();
    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){
        xmlDoc = xhttp.responseXML;
        x = xmlDoc.getElementsByTagName("quote");
        for(var i=0; i<x.length;i++){
            var y = x[i].getElementsByTagName("text")[0].childNodes[0].nodeValue;
            text += y;
        }
    }
}
document.getElementById('quote').innerHTML = text;
    </script>
-->