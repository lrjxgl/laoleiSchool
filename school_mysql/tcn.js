var files=[];
var fileIndex=0;
var lastfile;
var it;
$(function(){
	$.get("tcn.php?a=files",function(res){
		files=res;
		getContent();
	},"json")
})
function getContent(){
	$.get("tcn.php?a=get&file="+files[fileIndex],function(res){
		$("body").html(res);
		lastfile=files[fileIndex];
		fileIndex++;
		it=setInterval(function(){
			document.documentElement.scrollTop+=300;
			if($(document).height()== $(window).height() + $(window).scrollTop()){
				clearInterval(it);
				$.post("tcn.php?a=save&file="+lastfile,{
					content:$("body").html()
				},function(res){
					window.location.reload();
				})
				
			}
		},2000)
	})
}