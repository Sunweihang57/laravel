<!DOCTYPE html>
<html>
<head>
	<title>注册</title>
</head>
<body>
	<form action="{{url('save')}}" method="post">
		@csrf
		姓名： <input type="text" name="s_name"><br>
		年龄： <input type="text" name="s_age"><br>
		性别： <input type="radio" name="s_sex" value="1">男 <input type="radio" name="s_sex" value="2">女 <br>
		爱好： 
		<input type="checkbox" name="s_habby" value="1">健身 
		<input type="checkbox" name="s_habby" value="2">机车 
		<input type="checkbox" name="s_habby" value="3">穿搭与护肤 <br>
		所属班级：
		<select name="b_id">
			<option value="1">1812</option>
			<option value="2">1901</option>
		</select><br>
		<input type="submit" value="注册">
	</form>
</body>
</html>