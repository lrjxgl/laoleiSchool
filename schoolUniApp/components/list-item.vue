<template>
	<div class="list">
		<slot></slot>
		<div @click="$emit('call-parent',item.id)"  v-for="(item,index) in items" :key="index" class="list-item">
			{{item.title}}
		</div>
	</div>
</template>

<script>
	export default{
		name:"list-item",
		props:{
			items:{},
			title:""
		},
		data:function(){
			return {
				aa:""
			}
		},
		created:function(){
			console.log("components created")
		},
		methods:{
			goDetail:function(id){
				uni.navigateTo({
					url:"../index/show?id="+id
				})
			}
		}
	}
</script>

<style>
	
	.list-item{
		background-color: #fff;
		border-bottom: 1px solid #efefef;
		padding: 10px;
		cursor: pointer;
	}
</style>
