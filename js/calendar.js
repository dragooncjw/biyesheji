$.ajaxSetup({cache : false });//清除页面缓存，才能进行calendar刷新

$(document).ready( function(){
    var cTime = new Date(), month = cTime.getMonth()+1, year = cTime.getFullYear();
    theMonths = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

    theDays = ["S", "M", "T", "W", "T", "F", "S"];
    events = [];events.push(
	[
		"4/"+"5/"+"2018",
        "11",
        "#",
        "#bcb412",
        "11"
     ]);events.push(
	[
		"3/"+"5/"+"2018",
        "111",
        "#",
        "#160684",
        "111"
     ]);events.push(
	[
		"2/"+"5/"+"2018",
        "next day to 5.1",
        "#",
        "#0725e3",
        "yes"
     ]);events.push(
	[
		"8/"+"5/"+"2018",
        "nothing",
        "#",
        "#bfd431",
        "ok"
     ]);events.push(
	[
		"10/"+"2/"+"2018",
        "1",
        "#",
        "#2aec5b",
        ""
     ]);events.push(
	[
		"9/"+"2/"+"2018",
        "change the temperature",
        "#",
        "#990e6a",
        "temperature higher"
     ]);events.push(
	[
		"8/"+"2/"+"2018",
        "this is just a test",
        "#",
        "#6390cc",
        ""
     ]);events.push(
	[
		"7/"+"2/"+"2018",
        "222",
        "#",
        "#6cfb48",
        "222"
     ]);
    events.push([
        "5/"+month+"/"+year,
        'this is a test',
        '#',
        '#fb6b5b', //emergency
        'Contents here'
    ]);
    events.push([
        "6/"+month+"/"+year,
        '123123',
        '#',
        '#c3be65',
        ''
    ]);
    $('#calendar').calendar({
        months: theMonths,
        days: theDays,
        events: events,
        popover_options:{
            placement: 'top',
            html: true
        }
    });
});

