//In JsLint can't duplicate query selector
//ajax in index.php
var ul=document.getElementById('TodoList');
var li=ul.getElementsByTagName('li');
console.log(li.length);
window.n=li.length;
var xmlHttp;
var i = 0;
var todoli = $('#TodoList li');
for (i = 0; i < todoli.length; i++) {
    todoli.eq(i).find('.pull-right').hide();
}
//	hide todos when default
function func(n) {
    var todoli=$('#'+n);
    var nn="x"+n.toString();
    console.log(nn);
    if(todoli.hasClass('active')){
        $('#'+nn).hide();
    }else{
        $('#'+nn).show();
    }
//		var todoli = $('#TodoList li');
//		var i = 0;
//		for (i = 0; i < todoli.length; i++) {
//			if(i==n) {
//				if (todoli.eq(i).find('span a').hasClass('active')) {
//					todoli.eq(i).find('.pull-right').hide();
//				} else {
//					todoli.eq(i).find('.pull-right').show();
//				}
//			}
//		}
}
function addTodos(){
    if($('#addt').val()==''){//judement
        alert('can not add empty');
        return;
    }
    window.n++;
    $('#TodoList').append('<li class="list-group-item box-shadow">' +
        '<a href="#" class="pull-right" data-dismiss="alert" id="x'+window.n+'" onclick="delTodos('+window.n+')">' +
        '<i class="fa fa-times icon-muted"></i>' +
        '</a>' +
        '<span class="pull-left media-xs">' +
        '<a href="#todo-'+window.n+'" data-toggle="class:text-lt" onclick="func('+window.n+')" id="'+window.n+'">' +
        '<i class="fa fa-square-o fa-fw text"></i>' +
        '<i class="fa fa-check-square-o fa-fw text-active text-success"></i>' +
        '</a>' +
        '</span>' +
        '<div class="clear" id="todo-'+window.n+'">'+$('#addt').val()+'</div>' +
        '</li>');

    $('#x'+window.n).hide();
    console.log(window.n);

    xmlHttp=GetXmlHttpObject();
    if (xmlHttp==null)
    {
        alert ("您的浏览器不支持AJAX！");
        return;
    }
    var url="updateTodos.php";
    url=url+"?disc="+$('#addt').val();
    console.log(url);
    xmlHttp.onreadystatechange=stateChanged;
    xmlHttp.open("GET",url,true);
    xmlHttp.send(null);
    $('#addt').val('');//清空输入框

}
function delTodos(n){
    var disc=$('#x'+n).parent().find('div').text();
    disc=$.trim(disc);
    xmlHttp=GetXmlHttpObject();
    if (xmlHttp==null)
    {
        alert ("您的浏览器不支持AJAX！");
        return;
    }
    var url="deleteTodos.php";
    url=url+"?disc="+disc;
    url=url+"&sid="+Math.random();//避免获得缓存结果
    console.log(url);
    xmlHttp.onreadystatechange=stateChanged;
    xmlHttp.open("GET",url,true);
    xmlHttp.send(null);
}
function GetXmlHttpObject()
{

    var xmlHttp=null;
    try
    {
        // Firefox, Opera 8.0+, Safari
        xmlHttp=new XMLHttpRequest();
    }
    catch (e)
    {
        // Internet Explorer
        try
        {
            xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e)
        {
            xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlHttp;
}
function stateChanged()
{
    if (xmlHttp.readyState==4)
    {
        console.log('success');
//			document.getElementById('grade').value=xmlHttp.responseText;
    }
}

//ajax in message.php

var xmlHttp1;

function GetXmlHttpObject1()
{

    var xmlHttp1=null;
    try
    {
        // Firefox, Opera 8.0+, Safari
        xmlHttp1=new XMLHttpRequest();
    }
    catch (e)
    {
        // Internet Explorer
        try
        {
            xmlHttp1=new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e)
        {
            xmlHttp1=new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlHttp1;
}

