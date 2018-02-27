<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>专家在诊</title>
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
							<li class="active">
								 <a href="#">挂号信息</a>
							</li>
							<li>
								 <a href="/Hospital/index.php/Expert/Apply/add.html">申请停诊</a>
							</li>
							<li>
								 <a href="/Hospital/index.php/Expert/Expert/update.html">个人信息</a>
							</li>
						</ul>
					</div>
					<div class="col-md-8 column">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>患者身份证</th>
									<th>姓名</th>
									<th>时间</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>
					            <?php if(is_array($appointmentList)): $i = 0; $__LIST__ = $appointmentList;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$appointment): $mod = ($i % 2 );++$i;?><tr>
										<td><?php echo ($appointment['user_id']); ?></td>
										<td><?php echo ($appointment['user_name']); ?></td>
										<td><?php echo ($appointment['time']); ?></td>
										<td><a href="/Hospital/index.php/Expert/Appointment/agree/user_id/<?php echo ($appointment['user_id']); ?>" class="btn btn-success" onclick="return confirm('请确认是否就诊?')";>已就诊</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/Hospital/index.php/Expert/Appointment/reject/user_id/<?php echo ($appointment['user_id']); ?>" class="btn btn-danger" onclick="return confirm('请确认是否爽约?')";>已爽约</a></td>
									</tr><?php endforeach; endif; else: echo "$empty" ;endif; ?>
					            
							</tbody>
						</table>
						<div class="page-list"><?php echo ($page); ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<footer>
	</footer>
</body>
</html>