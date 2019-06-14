<!DOCTYPE html>
<html>
<head>
	<title>列表展示</title>
	<style type="text/css">
		li{ list-style: none; }
		a{ text-decoration: none; }
	</style>
</head>
<body>
	<a href="{{url('redis')}}">浏览记录</a>
	<form action="{{url('list')}}" method="get">
		<div align="center">
			<input type="text" name="find_name" value="{{$find_name}}">
			<input type="submit" value="搜索">
		</div>
	</form>

	<table align="center">
		<caption><a href="{{url('user')}}">注册</a></caption>
		<tr>
			<td>ID</td>
			<td>姓名</td>
			<td>年龄</td> 
			<td>性别</td>
			<td>爱好</td>
			<td>班级</td>
			<td>操作</td>
		</tr>
		@foreach($student_pege as $item)
		<tr>
			<td>{{$item->s_id}}</td>
			<td>{{$item->s_name}}</td>
			<td>{{$item->s_age}}</td>
			<td>
				@if($item->s_sex==1)
					男
				@else
					女
				@endif
			</td>
			<td>
				{{$item->s_habby}}
			</td>
			<td>
				@if($item->b_id==1)
					1812班
				@else
					1901班
				@endif
			</td>
			<td>
				<a href="{{url('del')}}?id={{$item->s_id}}">删除</a>|
				<a href="{{url('update')}}?id={{$item->s_id}}">修改</a>
			</td>
		</tr>
		@endforeach
	</table>

	<!-- 分页显示的特殊方法由paginate查询提供，类似于tp5.1的page()方法不同的为分页和信息展示一个方法就够了 -->
	<div align="center">{{$student_pege->appends(['find_name'=>$find_name])->links()}}</div>

</body>
</html>
