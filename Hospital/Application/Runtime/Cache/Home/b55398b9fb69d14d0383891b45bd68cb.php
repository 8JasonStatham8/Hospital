<?php if (!defined('THINK_PATH')) exit();?>  <!DOCTYPE html>
<html style="margin:0px 0px;padding: 0px 0px; ">
<head>
	<meta charset="utf-8"> 
	<title>管理者登陆</title>
 	<link rel="stylesheet" type="text/css" href="/Hospital/Public/css/bootstrap.min.css" />
	<script src="../../../Public/js/jquery.min.js"></script>
	<script src="../../../Public/js/bootstrap.min.js"></script>

</head>
<body style="margin:0px 0px;padding: 0px 0px; ">
	<header style="text-align: center;background-color: grey;height: 100px;margin: 0px 0px;padding: 0px 0px;">
		<h1>C605</h1>
	</header>
	<div style="text-align: center;">
		<form style="width:30%;height:35px;margin:150px auto; " class="form-horizontal" role="form">
			<div class="form-group">
				<label for="firstname" class="col-sm-2 control-label">账号</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="user_id" placeholder="请输入您的账号" required autocomplete="on">
				</div>
			</div>
			<div class="form-group">
				<label for="lastname" class="col-sm-2 control-label">密码</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" id="user_name" placeholder="请输入您的密码" required autocomplete="on">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default">登录</button>
				</div>
			</div>
		</form>
	</div>
</body>
</html>