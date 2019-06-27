<form action="{{ url('ceshi/student/save') }}" method="post">
	@csrf
	学生姓名： <input type="text" name="s_name"><br>
	学生年龄： <input type="text" name="s_age"><br>
	<input type="submit" value="注册">
</form>