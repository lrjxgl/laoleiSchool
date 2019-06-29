<template>
	<div>
		<div>
			更改代码了
		<img @longtap="saveImg(imgurl)" class="h160" :src="imgurl" />
		</div>
		<div>
		<img @longtap="saveImg(imgurl2)" class="h160"  :src="imgurl2"/>
		</div>
		<div>
			一天学一点新知识<br />
		老雷PHP全栈开发-uniApp实现微信长按保存图片
		
		</div>
	</div>
</template>

<script>
	export default{
		data(){
			return {
				imgurl:"http://img.deitui.com/?text=老雷PHP全栈开发&w=320&h=160",
				imgurl2:"http://img.deitui.com/?text=长按保存图片&w=320&h=160"
			}
		},
		methods:{
			saveImg:function(url){
				uni.downloadFile({
					url: url, 
					success: (res) => {
						if (res.statusCode === 200) {
							console.log('下载成功');
							uni.saveImageToPhotosAlbum({
							filePath: res.tempFilePath,
							success: function (rs) {
								console.log(rs);
								console.log('save success');
							}
						});
						}
					}
				});
			} 
		}
	}
</script>

<style>
	.h160{
		height:160px;
	}
</style>
