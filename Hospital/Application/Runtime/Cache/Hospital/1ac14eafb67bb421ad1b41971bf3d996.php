<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>医院管理员管理排班</title>
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
							<li class="active">
								 <a href="#">排班管理</a>
							</li>
							<li>
								 <a href="/Hospital/index.php/Hospital/Department/lst.html">科室管理</a>
							</li>
							<li>
								 <a href="/Hospital/index.php/Hospital/Expert/lst.html">专家管理</a>
							</li><li>
								 <a href="/Hospital/index.php/Hospital/Change/lst.html">医院信息管理</a>
							</li>
							<li>
								 <a href="/Hospital/index.php/Hospital/Data/lst">数据报表</a>
							</li>
						</ul>
					</div>
					<div class="col-md-8 column">
						<form role="form" action="/Hospital/index.php/Hospital/Arrange/add" method="post">
							<div class="form-group">
								 <label for="expert_code">专家工号</label><input type="text" class="form-control" id="expert_code" name="expert_code" required />
							</div>
							<div class="form-group">
								<table class="table table-striped">
							<thead>
								<tr>
									<th>星期</th>
									<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;上午上班</th>
									<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;下午上班</th>
								</tr>
							</thead>
							<tbody>
					            <tr>
									<td>一</td>
									<td><input class="form-control" type="checkbox" name="monday" value="√" /></td>
									<td><input class="form-control" type="checkbox" name="monday2" value="√"></td>
								</tr>
								<tr>
									<td>二</td>
									<td><input class="form-control" type="checkbox" name="tuesday" value="√"></td>
									<td><input class="form-control" type="checkbox" name="tuesday2" value="√"></td>
								</tr>
								<tr>
									<td>三</td>
									<td><input class="form-control" type="checkbox" name="wednesday" value="√"></td>
									<td><input class="form-control" type="checkbox" name="wednesday2" value="√"></td>
								</tr>
								<tr>
									<td>四</td>
									<td><input class="form-control" type="checkbox" name="thursday" value="√"></td>
									<td><input class="form-control" type="checkbox" name="thursday2" value="√"></td>
								</tr>
								<tr>
									<td>五</td>
									<td><input class="form-control" type="checkbox" name="friday" value="√"></td>
									<td><input class="form-control" type="checkbox" name="friday2" value="√"></td>
								</tr>
								<tr>
									<td>六</td>
									<td><input class="form-control" type="checkbox" name="saturday" value="√"></td>
									<td><input class="form-control" type="checkbox" name="saturday2" value="√"></td>
								</tr>
								<tr>
									<td>日</td>
									<td><input class="form-control" type="checkbox" name="sunday" value="√"></td>
									<td><input class="form-control" type="checkbox" name="sunday2" value="√"></td>
								</tr>

							</tbody>
						</table>

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