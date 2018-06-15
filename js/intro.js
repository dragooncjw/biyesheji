var xmlHttpintro;
var ifnew = $('#ifnew');
function loadScript(url, callback) {//load js files
    var script = document.createElement("script");
    script.type = "text/javascript";
    if (typeof(callback) != "undefined") {
        if (script.readyState) {
            script.onreadystatechange = function() {
                if (script.readyState == "loaded" || script.readyState == "complete") {
                    script.onreadystatechange = null;
                    callback();
                }
            };
        } else {
            script.onload = function() {
                callback();
            };
        }
    }
    script.src = url;
    document.body.appendChild(script);
}
function intro(){
    /*var script1=document.createElement('script');
    script1.src="../js/intro/intro.min.js";

    var script2=document.createElement('script');
    script2.src="../js/intro/intro1.js";
    document.body.appendChild(script1);
    document.body.appendChild(script2);*/

    // loadScript("js/intro/intro.min.js",function(){});
    loadScript("js/intro/intro1.js",function(){});

    if(ifnew.is("hidden")){}
    else {
        xmlHttpintro = GetxmlHttpObjectintro();
        if (xmlHttpintro == null) {
            alert("您的浏览器不支持AJAX！");
            return;
        }
        var url = "notNew.php";
        xmlHttpintro.onreadystatechange = stateChangedintro;
        xmlHttpintro.open("GET", url, true);
        xmlHttpintro.send(null);
    }
}
function GetxmlHttpObjectintro()
{

    var xmlHttpintro=null;
    try
    {
        // Firefox, Opera 8.0+, Safari
        xmlHttpintro=new XMLHttpRequest();
    }
    catch (e)
    {
        // Internet Explorer
        try
        {
            xmlHttpintro=new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e)
        {
            xmlHttpintro=new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlHttpintro;
}
function stateChangedintro()
{
    if (xmlHttpintro.readyState==4)
    {
        ifnew.hide();
        console.log('success');
//			document.getElementById('grade').value=xmlHttpintro.responseText;
    }
}
