<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>医院管理员数据报表</title>
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
								 <a href="/Hospital/index.php/Hospital/Apply/lst">申请停诊管理</a>
							</li>
							<li>
								 <a href="/Hospital/index.php/Hospital/Arrange/lst">排班管理</a>
							</li>
							<li>
								 <a href="/Hospital/index.php/Hospital/Department/lst">科室管理</a>
							</li>
							<li>
								 <a href="/Hospital/index.php/Hospital/Expert/lst">专家管理</a>
							</li>
							<li>
								 <a href="/Hospital/index.php/Hospital/Change/lst">医院信息管理</a>
							</li>
							<li class="active">
								 <a href="/Hospital/index.php/Hospital/Data/lst">数据报表</a>
							</li>
						</ul>
					</div>
					<div class="col-md-8 column">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>专家工号</th>
									<th>上午</th>
									<th>所剩时间点</th>
									<th>下午</th>
									<th>所剩时间点</th>
								</tr>
							</thead>
							<tbody>
					            <?php if(is_array($dataList)): $i = 0; $__LIST__ = $dataList;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
										<td><?php echo ($data['expert_code']); ?></td>
										<td><?php echo ($data['upnum']); ?></td>
										<td>
											<select name="up" id="up" class="form-control">
												<?php if(is_array($data["up"])): $i = 0; $__LIST__ = $data["up"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$uplst): $mod = ($i % 2 );++$i;?><option value="<?php echo ($uplst); ?>"><?php echo ($uplst); ?></option><?php endforeach; endif; else: echo "$empty" ;endif; ?>
											</select>
										</td>
										<td><?php echo ($data['downnum']); ?></td>
										<td>
											<select name="down" id="down" class="form-control">
												<?php if(is_array($data["down"])): $i = 0; $__LIST__ = $data["down"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$downlst): $mod = ($i % 2 );++$i;?><option value="<?php echo ($downlst); ?>"><?php echo ($downlst); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
											</select>
										</td>
									</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					            
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