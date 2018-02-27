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
    <style>
    	.sort-name{
    		color: red;
    		font-size: 30px;
    	}
    	.aa{
    		display: inline;
    	}
    	.information{
    		height: 200px;
    		background-color: #EEEEEE;
    		border-radius:10px;
    	}
    	img{
    		margin-top: 20px;
    		margin-left: 20px;
    		border-radius:10px;
    	}
    	.con{
    		float: left;
    		width: 20%;
    	}
    </style>

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

						<div class="information">
							<div style="width:25%; float: left;">
								<img src="<?php echo ($hospitalList['hos_pic']); ?>" alt="医院管理员太懒了">
							</div>
							<div style="width:75%; float: right;">
								<div class="aa"><h2><?php echo ($hospitalList['hos_name']); ?></h2></div>
								<div class="aa"><h4><?php echo ($hospitalList['hos_area']); ?></h4></div>
								<div class="aa"><h4><?php echo ($hospitalList['hos_rank']); ?></h4></div>
								<p style="">
									<?php echo ($hospitalList['hos_introduce']); ?>
								</p>
							</div>
						</div>
						
						<br><br>
						<div class="con">
						<table class="table table-striped">
							<thead><tr><th>内科</th></tr></thead>	
							<tbody>
								<?php if(is_array($neikeList)): $i = 0; $__LIST__ = $neikeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$neike): $mod = ($i % 2 );++$i;?><tr onclick="location.href='/Hospital/index.php/User/Use/expert/hos_code/<?php echo ($hospitalList['hos_code']); ?>/department_name/<?php echo ($neike['department_name']); ?>';">
									<td><?php echo ($neike['department_name']); ?></td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							</tbody>
						</table>
						</div>
						<div class="con">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>
										外科
									</th>
								</tr>
							</thead>	
							<tbody>
								<?php if(is_array($waikeList)): $i = 0; $__LIST__ = $waikeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$waike): $mod = ($i % 2 );++$i;?><tr onclick="location.href='/Hospital/index.php/User/Use/expert/hos_code/<?php echo ($hospitalList['hos_code']); ?>/department_name/<?php echo ($waike['department_name']); ?>';">
									<td><?php echo ($waike['department_name']); ?></td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							</tbody>
						</table>
						</div>
						<div class="con">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>
										急诊科
									</th>
								</tr>
							</thead>	
							<tbody>
								<?php if(is_array($jizhenkeList)): $i = 0; $__LIST__ = $jizhenkeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jizhenke): $mod = ($i % 2 );++$i;?><tr onclick="location.href='/Hospital/index.php/User/Use/expert/hos_code/<?php echo ($hospitalList['hos_code']); ?>/department_name/<?php echo ($jizhenke['department_name']); ?>';">
									<td><?php echo ($jizhenke['department_name']); ?></td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							</tbody>
						</table>
						</div>
						<div class="con">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>
										中医科
									</th>
								</tr>
							</thead>	
							<tbody>
								<?php if(is_array($zhongyikeList)): $i = 0; $__LIST__ = $zhongyikeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$zhongyike): $mod = ($i % 2 );++$i;?><tr onclick="location.href='/Hospital/index.php/User/Use/expert/hos_code/<?php echo ($hospitalList['hos_code']); ?>/department_name/<?php echo ($zhongyike['department_name']); ?>';">
									<td><?php echo ($zhongyike['department_name']); ?></td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							</tbody>
						</table>
						</div>
						<div class="con">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>
										妇产科
									</th>
								</tr>
							</thead>	
							<tbody>
								<?php if(is_array($fuchankeList)): $i = 0; $__LIST__ = $fuchankeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fuchanke): $mod = ($i % 2 );++$i;?><tr onclick="location.href='/Hospital/index.php/User/Use/expert/hos_code/<?php echo ($hospitalList['hos_code']); ?>/department_name/<?php echo ($fuchanke['department_name']); ?>';">
									<td><?php echo ($fuchanke['department_name']); ?></td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							</tbody>
						</table>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<footer></footer>
	
</body>
</html>