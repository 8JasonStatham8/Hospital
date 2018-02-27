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
						<form class="form-inline" role="form" action="/Hospital/index.php/Hospital/Arrange/lst" method="post">
						  	<div class="form-group">
						    	<label class="sr-only" for="name">专家工号</label>
						    	<input type="text" class="form-control" id="name" name="expert_code" placeholder="专家工号">
						  	</div>
						  	<button type="submit" class="btn btn-default">搜索</button>
						  	<a href="/Hospital/index.php/Hospital/Arrange/add.html" class="btn btn-primary">添加</a>
						</form>
						<table class="table table-striped">
							<thead>
								<tr>
									<th rowspan="">专家工号</th>
									<th colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;星期一</th>
									<th colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;星期二</th>
									<th colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;星期三</th>
									<th colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;星期四</th>
									<th colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;星期五</th>
									<th colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;星期六</th>
									<th colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;星期日</th>
								</tr>
								<tr>
									<th></th>
									<th>上午</th>
									<th>下午</th>
									<th>上午</th>
									<th>下午</th>
									<th>上午</th>
									<th>下午</th>
									<th>上午</th>
									<th>下午</th>
									<th>上午</th>
									<th>下午</th>
									<th>上午</th>
									<th>下午</th>
									<th>上午</th>
									<th>下午</th>
								</tr>
							</thead>
							<tbody>
					            <?php if(is_array($arrangeList)): $i = 0; $__LIST__ = $arrangeList;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$arrange): $mod = ($i % 2 );++$i;?><tr>
										<td><?php echo ($arrange['expert_code']); ?></td>
										<td><?php echo ($arrange['monday']); ?></td>
										<td><?php echo ($arrange['monday2']); ?></td>
										<td><?php echo ($arrange['tuesday']); ?></td>
										<td><?php echo ($arrange['tuesday2']); ?></td>
										<td><?php echo ($arrange['wednesday']); ?></td>
										<td><?php echo ($arrange['wednesday2']); ?></td>
										<td><?php echo ($arrange['thursday']); ?></td>
										<td><?php echo ($arrange['thursday2']); ?></td>
										<td><?php echo ($arrange['friday']); ?></td>
										<td><?php echo ($arrange['friday2']); ?></td>
										<td><?php echo ($arrange['saturday']); ?></td>
										<td><?php echo ($arrange['saturday2']); ?></td>
										<td><?php echo ($arrange['sunday']); ?></td>
										<td><?php echo ($arrange['sunday2']); ?></td>
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