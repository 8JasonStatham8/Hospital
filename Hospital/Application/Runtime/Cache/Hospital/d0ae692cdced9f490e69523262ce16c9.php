<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>医院管理员管理科室</title>
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
								 <a href="#">科室管理</a>
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
						<form class="form-inline" role="form" action="/Hospital/index.php/Hospital/Department/lst" method="post">
						  	<div class="form-group">
						    	<label class="sr-only" for="name">科室名称</label>
						    	<input type="text" class="form-control" id="name" name="department_name" placeholder="科室名称">
						  	</div>
						  	<button type="submit" class="btn btn-default">搜索</button>
						  	<a href="/Hospital/index.php/Hospital/Department/add.html" class="btn btn-primary">添加</a>
						</form>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>科室名称</th>
									<th>科室类别</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>
					            <?php if(is_array($departmentList)): $i = 0; $__LIST__ = $departmentList;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$department): $mod = ($i % 2 );++$i;?><tr>
										<td><?php echo ($department['department_name']); ?></td>
										<td><?php echo ($department['department_sort']); ?></td>
										<td><a href="/Hospital/index.php/Hospital/Department/deldepartment/department_name/<?php echo ($department['department_name']); ?>" class="btn btn-danger" onclick="return confirm('请确认是否删除此科室?')";>删除</a></td>
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