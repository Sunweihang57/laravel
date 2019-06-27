<form action="{{ url('ceshi/student/index') }}" method="get">
	@csrf
	<input type="text" name="seach" value="{{ $seach }}">
	<input type="submit" value="搜索">
</form>
<table border="1">
	<tr>
		<td>id</td>
		<td>学生名字</td>
		<td>学生年龄</td>
		<td>操作</td>
	</tr>
	@foreach($data as $v)
	<tr>
		<td>{{ $v->s_id }}</td>
		<td>{{ $v->s_name }}</td>
		<td>{{ $v->s_age }}</td>
		<td>
			<a href="{{ url('ceshi/student/del') }}?id={{$v->s_id}}">删除</a>|
			<a href="{{ url('ceshi/student/upd') }}?id={{$v->s_id}}">修改</a>
		</td>
	</tr>
	@endforeach
</table>
{{ $data->appends(['seach'=>$seach])->links() }}