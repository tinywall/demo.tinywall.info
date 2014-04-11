<?php
//database connection
$dbHost='localhost';
$dbUserName='root';
$dbPassWord='';
$dbName = 'twinfo_demos';
$dbLinkConnection = mysql_connect($dbHost,$dbUserName,$dbPassWord) or die("Couldn't make connection.");
$dbSelected = mysql_select_db($dbName, $dbLinkConnection) or die("Couldn't select database");

//select posts from database
$query="select * from posts order by post_id desc";
$result=mysql_query($query) or die("couldn't select data from table");

//create json format text from posts
$json=array();
while($row=mysql_fetch_array($result)){
	$from=array('id'=>$row['user_id'],'name'=>$row['user_name']);
	$post=array('post_id'=>$row['post_id'],'from'=>$from,'post'=>$row['post'],'time'=>$row['time']);
	array_push($json,$post);
}

//display it to the user
header('Content-type: application/json');
echo "{\"posts\":".json_encode($json)."}";
?>