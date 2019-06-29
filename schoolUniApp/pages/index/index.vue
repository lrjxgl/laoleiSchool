<template>
	<div >
		<div style="padding:10px;">
		<div>老雷PHP全栈开发教程之了解uniApp</div>
		<div>{{title}}</div>
		<div>{{content}}</div>
		<div @click="goDetail(item.id)" v-for="(item,index) in list" :key="index">
			{{item.title}}
		</div>
		<navigator   url="../index/show">跳转到详情页</navigator>
		</div>
		<list-item v-on:call-parent="goDetail" :items="list"><div style="padding-left:10px">列表</div></list-item> 
	</div>
</template>
<script>
	import listItem from "../../components/list-item.vue";
	export default({
		components:{
			listItem
		},
		data:function(){
			return {
				title:"跟着老雷学PHP，快速成为合格的PHP开发者",
				content:"",
				list:[]
			}
		},
		onLoad:function(ops){
			this.getPage();
		},
		methods:{
			getPage:function(){
				var that=this;
				this.comm.get({
					url:"/wxapp.php",
					success:function(res){
						that.list=res.data.list;
					}
				});
				this.comm.post({
					url:"/wxapp.php",
					data:{
						aaa:1,
						bbb:2
					},
					success:function(res){
						console.log(res)
					}
				});
			},
			goDetail:function(id){
				console.log(id)
				uni.navigateTo({
					url:"../index/show?id="+id
				})
			}
		}
		 
	})
</script>
