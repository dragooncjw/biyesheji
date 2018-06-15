$(function () {
    // real-time data
    var data = [],
        totalPoints = 300;

    function getAlldata(){
        //ajax动态刷新
        $.ajax({
            type: "post",
            async: false, //同步执行?
            url: "dynamic_300.php?",
            data: {},
            dataType: "json", //返回数据形式为json
            success:
                function (result) {
                    if (result) {
                        console.log(result.length);
                        for(var i=0;i<result.length;i++){
                            // console.log(result[i]['temperature']);
                            data.push(result[i]['temperature']);
                        }
                    } else {
                        console.log('get data error');
                    }
                },
            error: function (errMsg) {
                alert("不好意思，图表请求数据失败啦!");
                myChart.hideLoading();
            }
        });
    }
    getAlldata();
    console.log('get info succeed!');
    console.log(data);
    //生成随机数，每次都整张表重新渲染
    function getRandomData() {

        if (data.length > 0)
            data = data.slice(1);//去掉数组第一项

        // Do a random walk

        while (data.length < totalPoints) {

            // var prev = data.length > 0 ? data[data.length - 1] : 50,
            //     y = prev + Math.random() * 10 - 5;
            // y=28.2;
            // var y;
            function getY() {
                $.ajax({
                    type: "post",
                    async: false, //同步执行?
                    url: "dynamic_data.php?",
                    data: {},
                    dataType: "json", //返回数据形式为json
                    success:
                        function (result) {
                            if (result) {
                                y = result['temperature'];
                                // return result['temperature'];
                            } else {
                                console.log('get data error');
                            }
                        },
                    error: function (errMsg) {
                        alert("不好意思，图表请求数据失败啦!");
                        myChart.hideLoading();
                    }
                });
            }

            getY();
            // console.log(y);
            if (y < 20) {
                y = 20;
            } else if (y > 30) {
                y = 30;
            }

            data.push(y);
        }

        // Zip the generated y values with the x values

        var res = [];
        for (var i = 0; i < data.length; ++i) {
            res.push([i, data[i]])
        }

        return res;
    }

    var updateInterval = 500, live;
    $("#flot-live").length && (live = $.plot("#flot-live", [getRandomData()], {
        series: {
            lines: {
                show: true,
                lineWidth: 1,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 0.2
                    }, {
                        opacity: 0.1
                    }]
                }
            },
            shadowSize: 2
        },
        colors: ["#cccccc"],
        yaxis: {
            min: 20,
            max: 30
        },
        xaxis: {
            show: false
        },
        grid: {
            tickColor: "#f0f0f0",
            borderWidth: 0
        }
    })) && update();

    function update() {

        live.setData([getRandomData()]);

        // Since the axes don't change, we don't need to call plot.setupGrid()

        live.draw();
        setTimeout(update, updateInterval);
    }


});