<table border="1">
	<tr>
		<td>编号</td>
		<td>车位状态</td>
		<td>进入时间</td>
		<td>离开时间</td>
		<td>合计金额</td>
	</tr>
	@foreach($data as $k => $v )
		<tr>
			<td>{{ $v->id }}</td>
			<td>{{ $v->state }}</td>
			<td>{{ $v->come_time }}</td>
			<td>{{ $v->go_time }}</td>
			<td>{{ $v->money }}</td>
		</tr>
	@endforeach
</table>
车辆收费总额为：{{ $money }}元