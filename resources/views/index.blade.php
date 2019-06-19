<!DOCTYPE html>
<html>
<head>
	<title>文件上传</title>
</head>
<body>
	<form action="{{url('/file')}}" method="post" enctype="multipart/form-data">
		@csrf
		<input type="file" name="file"> <br>
		<input type="submit" value="确认提交">

	</form>
</body>
</html>