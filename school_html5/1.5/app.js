$(function(){
	$(document).on("click","#setHtml",function(){
		var v=$("#value").val();
		$("#value").val("这是设置的value");
		$("#html").html(v);
		
	})
	$(document).on("click","#append",function(){
		$(".list").append('<div class="item">列表子项</div>');
	})
	$(document).on("click","#prepend",function(){
		$(".list").prepend('<div class="item">列表子项前面加的</div>');
	})
	$(document).on("click",".item",function(){
		$(this).remove();
	})
	$(document).on("click","#toggle",function(){
		$("#aniBox").toggle(1000);
		$("#aniBox").animate({
			
			left:'250px',
			opacity:'0.5',
			height:'150px',
			width:'150px'
		});
	 
	})
	$(document).on("click","#getData",function(){
		$.get("data.html",function(res){
			$("#ajaxRes").html(res)
		})
	})
	$(document).on("click","#getJson",function(){
		$.get("data.json",function(res){
			$("#ajaxRes").html(res.res)
		},"json")
	})
	$(document).on("click","#ajaxJson",function(){
		$.ajax({
			url:"data.json",
			type:"GET",
			success:function(res){
				$("#ajaxRes").html(res.res)
			}
		})	 
	})
})