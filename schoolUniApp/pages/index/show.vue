<template>
	<div>
		<div>文章详情页面</div>
		<div>{{data.title}}</div>
		<div>{{data.content}}</div>
	</div>
</template>

<script>
	export default({
		data:function(){
			return {
				data:{}
			}
		},
		onLoad:function(ops){
			
			this.getPage(ops.id);
		},
		methods:{
			getPage:function(id){
				var that=this;
				this.comm.get({
					url:"wxapp.php?a=show&id="+id,
					success:function(res){
						that.data=res.data.data;
					}
				})
			} 
		}
		 
	})
</script>

<style>
</style>
