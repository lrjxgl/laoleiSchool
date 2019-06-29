Vue.component("list-cell",{
	props:{
		list:[],
		isGoods:0,
		myname:""
			
	},
	data:function(){
		return {
			items:[]
		}
	},
	created:function(){
		this.items=this.list;
	},
	methods:{
		fun:function(){
			
		}
	},
	template:`
		<div>
			<div>{{isGoods}}</div>
			<div>{{myname}}</div>
			<div @click="$emit('call-parent',item)" v-for="(item,index) in items" :key="index">{{item}}</div>
			<slot></slot>
		</div>
		 
	`
})