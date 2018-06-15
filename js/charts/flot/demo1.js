// var dom = document.getElementById("static-data");
// var myChart = echarts.init(dom);
// var app = {};
// option = null;
// // function randomData() {
// //     now = new Date(+now+oneDay+oneHour+oneMinute+oneSecond);
// //     value = value + Math.random() * 2 - 1;
// //     return {
// //         name: now.toString(),
// //         value: [
// //             [now.getFullYear(), now.getMonth(), now.getDate()+1].join('/'),
// //             Math.round(value)
// //         ]
// //     }
// // }
// var arr=[];
// var timearr=[];
// function getData() {
//     $.ajax({
//         type : "post",
//         async : false, //同步执行
//         url : "get5Second.php?",
//         data : {},
//         dataType : "json", //返回数据形式为json
//         success :
//             function(result) {
//                 console.log(result.length);
//                 if (result) {
//                     for(var i=0;i<result.length;i++){
//                         console.log(result[i]['temperature']);
//                         arr.push(result[i]['temperature']);
//                         console.log(result[i]['time']);
//                         timearr.push(result[i]['time']);
//                     }
//                 }
//             },
//         error : function(errMsg) {
//             alert("不好意思，图表请求数据失败啦!");
//             myChart.hideLoading();
//         }
//     });
//     return {
//         time:timearr,
//         value:arr
//     };
// };
// getData();
// // var data = [];
// // var now = +new Date(2018, 3, 15);
// // var oneDay=24*3600*1000;
// // var oneHour=24*3600;
// // var oneMinute=3600;
// // var oneSecond=60;
// // for(var i=0;i<1000;i++){
// //     now=new Date(+now+oneDay+oneHour+oneMinute+oneSecond);
// // }
// // var value = 25;
// // for (var i = 0; i < 1000; i++) {
// //     data.push(randomData());
// // }
//
//
// option = {
//     title: {
//         text: '过去5秒内温度变化'
//     },
//     // tooltip: {
//     //     trigger: 'axis',
//     //     formatter: function (params) {
//     //         params = params[0];
//     //         var date = new Date(params.name);
//     //         return (date.getHours()+1) + ':' + date.getMinutes()+ ':' + date.getSeconds() + ' ' + date.getDate() + '/' + date.getMonth() + '/' + date.getFullYear() + ' : ' + params.value[1];
//     //     },
//     //     axisPointer: {
//     //         animation: false
//     //     }
//     // },
//     legend: {
//         data:['时间','温度']
//     },
//     xAxis: {
//         type: 'time',
//         splitLine: {
//             show: false
//         },
//         data:timearr
//     },
//     yAxis: {
//         type: 'value',
//         // boundaryGap: [0, '100%'],
//         min:20,
//         max:30,
//         splitLine: {
//             show: false
//         }
//     },
//     series: [{
//         name: '温度',
//         type: 'line',
//         showSymbol: false,
//         hoverAnimation: false,
//         data:
//     }]
// };
//
// if (option && typeof option === "object") {
//     myChart.setOption(option, true);
// }

var dom = document.getElementById("static-data");
var myChart = echarts.init(dom);
var app = {};
var arr=[];
var timearr=[];
var temp_max;
var temp_min;
var temp_items;
var temp_diff;
function getData() {
    $.ajax({
        type : "post",
        async : false, //同步执行
        url : "get5Second.php?",
        data : {},
        dataType : "json", //返回数据形式为json
        success :
            function(result) {
                // console.log(result.length);
                if (result) {
                    temp_max=result[0]['temperature'];
                    temp_min=result[0]['temperature'];

                    for(var i=0;i<result.length;i++){
                        if(result[i]['temperature']>temp_max){
                            temp_max=result[i]['temperature'];
                        }
                        if(result[i]['temperature']<temp_min){
                            temp_min=result[i]['temperature'];
                        }
                        arr.push(result[i]['temperature']);
                        timearr.push(result[i]['time']);
                    }
                    temp_diff=temp_max-temp_min;
                    temp_items=result.length;
                    // console.log(temp_max);
                    // console.log(temp_min);
                    // console.log(temp_items);
                    // console.log(temp_diff.toFixed(4));
                    document.getElementById('temp_max').innerHTML=temp_max;
                    document.getElementById('temp_min').innerHTML=temp_min;
                    document.getElementById('temp_items').innerHTML=temp_items;
                    document.getElementById('temp_diff').innerHTML=temp_diff.toFixed(1);
                }
            },
        error : function(errMsg) {
            alert("不好意思，图表请求数据失败啦!");
            myChart.hideLoading();
        }
    });
}
getData();
option = null;
option = {
    title:{
        text:'last 1 minute'
    },
    tooltip: {
        trigger: 'axis',
        formatter: function (params) {
            params = params[0];
            // var date = new Date(params.time);
            return  params.value[0].toString()+params.value[1].toString()+params.value[2].toString()+params.value[3].toString();
        },
        axisPointer: {
            animation: false
        }
    },
    xAxis: {
        type: 'category',
        data: timearr
    },
    yAxis: {
        type: 'value',
        min:20,
        max:30
    },
    series: [{
        data: arr,
        type: 'line'
    }]
};
if (option && typeof option === "object") {
    myChart.setOption(option, true);
}