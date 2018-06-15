//tests below
// var headeq=document.getElementById("heateq");
// headeq.checked=true;//用于设置input是否checked
// function ifche()//可以进行input是否checked的方法
// {
//     console.log(headeq.checked);
// }

function lightup(equip){
    if(equip==='led1'){             //3
        var ledimg1=document.getElementById('ledimg1');
        if(ledimg1.src==='http://localhost/mysites/biyesheji/images/darkness.png'){//这里的localhost/mysites需要改成193。112。6。95
            ledimg1.src='images/lightness.png';
            window.location.href="./operations/led3.php?signal=1";
        }
        else{
            ledimg1.src='images/darkness.png';
            window.location.href="./operations/led3.php?signal=0";
        }
    }
    else if(equip==='led2'){        //4
        var ledimg2=document.getElementById('ledimg2');
        if(ledimg2.src==='http://localhost/mysites/biyesheji/images/darkness.png'){
            ledimg2.src='images/lightness.png';
            window.location.href="./operations/led4.php?signal=1";
        }
        else{
            ledimg2.src='images/darkness.png';
            window.location.href="./operations/led4.php?signal=0";
        }
    }
    else if(equip==='heatd'){       //1
        console.log('heatd clicked');
        var heatd=document.getElementById('heatd');
        if(heatd.checked)
            window.location.href="./operations/led1.php?signal=1";
        else
            window.location.href="./operations/led1.php?signal=0";
    }
    else if(equip==='coold'){       //2
        console.log('coold clicked');
        var coold=document.getElementById('coold');
        if(coold.checked)
            window.location.href="./operations/led2.php?signal=1";
        else
            window.location.href="./operations/led2.php?signal=0";
    }
}
function timing(){

    var datetime=document.getElementById('datetime').value;
    console.log(datetime);
    var nian=datetime.substr(6,4);
    var yue=datetime.substr(3,2);
    var ri=datetime.substr(0,2);
    var shi=datetime.substr(11,2);
    var fen=datetime.substr(14,2);
    var miao=datetime.substr(17,2);
    var myurl="./timing.php?nian="+nian+"&yue="+yue+"&ri="+ri+"&shi="+shi+"&fen="+fen+"&miao="+miao;
    // console.log("nian:",nian);
    // console.log("yue:",yue);
    // console.log("ri:",ri);
    // console.log("shi:",shi);
    // console.log("fen:",fen);
    window.location.href=myurl;
    // console.log(timeleft);
}
