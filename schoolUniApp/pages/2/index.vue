<template>
	<div class="pd-10" v-if="pageLoad">
		{{title}}
		<div>{{lifecycle}}</div>
		<div class="ifBox">
			<div v-if="num==1">1</div>
			<div v-else-if="num==2">2</div>
			<div v-else>其他数据</div>
		</div>
		<div class="list">
			<div>列表</div>
			<div class="item" v-for="(item,index) in list" :key="index">
				{{item.title}}
			</div>
		</div>
		
		<div class="a" :class="mclass" style="font-size: 16px;" :style="{fontSize:fontsize}">class style</div>
		<div class="a" @click="changeNum" @mouseenter="enter" v-bind:class="num==1?'b':''">点击我</div>
		<input type="text" :value="num" /> 
		<m-footer></m-footer>
	</div>
	
</template>

<script>
	import mFooter from "../../components/footer.vue";
	export default{
		components:{
			mFooter
		},
		data(){
			return {
				title:"认识vue",
				num:1,
				list:[],
				status:"",
				mclass:"mclass",
				fontsize:"22px",
				lifecycle:"",
				pageData:[],
				pageLoad:false
			}
		},
		onLoad:function(){
			this.getPage();
			
			this.lifecycle+="onLoad";
		},
		onShow:function(){
			this.lifecycle+="onShow";
		},
		onReady:function(){
			this.lifecycle+="onReady";
		},
		created:function(){
			this.lifecycle+="onCreated";
		},
		onHide:function(){
			this.lifecycle+="onHide";
		},
		onPullDownRefresh:function(){
		
		},
		onReachBottom:function(){
			
		},	
		methods:{
			getPage(){
				this.pageLoad=true;
				this.list=[
					{id:1,title:"中国"},
					{id:2,title:"美国"}
					
				]
			},
			changeNum:function(){
				if(this.num==2){
					this.num=1;
				}else{
					this.num=2;
				}
			},
			enter:function(){
				this.num=3;
			}
		}
	}
</script>
	
<style scoped="">
	.pd-10{
		padding: 10px;
	}
	.mclass{color: red;}
	.b{color: red;}
</style>
