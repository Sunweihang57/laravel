<h2>车辆入库</h2>
<form action="{{ url('comeDo') }}" method="post">@csrf
车牌号： <input type="text" name="c_num">
<input type="submit" value="车辆进入">	
</form>