<?php
$str="asdasd_";
if(preg_match("/[^\w]+/",$str,$num)){
	echo "存在<br/>";
}else{
	echo "不存在<br/>";
}
 
 
$str="中国是世界古老的国度，存在5000年历史文明。中国目前与14亿人口，也是最大的人口国度";

//匹配数字
preg_match("/[\d]+/",$str,$num);
print_r($num);
//子模式匹配
preg_match("/([\d]+)/",$str,$num);
print_r($num);
//匹配所有
preg_match_all("/[\d]+/",$str,$num);
print_r($num);
//preg_replace — 执行一个正则表达式的搜索和替换
echo $str=preg_replace("/[\d]+/","$0 匹配",$str);
echo "<br />";
//preg_replace_callback使用回调替换
echo preg_replace_callback("/[\d]+/",function($matches){
	return $matches[0]*2;
},$str);


//匹配邮箱 
$str="362606856@qq.com";
if(preg_match("/\w+@\w+\.(\w)+/",$str)){
	echo $str."是邮箱";
}
//匹配中文
$str="as中ddd";
if(preg_match("/[\x{4e00}-\x{9fa5}]+/u",$str)){
	echo $str."含中文<br/>";
}
//过滤非法字符串
$preg="美女|写真|女优|混蛋";
$str="这家伙真实混蛋";
if(preg_match("/$preg/",$str)){
	echo $str."含非法字符<br/>";
}


//解析html 匹配出链接和标题
$html='<div class="list">
	<div class="item">
		<a class="link" href="http://www.deituicms.com">这是标题</a>
		<div class="price">￥123</div>
	</div>
	<div class="item">
		<a  class="link2" href="http://www.deituicms.com">这是标题</a>
	</div>
	<div class="item">
		<a  class="link3" href="http://www.deituicms.com">这是标题</a>
	</div>
</div>';
preg_match_all("/<a[^>]*href=\"(.*)\"[^>]*>(.*)<\/a>/iUs",$html,$arr);
print_r($arr);

//日期匹配
// 将文本中的年份增加一年.
$text = "April fools day is 04/01/2002\n";
$text.= "Last christmas was 12/24/2001\n";
// 回调函数
function next_year($matches)
{
  // 通常: $matches[0]是完成的匹配
  // $matches[1]是第一个捕获子组的匹配
  // 以此类推
  return $matches[1].($matches[2]+1);
}
echo preg_replace_callback(
            "|(\d{2}/\d{2}/)(\d{4})|",
            "next_year",
            $text);