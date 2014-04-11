<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Facebook like friendly time with GMT and UTC in web application with PHP & Javascript</title>
<script language="javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script language="javascript">
function getValidDate(ivDate){
var arrDateTime = ivDate.split("T");
var strTimeCode = arrDateTime[1].substring(0,arrDateTime[1].indexOf("+"));
var valid_date = new Date();
var arrDateCode = arrDateTime[0].split("-");
valid_date.setYear(arrDateCode[0]);
valid_date.setMonth(arrDateCode[1]-1);
valid_date.setDate(arrDateCode[2]);
var arrTimeCode = strTimeCode.split(":");
valid_date.setHours(arrTimeCode[0]);
valid_date.setMinutes(arrTimeCode[1]);
valid_date.setSeconds(arrTimeCode[2]);
return valid_date;
}
var month=new Array("January","February","March","April","May","June","July","August","September","October","November","December");
function toFormattedDate(gmdate){
var date=getValidDate(gmdate);
var offset=parseInt(date.getTimezoneOffset());
var sec_diff = (((new Date()).getTime()+(offset*60*1000)-date.getTime())/1000);
var day_diff = Math.floor(sec_diff / 86400);
if(sec_diff<60){
return "Just Now";
}else if(sec_diff<120){
return "1 minute ago";
}else if(sec_diff<3600){
return ""+Math.floor( sec_diff / 60 ) + " minutes ago";
}else if(sec_diff<7200){
return "1 hour ago";
}else if(sec_diff<86400){
return Math.floor( sec_diff / 3600 ) + " hours ago";
}else if(day_diff==1){
return "yesterday";
}else if(day_diff<7){
return day_diff + " days ago";
}else if(day_diff<31){
return Math.ceil( day_diff / 7 ) + " weeks ago";
}else{
return month[date.getMonth()]+" "+date.getDate()+", "+date.getFullYear();
}
return date;
}
$(document).ready(function(){
$('.unformattedtime').each(function(index) {
$(this).attr('alt',$(this).html());
$(this).attr('title',$(this).html());
$(this).html(toFormattedDate($(this).html()));
});
});
</script>
<body>
<div style="width:960px;margin:0 auto;">
<div style="">
<h1>TinyWall InfoMedia - Live demo</h1>
</div>
<div style="float:right">
	<a href="http://tinywall.info/2011/10/08/facebook-like-friendly-time-with-gmt-and-utc-in-web-application-with-php-javascript">Back to Tutorial</a>  / <a href="http://tinywall.info/downloads/facebook-like-gmt-time-to-local-time-in-php-javascript.php.zip">Download Code</a>
</div>
<h3 style="font: normal arial, verdana;border-bottom: 1px solid #922aaa;">Facebook like friendly time with GMT and UTC in web application with PHP & Javascript</h3>
	<?php
	echo "Current Time (date('Y-m-d H:i:s')) :<b> ".date("Y-m-d H:i:s").'</b>';
	echo "<br/>";
	$gmttime=gmdate("Y-m-d H:i:s", time());
	echo "GMT Time (gmdate('Y-m-d H:i:s', time())) :<b> ".$gmttime.'</b>';
	echo "<br/>";
	$utctime=date('Y-m-d\TH:i:s\+0000',strtotime($gmttime));
	echo "UTC Time (date('Y-m-d\TH:i:s\+0000',strtotime(\$gmttime))) :<b> ".$utctime.'</b>';
	echo "<br/>";
	echo "Friendly Time from UTC time : <b><span class='unformattedtime'>".$utctime."</span></b>";
	?>
	<br/><br/>
</div>
</body>
</html>