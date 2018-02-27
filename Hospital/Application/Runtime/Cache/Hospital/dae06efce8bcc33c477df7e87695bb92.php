<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>医院管理员管理医院</title>
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
								 <a href="/Hospital/index.php/Hospital/Apply/lst.html">申请停诊管理</a>
							</li>
							<li>
								 <a href="/Hospital/index.php/Hospital/Arrange/lst.html">排班管理</a>
							</li>
							<li>
								 <a href="/Hospital/index.php/Hospital/Department/lst.html">科室管理</a>
							</li>
							<li>
								 <a href="/Hospital/index.php/Hospital/Expert/lst.html">专家管理</a>
							</li>
							<li class="active">
								 <a href="#">医院信息管理</a>
							</li>
							<li>
								 <a href="/Hospital/index.php/Hospital/Data/lst">数据报表</a>
							</li>
						</ul>
					</div>
					<div class="col-md-8 column">
						<!-- enctype="multipart/form-data"的作用是用于表单提交图片 -->
						<form role="form" action="/Hospital/index.php/Hospital/Change/change" enctype="multipart/form-data" method="post">
							<div class="form-group">
								 <label for="hos_name">医院名称</label><input readonly="readonly" type="text" class="form-control" id="hos_name" value="<?php echo ($data['hos_name']); ?>" />
							</div>
							<div class="form-group">
								 <label for="hos_code">医院代码</label><input readonly="readonly" type="text" class="form-control" id="hos_code" value="<?php echo ($data['hos_code']); ?>" />
							</div><div class="form-group">
								 <label for="hos_password">医院管理员密码</label><input type="text" class="form-control" name="hos_password" id="hos_password" value="<?php echo ($data['hos_password']); ?>" />
							</div>
							<div class="form-group">
								 <label for="hos_pic">上传医院图片</label><input type="file" name="hos_pic" id="hos_pic" class="form-control" value="<?php echo ($data['hos_pic']); ?>" />
							</div>
							<div class="form-group">
								 <label for="hos_contact">医院电话</label><input type="text" class="form-control" name="hos_contact" id="hos_contact" value="<?php echo ($data['hos_contact']); ?>" />
							</div>
							<div class="form-group">
								 <label for="hos_address">医院地址</label><input type="text" class="form-control" name="hos_address" id="hos_address" value="<?php echo ($data['hos_address']); ?>" />
							</div>
							<div class="form-group">
								 <label for="hos_introduce">医院简介</label><textarea class="form-control" id="hos_introduce" name="hos_introduce" value="<?php echo ($data['hos_introduce']); ?>" ><?php echo ($data['hos_introduce']); ?></textarea> 
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