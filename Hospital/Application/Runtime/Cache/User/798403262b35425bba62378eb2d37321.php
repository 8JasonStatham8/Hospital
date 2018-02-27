<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>个人预约信息</title>
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
							<li class="active">
								 <a href="#">预约记录</a>
							</li>
							<li>
								 <a href="/Hospital/index.php/User/User/update.html">个人信息</a>
							</li>
						</ul>
					</div>
					<div class="col-md-8 column">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>医院名</th>
									<th>科室名</th>
									<th>专家名</th>
									<th>预约日期</th>
									<th>预约时间</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>
					            <?php if(is_array($appointmentList)): $i = 0; $__LIST__ = $appointmentList;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$appointment): $mod = ($i % 2 );++$i;?><tr>
										<td><?php echo ($appointment['hos_name']); ?></td>
										<td><?php echo ($appointment['department_name']); ?></td>
										<td><?php echo ($appointment['expert_name']); ?></td>
										<td><?php echo ($appointment['appointment_date']); ?></td>
										<td><?php echo ($appointment['time']); ?></td>
										<td><a href="/Hospital/index.php/User/Appointment/concel/hos_code/<?php echo ($appointment['hos_code']); ?>/department_name/<?php echo ($appointment['department_name']); ?>/expert_code/<?php echo ($appointment['expert_code']); ?>/appointment_date/<?php echo ($appointment['appointment_date']); ?>" class="btn btn-danger" onclick="return confirm('请确认是否取消此预约?')";>取消预约</a></td>
										<!--expert_name/<?php echo ($appointment['expert_name']); ?>/appointment_date/<?php echo ($appointment['appointment_date']); ?>-->
									</tr><?php endforeach; endif; else: echo "$empty" ;endif; ?>
					            
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<footer>
	</footer>
</body>
</html>