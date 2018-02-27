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
	<header>
		
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
								 <a href="">黑名单管理</a>
							</li>
						</ul>
					</div>
					<div class="col-md-8 column">
						<form class="form-inline" role="form">
						  	<div class="form-group">
						    	<label class="sr-only" for="name">名称</label>
						    	<input type="text" class="form-control" id="name" placeholder="医院名称">
						  	</div>
						  	<div class="form-group">
				                <select name="hos_area" class="form-control" required>
					                <option value="null">请选择行政区划</option>
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
				                	<option value="null">请选择医院级别</option>
				                	<option value="三级甲等">三级甲等</option>
				                	<option value="三级乙等">三级乙等</option>
				                	<option value="二级甲等">二级甲等</option>
	               	 				<option value="二级乙等">二级乙等</option>
		                		</select>
					        </div>
						  	<button type="submit" class="btn btn-default">搜索</button>
						  	<a href="" class="btn btn-primary">添加</a>
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
					            <?php if(is_array($hospital_table)): $i = 0; $__LIST__ = $hospital_table;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$hospital_row): $mod = ($i % 2 );++$i;?><tr>
										<td>1</td>
										<td>TB - Monthly</td>
										<td>01/04/2012</td>
									</tr><?php endforeach; endif; else: echo "$empty" ;endif; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<footer>
		青岛大学C605
	</footer>
</body>
</html>