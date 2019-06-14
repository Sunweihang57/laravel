<!DOCTYPE html>
<html>
<head>
	<title>注册</title>
</head>
<body>
	<form action="{{url('update_do')}}" method="post">
		@csrf
		姓名： <input type="text" name="s_name" value="{{$data->s_name}}"><br>
		年龄： <input type="text" name="s_age" value="{{$data->s_age}}"><br>
		性别：
			@if($data->s_sex==1) 
			<input type="radio" name="s_sex" value="1" checked="">男 <input type="radio" name="s_sex" value="2">女 <br>
			@else
			<input type="radio" name="s_sex" value="1" checked="">男 <input type="radio" name="s_sex" value="2">女 <br>
			@endif
		爱好： 
			<input type="checkbox" name="s_habby" value="1">健身 
			<input type="checkbox" name="s_habby" value="2">机车 
			<input type="checkbox" name="s_habby" value="3">穿搭与护肤 <br>
		所属班级：
			@if($data->b_id==1)
			<select name="b_id">
				<option value="1" selected="">1812</option>
				<option value="2">1901</option>
			</select><br>
			@else
			<select name="b_id">
				<option value="1">1812</option>
				<option value="2" selected="">1901</option>
			</select><br>
			@endif
		<input type="hidden" name="s_id" value="{{$data->s_id}}">
		<input type="submit" value="修改">
	</form>
</body>
</html>