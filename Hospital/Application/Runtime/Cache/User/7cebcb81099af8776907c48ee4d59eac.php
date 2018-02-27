<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>科室页</title>
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
					<div class="col-md-12 column">
						<div class="jumbotron">
							<div>
								<h2><?php echo ($department_name); ?></h2></div>
								<p>
									<?php echo ($department_describe); ?>
								</p>
							</div>
						</div>
						<br><br>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>专家工号</th>
									<th>详情</th>
									<th><?php echo ($date[1]); ?></th>
									<th><?php echo ($date[2]); ?></th>
									<th><?php echo ($date[3]); ?></th>
									<th><?php echo ($date[4]); ?></th>
									<th><?php echo ($date[5]); ?></th>
									<th><?php echo ($date[6]); ?></th>
									<th><?php echo ($date[7]); ?></th>
								</tr>
							</thead>
							<tbody>
								<?php if(is_array($expertList)): $i = 0; $__LIST__ = $expertList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$expert): $mod = ($i % 2 );++$i;?><tr>
										<td><?php echo ($expert['16']); ?></td>
										<td>上午</td>
										<td><?php echo ($expert['1']); ?></td>
										<td><?php echo ($expert['2']); ?></td>
										<td><?php echo ($expert['3']); ?></td>
										<td><?php echo ($expert['4']); ?></td>
										<td><?php echo ($expert['5']); ?></td>
										<td><?php echo ($expert['6']); ?></td>
										<td><?php echo ($expert['7']); ?></td>
									</tr>
									<tr>
										<td></td>
										<td>下午</td>
										<td><?php echo ($expert['8']); ?></td>
										<td><?php echo ($expert['9']); ?></td>
										<td><?php echo ($expert['10']); ?></td>
										<td><?php echo ($expert['11']); ?></td>
										<td><?php echo ($expert['12']); ?></td>
										<td><?php echo ($expert['13']); ?></td>
										<td><?php echo ($expert['14']); ?></td>
									</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							</tbody>					
						</table>		
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer></footer>
	
</body>
</html>