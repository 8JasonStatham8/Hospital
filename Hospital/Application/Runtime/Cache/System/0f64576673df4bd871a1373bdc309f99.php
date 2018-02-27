<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>系统管理员管理医院</title>
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
								 <a href="#">医院管理</a>
							</li>
							<li>
								 <a href="/Hospital/index.php/System/Black/black.html">黑名单管理</a>
							</li>
						</ul>
					</div>
					<div class="col-md-8 column">
						<form class="form-inline" role="form" action="/Hospital/index.php/System/Hospital/lst" method="get">
						  	<div class="form-group">
						    	<label class="sr-only" for="hos_name">名称</label>
						    	<input type="text" class="form-control" name="hos_name" placeholder="医院名称">
						  	</div>
						  	<div class="form-group">
				                <select name="hos_area" class="form-control">
					                <option value="">请选择行政区</option>				                	
					                <option value="市南区">市南区</option>
					                <option value="莱西市">莱西市</option>
					                <option value="市北区">市北区</option>
					                <option value="黄岛区">黄岛区</option>
					                <option value="崂山区">崂山区</option>
					                <option value="李沧区">李沧区</option>
					                <option value="城阳区">城阳区</option>
					                <option value="胶州市">胶州市</option>
					                <option value="即墨市">即墨市</option>
					                <option value="平度市">平度市</option>
					            </select>
					        </div>
					        <div class="form-group">
					        	<select name="hos_rank" class="form-control">
					        		<option value="">请选择医院等级</option>
				                	<option value="三级甲等">三级甲等</option>
				                	<option value="三级乙等">三级乙等</option>
				                	<option value="二级甲等">二级甲等</option>
	               	 				<option value="二级乙等">二级乙等</option>
		                		</select>
					        </div>
						  	<button type="submit" class="btn btn-default">搜索</button>
						  	<a href="/Hospital/index.php/System/Hospital/add" class="btn btn-primary">添加</a>
						</form>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>医院代码</th>
									<th>医院名称</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>
					            <?php if(is_array($hosList)): $i = 0; $__LIST__ = $hosList;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$hos): $mod = ($i % 2 );++$i;?><tr>
										<td><?php echo ($hos["hos_code"]); ?></td>
										<td><?php echo ($hos['hos_name']); ?></td>
										<td><a href="/Hospital/index.php/System/Hospital/delhos/hos_code/<?php echo ($hos['hos_code']); ?>" class="btn btn-danger" onclick="return confirm('请确认是否删除该医院?')";>删除</a></td>
									</tr><?php endforeach; endif; else: echo "$empty" ;endif; ?>
							</tbody>
						</table>
						<div class="page"><?php echo ($page); ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<footer>
	</footer>
</body>
</html>