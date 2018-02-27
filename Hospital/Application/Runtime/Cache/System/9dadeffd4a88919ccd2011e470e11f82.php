<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>系统管理员管理黑名单</title>
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
								 <a href="/Hospital/index.php/System/Hospital/lst.html">医院管理</a>
							</li>
							<li class="active">
								 <a href="#">黑名单管理</a>
							</li>
						</ul>
					</div>
					<div class="col-md-8 column">
						<form class="form-inline" role="form" action="/Hospital/index.php/System/Black/black" method="get">
						  	<div class="form-group">
						    	<label class="sr-only" for="user_id">身份证号</label>
						    	<input type="text" class="form-control" id="name" name="user_id" placeholder="身份证号">
						  	</div>
						  	<button type="submit" class="btn btn-default">搜索</button>
						</form>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>身份证号</th>
									<th>姓名</th>
									<th>到期时间</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>
					            <?php if(is_array($blackList)): $i = 0; $__LIST__ = $blackList;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$black): $mod = ($i % 2 );++$i;?><tr>
										<td><?php echo ($black['user_id']); ?></td>
										<td><?php echo ($black['user_name']); ?></td>
										<td><?php echo ($black['stop_date']); ?></td>
										<td><a href="/Hospital/index.php/System/Black/delblack/user_id/<?php echo ($black['user_id']); ?>" class="btn btn-danger" onclick="return confirm('请确认是否删除该患者?')";>删除</a></td>
									</tr><?php endforeach; endif; else: echo "$empty" ;endif; ?>
					            <div><?php echo ($page); ?></div>
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