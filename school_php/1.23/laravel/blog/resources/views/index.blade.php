<!DOCTYPE html>
<html>
	 @include('head')
</html>
<body>
	<div class="header">
		<div class="header-title">老雷的博客</div>
	</div>
	<div class="header-row"></div>
	<div class="main-body">
		<div class="row-box">
		@foreach ($List as $item)
		    <a href="{{url('/index/show/'.$item["id"])}}" class="row-item">
				<div class="row-item-title">{{ $item["title"] }}</div>
			</a>
		@endforeach
		</div>
	</div>
	<div class="footer">
		<a href="{{url('/')}}" class="footer-item icon-home">首页</a>
		<a href="{{url('/index/add/')}}" class="footer-item icon-add">添加</a>
	</div>
</body>
