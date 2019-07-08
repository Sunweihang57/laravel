<h3>添加门卫</h3>
<form action="{{ url('mwDo') }}" method="post">@csrf
	门卫账号：<input type="text" name="m_user">
	<input type="submit" value="添加">
</form>