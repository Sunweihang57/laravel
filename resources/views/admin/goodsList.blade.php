@extends('layout.adminCommon');

@section('content')

  <!--    Striped Rows Table  -->
<div class="panel panel-default">
    <div class="panel-heading">
        商品列表   <a href="{{ url('admin/index/goodsCreate') }}">添加</a>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>编号</th>
                        <th>商品图片</th>
                        <th>商品名称</th>
                        <th>商品价格</th>
                        <th>上传时间</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($data as $v)
                    <tr>
                        <td>{{ $v->id }}</td>
                        <td>
                        	<img src="{{ asset($v->goods_pic) }}"  width="50" height="50">
                        </td>
                        <td>{{ $v->goods_name }}</td>
                        <td>{{ $v->goods_price }}RMB</td>
                        <td>{{ date("Y/m/d H:i:s",$v->add_time) }}</td>
                        <th>
                        	<a href="{{ url('admin/index/goodsDel') }}?id={{ $v->id }}">删除</a>|
                        	<a href="{{ url('admin/index/goodsUpd') }}?id={{ $v->id }}">修改</a>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{{ $data->links() }}
<!--  End  Striped Rows Table  -->

@endsection