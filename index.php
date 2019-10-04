<?php
//判断是否输入了IP
if(empty($_GET['ip'])){
echo "IP地址为空！";exit;
}
//获取接口数据
$data = file_get_contents("https://sp0.baidu.com/8aQDcjqpAAV3otqbppnN2DJv/api.php?query=".$_GET['ip']."&resource_id=6006&ie=utf-8&oe=utf-8");
//转换为数组
$array = json_decode($data,true);
//仅显示想要的
$query['IP'] = $array['data']['0']['origip'];
$query['location'] = $array['data']['0']['location'];
//打印结果
print_r($query);
?>