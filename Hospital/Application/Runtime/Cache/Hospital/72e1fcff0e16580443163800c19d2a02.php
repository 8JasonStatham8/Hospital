<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>医院管理员添加科室</title>
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
							<li class="active">
								 <a href="/Hospital/index.php/Hospital/Department/lst">科室管理</a>
							</li>
							<li>
								 <a href="/Hospital/index.php/Hospital/Expert/lst.html">专家管理</a>
							</li>
							<li>
								 <a href="/Hospital/index.php/Hospital/Change/lst.html">医院信息管理</a>
							</li>
							<li>
								 <a href="/Hospital/index.php/Hospital/Data/lst">数据报表</a>
							</li>
						</ul>
					</div>
					<div class="col-md-8 column">
						<form role="form" action="/Hospital/index.php/Hospital/Department/add" method="post">
							<div class="form-group">
								 <label for="department_name">科室名称</label><input type="text" class="form-control" id="department_name" name="department_name" required />
							</div>
							<div class="form-group">
					        	<select name="department_sort" class="form-control" required>
				                	<option value="内科">内科</option>
				                	<option value="外科">外科</option>
				                	<option value="急诊科">急诊科</option>
				                	<option value="中医科">中医科</option>
				                	<option value="妇产科">妇产科</option>
		                		</select>
					        </div>
							<div class="form-group">
								 <label for="department_describe">科室简介</label><textarea class="form-control" id="department_describe" name="department_describe" required ></textarea> 
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