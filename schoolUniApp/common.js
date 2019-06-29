module.exports={
	apiHost:"http://school.com/school_php/",
	get:function(ops){
		var callback=ops.success;
		uni.request({
			url:this.apiHost+ops.url,
			method:"get",
			 
			success:function(res){
				callback(res.data)
			}
		})
	},
	post:function(ops){
		var callback=ops.success;
		uni.request({
			url:this.apiHost+ops.url,
			method:"post",
			data:ops.data,
			header:{
				"content-type":"application/x-www-form-urlencoded"
			},
			success:function(res){
				callback(res.data)
			}
		})
	}
}