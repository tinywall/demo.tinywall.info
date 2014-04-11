<html>
<head>
<script language="javascript" src="jquery-1.4.4.min.js"></script>
<script>
$(document).ready(function(){
$.getJSON('json-posts.php', function(json) {//to send a ajax request for json data
var output="";
for(var i=0;i<json.posts.length;i++){//for each posts in the json response
output+="<div>";
output+="<b>"+json.posts[i].from.name+"</b><br/>";
output+=json.posts[i].post+"<br/>";
output+="<small>posted on "+json.posts[i].time+"</small>";
output+="</div>";
}
$('#posts').html(output);
});
});
</script>
</head>
<body>
<div id="posts"></div>
</body>
</html>