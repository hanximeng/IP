<!--
作者：寒曦朦
博客：http://hanximeng.com
前端：Bootstrap 4
-->
<!DOCTYPE html>
<html>
<head>
<title>IP地址查询 - 寒曦朦</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="renderer" content="webkit|ie-comp|ie-stand"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
<meta http-equiv="Pragma" content="no-cache"/>
<meta http-equiv="Expires" content="0"/>
<!-- CSS -->
<link href="https://cdn.bootcss.com/twitter-bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="container" style="padding-top:15px">
	<div class="card">
		<form action="./" method="post" style="padding:15px">
<?php
//判断是否输入了IP
if(!empty($_POST['ip'])){
$IP = $_POST['ip'];
//获取接口数据
$data = file_get_contents("https://sp0.baidu.com/8aQDcjqpAAV3otqbppnN2DJv/api.php?query=".$IP."&resource_id=6006&ie=utf-8&oe=utf-8");
//转换为数组
$array = json_decode($data,true);
//仅显示想要的
$query['IP'] = $array['data']['0']['origip'];
$query['location'] = $array['data']['0']['location'];
//输出结果
echo '			<div class="alert alert-primary" role="alert">';
echo "				<p>IP：".$query['IP']."</p>";
echo "				<p>地址：".$query['location']."</p>";
echo '			</div>';
}
?>
			<div class="form-group">
				<label for="exampleInput">IP地址：</label>
				<input type="text" class="form-control" id="ip" name="ip" aria-describedby="Help" placeholder="在此输入你要查询的IP地址">
				<small id="Help" class="form-text text-muted">输入IP地址即可，切勿带上http://或https://.</small>
			</div>
			<button type="submit" class="btn btn-primary">查询</button>
			<p style="padding-top:15px">您的IP：<?php echo $_SERVER['REMOTE_ADDR'];?></p>
		</form>
	</div>
	<center style="padding-top:25px">
		<a href="https://hanximeng.com/">寒曦朦博客</a>
		<a>|||</a>
		<a href="https://github.com/hanximeng/IP">本项目 Github</a>
	</center>
</body>
</html>