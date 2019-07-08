<h2>车辆出库</h2>
<form action="{{ url('goDo') }}" method="post">@csrf
车牌号： <input type="text" name="c_num">
<input type="submit" value="车辆出库">	
</form>