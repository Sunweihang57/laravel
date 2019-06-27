<form action="{{ url('ceshi/student/upd_do') }}" method="post">
	@csrf
	学生姓名： <input type="text" name="s_name" value="{{ $data->s_name }}"><br>
	学生年龄： <input type="text" name="s_age" value="{{ $data->s_age }}"><br>
	<input type="hidden" name="s_id" value="{{ $data->s_id }}">
	<input type="submit" value="确认修改">
</form>