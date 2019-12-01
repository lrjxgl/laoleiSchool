<template>
	<view>
		<view>
			<view>老雷uniApp教程之websocket</view>
			<view class="item" v-for="(item,index) in list" :key="index">
				{{item}}
			</view>
		</view>
		<view class="ft">
			<input class="ft-text" type="text" v-model="content" />
			<view class="ft-btn" @click="sendMsg">发送</view>
		</view>
	</view>
</template>

<script>
	var ws;
	var uid="schooluniapp_index";
	var touid="schooluniapp_two";
	export default{
		data:function(){
			return {
				list:[],
				content:""
			}
		},
		onLoad:function(){
			this.wsInit();
		},
		methods:{
			wsInit:function(){
				var that=this;
				ws = uni.connectSocket({
				    url: 'wss://wss.deituicms.com:8282', //仅为示例，并非真实接口地址。
				    complete: (e)=> {
						console.log(e)
					},
					fail: function(res) {
						uni.showToast({
							title: "ws error"
						})
					}
				});
				ws.onOpen(function(e){
					console.log(e);
					that.wsLogin();
				})
				ws.onError(function(e){
					
				})
				ws.onClose(function(e){
					
				})
				ws.onMessage(function(e){
					var res = JSON.parse(e.data);
					switch(res.type){
						case "say":
							that.list.push(res.content);
							break;
					}
				})
				
			},
			wsLogin:function(){
				var msg = JSON.stringify({
					type: "login",
					k: uid,
					content: "login"
				});
				ws.send({
					data:msg,
					success:function(e){
						 
					}
				})
			},
			sendMsg:function(){
				var that=this;
				if(this.content=='') return false;
				var msg = JSON.stringify({
					type: "say",
					wsclient_to: touid,
					content: this.content
				});
				ws.send({
					data:msg,
					success:function(e){
						
						that.content="";
					}
				})
			}
		}
	}
</script>

<style>
	.item{
		padding: 5px 10px;
	}
	.ft{
		display: flex;
		flex-direction: row;
		position: fixed;
		bottom: 0px;
		left: 0;
		right: 0;
	}
	.ft-text{
		padding: 0px 10px;
		display: block;
		flex: 1;
		border:1px solid #eee;
		height: 30px;
		line-height: 30px;
	}
	.ft-btn{
		height: 30px;
		line-height: 30px;
		width: 60px;
		text-align: center;
		background-color: #f60;
		color: #fff;
		font-size: 14px;
	}
</style>
