@extends('layout.adminCommon')

@section('content')


<div class="panel-body">
    <form role="form" action="{{ url('admin/index/goodsUpd_do') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>商品名称</label>
            <input class="form-control" type="text" name="goods_name"  value="{{ $data->goods_name }}">
            <!-- <p class="help-block">Help text here.</p> -->
        </div>
        <div class="form-group">
            <label>商品价格</label>
            <input class="form-control" type="text" name="goods_price" value="{{ $data->goods_price }}">
	        <!-- <p class="help-block">Help text here.</p> -->
        </div>
        <div class="form-group">
	        <label>上传图片</label>
            <input  type="file" name="goods_pic">
        </div>
        <div class="form-group">
            <img src="{{ asset($data->goods_pic) }}">
            <input type="hidden" name="id" value="{{ $data->id }}">
        </div>       
        <button type="submit" class="btn btn-info">确认修改 </button>
    </form>
</div>


@endsection