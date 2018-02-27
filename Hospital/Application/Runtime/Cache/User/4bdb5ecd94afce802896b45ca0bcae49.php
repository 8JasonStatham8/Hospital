<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>用户修改个人信息</title>
    <script src="/Hospital/Public/js/jquery.min.js"></script>
    <script src="/Hospital/Publicjs/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/Hospital/Public/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/Hospital/Public/css/Common/show.css" />

</head>
<body>
<link rel="stylesheet" type="text/css" href="/Hospital/Public/css/Common/page.css" />

<header style="text-align: center">
	<div class="jumbotron well">
		<h2 style="font-family:'Times New Roman',Georgia,Serif">C605&nbsp;医&nbsp;院&nbsp;管&nbsp;理&nbsp;系&nbsp;统</h2>
		<?php echo ($header); ?>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a style="width: 20%" class="btn btn-primary btn-large" href="/Hospital/index.php/Login/Logout/logout">退出</a>
	</div>
</header>
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12 column">
                <div class="row clearfix">
                    <div class="col-md-4 column">
                        <ul class="nav nav-stacked nav-pills">
                            <li>
                                 <a href="/Hospital/index.php/User/Appointment/lst.html">预约记录</a>
                            </li>
                            <li class="active">
                                 <a href="#">个人信息</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8 column">
                        <form role="form" action="/Hospital/index.php/User/User/update" method="post">
                            <div class="form-group">
                                 <label for="user_id">身份证号</label><input type="text" readonly="readonly" class="form-control" id="user_id" name="user_id" value="<?php echo ($user_id); ?>" />
                            </div>
                            <div class="form-group">
                                 <label for="user_name">姓名</label><input type="text" readonly="readonly" class="form-control" id="user_name" name="user_name" value="<?php echo ($user_name); ?>" />
                            </div>
                            <div class="form-group">
                                 <label for="user_phone">手机号</label><input type="text" class="form-control" id="user_phone" name="user_phone" value="<?php echo ($user_phone); ?>" />
                            </div>
                            
                                <button type="submit" class="btn btn-lg btn-primary btn-default">提交</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer></footer>
</body>
</html>