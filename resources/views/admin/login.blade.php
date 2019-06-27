<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>后台登录</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="{{ asset('admin/assets/css/bootstrap.css') }}" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="{{ asset('admin/assets/css/font-awesome.css') }}" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body style="background-color: #E2E2E2;">
    <div class="container">
        <div class="row text-center " style="padding-top:100px;">
            <div class="col-md-12">
                <img src="{{ asset('admin/assets/img/logo-invoice.png') }}" />
            </div>
        </div>
         <div class="row ">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                           
                            <div class="panel-body">
                                <form role="form" action="{{url('/admin/login/login_do')}}" method="post">
                                	@csrf
                                    <hr />
                                    <h5>请输入账号密码</h5>
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" name="name" class="form-control" placeholder="账号 " />
                                        </div>
                                                                              <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" name="password" class="form-control"  placeholder="密码" />
                                        </div>
                                    <div class="form-group">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" /> 记住密码
                                            </label>
                                            <span class="pull-right">
                                                   <a href="index.html" >忘记密码 ? </a> 
                                            </span>
                                        </div>
                                     
                                     <input type="submit" value="登录" class="btn btn-primary ">
                                    
                            </div>
                           
                        </div>
                
                
        </div>
    </div>

</body>
</html>














