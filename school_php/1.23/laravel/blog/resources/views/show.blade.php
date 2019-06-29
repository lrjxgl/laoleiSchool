<!DOCTYPE html>
<html>
	 @include('head')
</html>
<body>
	<div class="header">
		<div class="header-back"></div>
		<div class="header-title">详细页面</div>
		<a class="header-right-btn" href="{{url('/index/add/'.$data['id'])}}">编辑</a>
	</div>
	<div class="header-row"></div>
	<div class="main-body row-box">
		 <div class="mgb-10 f16">{{$data["title"]}}</div>
		 <div class="d-content">
			 {{$data["content"]}}
		 </div>
		 	
	</div>
	
</body>
