<template>
	<view>
       <div>uniApp-swipe</div>
	   <div @touchstart="touchstart" @touchmove="touchmove"  @touchend="touchend" class="box" >{{swipeEvent}}
		 <div @touchstart="touchstart2"     @touchend="touchend2" class="box2" >{{swipeEvent}}</div>
	   </div>
	  
	</view>
</template>

<script>
	 
	function vueTouch(){
		return {
			x:0,
			y:0,
			dx:10,
			dy:10,
			inTouch:false,
			moveX:0,
			moveY:0,
			touchstart:function(e){
				//event.stopPropagation();
				this.inTouch=true;
				this.x=e.touches[0].clientX;
				this.y=e.touches[0].clientY;
			},
			touchmove:function(e){
				if(!this.inTouch){
					return;
				}
				 
				var dx=e.touches[0].clientX-this.x;
				var dy=this.y-e.touches[0].clientY;
				this.moveX=dx;
				this.moveY=dy;
				if(Math.abs(dx)>Math.abs(dy)){
					
					if(dx>this.dx){
						this.inTouch=false;
						return "swipeRight";
					}
					if(dx<-this.dx){
						this.inTouch=false;
						return "swipeLeft";
					}
				}else{
					if(dy>this.dy){
						this.inTouch=false;
						return "swipeUp";
					}
					if(dy<-this.dy){
						this.inTouch=false;
						return "swipeDown";
					}
				}
			},
			touchend:function(e){
				
				if(!this.inTouch){
					return;
				}
				//console.log(e.changedTouches[0]);
				var dx=e.changedTouches[0].clientX-this.x;
				var dy=this.y-e.changedTouches[0].clientY;
				this.moveX=dx;
				this.moveY=dy;
				if(Math.abs(dx)>Math.abs(dy)){
					
					if(dx>this.dx){
						this.inTouch=false;
						return "swipeRight";
					}
					if(dx<-this.dx){
						this.inTouch=false;
						return "swipeLeft";
					}
				}else{
					if(dy>this.dy){
						this.inTouch=false;
						return "swipeUp";
					}
					if(dy<-this.dy){
						this.inTouch=false;
						return "swipeDown";
					}
				}
			}
		}
	};
	var touch=new vueTouch();
	var touch2=new vueTouch();
	export default {
		data() {
			return {
				title: 'Hello',
				swipeEvent:"",
			}
		},
		onLoad() {

		},
		methods: {
			swipeLeft:function(){
				this.swipeEvent="swipeLeft"+touch.moveX;
				console.log("swipeLeft"+touch.moveX)
			},
			swipeLeft2:function(){
				this.swipeEvent="swipeLeft"+touch2.moveX;
				console.log("swipeLeft"+touch2.moveX)
			}, 
			swipeRight:function(){
				this.swipeEvent="swipeRight"+touch.moveX;
				console.log("swipeRight"+touch.moveX)
			},
			swipeDown:function(e){
				this.swipeEvent="swipeDown"+touch.moveY;
				console.log("swipeDown"+touch.moveY)
			},
			swipeUp:function(e){
				this.swipeEvent="swipeUp"+touch.moveY;
				console.log("swipeUp"+touch.moveY)
			},
			touchstart2:function(e){
				event.stopPropagation();
				touch2.touchstart(e);
			},
			touchend2:function(e){
				switch(touch2.touchend(e)){
					case "swipeLeft":
						this.swipeLeft2();
						break;
				}
			},
			touchstart:function(e){
				touch.touchstart(e);
			},
			touchmove:function(e){
				switch(touch.touchmove(e)){
					case "swipeLeft":
						this.swipeLeft();
						break;
					case "swipeRight":
						this.swipeRight();
						break;
					case "swipeUp":
						this.swipeUp();
						break;
					case "swipeDown":
						this.swipeDown();
						break;
				}
			},
			touchend:function(e){
				switch(touch.touchend(e)){
					case "swipeLeft":
						this.swipeLeft();
						break;
					case "swipeRight":
						this.swipeRight();
						break;
					case "swipeUp":
						this.swipeUp();
						break;
					case "swipeDown":
						this.swipeDown();
						break;
				}
			}
		}
	}
</script>

<style>
	.box{
		width:200px; height: 200px; border: 1px solid #f30;
	} 
	.box2{
		width:100px; height: 100px; border: 1px solid #f30;
	} 
</style>
