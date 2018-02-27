<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>专家申请停诊</title>
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
								 <a href="/Hospital/index.php/Expert/Appointment/lst">挂号信息</a>
							</li>
							<li class="active">
								 <a href="/Hospital/index.php/Expert/Apply/add">申请停诊</a>
							</li>
							<li>
								 <a href="/Hospital/index.php/Expert/Expert/update">个人信息</a>
							</li>
						</ul>
					</div>
					<div class="col-md-8 column">
						<form role="form" action="/Hospital/index.php/Expert/Apply/add" method="post">
							<div class="form-group">
								 <label for="expert_code">专家工号</label><input readonly="readonly" type="text" class="form-control" id="expert_code" value="<?php echo ($expert_code); ?>" />
							</div>
							<div class="form-group">
								<input type="date" name="stop_date" class="form-control"/>
							</div>
							<div class="form-group">
								 <label for="reason">请假原因</label><textarea class="form-control" id="reason" name="reason" ></textarea> 
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