@extends('layout.adminCommon')

@section('content')


<div class="panel-body">
    <form role="form" action="{{ url('admin/index/goodsSave') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>商品名称</label>
            <input class="form-control" type="text" name="goods_name">
            <!-- <p class="help-block">Help text here.</p> -->
        </div>
        <div class="form-group">
            <label>商品价格</label>
            <input class="form-control" type="text" name="goods_price">
	        <!-- <p class="help-block">Help text here.</p> -->
        </div>
        <div class="form-group">
	        <label>上传图片</label>
            <input  type="file" name="goods_pic">
        </div>
        <button type="submit" class="btn btn-info">确认添加 </button>
    </form>
</div>


@endsection