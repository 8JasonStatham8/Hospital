<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>专家修改个人信息</title>
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
								 <a href="/Hospital/index.php/Expert/Appointment/lst.html">挂号信息</a>
							</li>
							<li>
								 <a href="/Hospital/index.php/Expert/Apply/add.html">申请停诊</a>
							</li>
							<li class="active">
								 <a href="#">个人信息</a>
							</li>
						</ul>
					</div>
					<div class="col-md-8 column">
					<!-- enctype="multipart/form-data"的作用是用于表单提交图片
					表单中enctype="multipart/form-data"的意思，是设置表单的MIME编码。默认情况，这个编码格式是application/x-www-form-urlencoded，不能用于文件上传；只有使用了multipart/form-data，才能完整的传递文件数据，进行下面的操作. 
					enctype="multipart/form-data"是上传二进制数据; form里面的input的值以2进制的方式传过去。 -->
						<form role="form" enctype="multipart/form-data" action="/Hospital/index.php/Expert/Expert/change" method="post">
							<div class="form-group">
								 <label for="expert_code">专家工号</label><input readonly="readonly" type="text" class="form-control" id="expert_code" name="expert_code" value="<?php echo ($expert['expert_code']); ?>" />
							</div>
							<div class="form-group">
								 <label for="expert_name">专家名称</label><input readonly="readonly" type="text" class="form-control" id="expert_name" name="expert_name" value="<?php echo ($expert['expert_name']); ?>" />
							</div>
							<div class="form-group">
								 <label for="expert_img">上传个人照片</label><input class="form-control" type="file" id="expert_img" name="expert_img" value="<?php echo ($expert['expert_img']); ?>" />
							</div>
							<div class="form-group">
								 <label for="expert_phone">手机号</label><input type="text" class="form-control" id="expert_phone" name="expert_phone" value="<?php echo ($expert['expert_phone']); ?>" />
							</div>
							<div class="form-group">
								 <label for="expert_password">密码</label><input type="text" class="form-control" id="expert_password" name="expert_password" value="<?php echo ($expert['expert_password']); ?>" />
							</div>
							<div class="form-group">
								 <label for="expert_skill">擅长领域</label><textarea class="form-control" id="expert_skill" name="expert_skill"  ><?php echo ($expert['expert_skill']); ?></textarea> 
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