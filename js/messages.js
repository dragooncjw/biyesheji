//functions for message.php
function setLevel(aval){
    aval=aval.trim();//去掉字符串两端空格
    if(aval[aval.length-1]=='1'){
        aval=aval.substr(0,aval.length-1);
        $('#mylevel').val(aval);
    }else{
        $('#mylevel').val('');
    }
}

function setUser(aval){
    aval=aval.trim();
    var oin=$('#myreceiver').val();
    if(aval[aval.length-1]=='1')
    {
        aval=aval.substr(0,aval.length-1);
        if(oin=="")
            oin+=aval;
        else
        oin=oin+","+aval;
    }
    else
    {
        aval=aval.substr(0,aval.length-1);
        var arr=oin.split(',');
        var arr1=new Array();
        for(var i=0;i<arr.length;i++){
            if(arr[i]==aval)
                continue;
            else{
                arr1.push(arr[i]);
            }
        }
        // console.log(arr1);
        oin=arr1[0];
        for(var i=1;i<arr1.length;i++){
            oin+=' '+arr1[i];
        }
    }
    // console.log('oin:'+oin);
    if(oin!=undefined)
        oin=oin.trim();

    $('#myreceiver').val(oin);

}
function sendM(){
    var text=$('#messagedisc').val();
    $('#mydisc').val(text);
    var level=document.getElementById('mylevel').value;
    var receiver=document.getElementById('myreceiver').value;
    var disc=document.getElementById('mydisc').value;
    console.log(level);
    console.log(receiver);
    console.log(disc);
    if(level==""){
        alert('please choose you message\' level.');
        return;
    }else if(receiver==""){
        alert('please choose who you will send.');
        return;
    }else if(disc==""){
        alert('please input your message.');
        return;
    }else{
        document.getElementById('myform').submit();
    }
}
