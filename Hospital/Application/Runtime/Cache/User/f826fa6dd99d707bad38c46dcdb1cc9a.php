<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>预约页</title>
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
	<div class="container" style="width: 50%">
		<div class="row clearfix">
			<div class="col-md-12 column">
				
				<form role="form" action="/Hospital/index.php/User/Use/appointment" method="post">
						<div class="information">
							<div style="width:25%; float: left;">
								<img src="<?php echo ($expert_img); ?>" alt="医生图片">
							</div>
							<div style="width:75%; float: right;">
								<div class="aa"><h2><?php echo ($expert_name); ?></h2></div>
								<div class="aa"><h4><?php echo ($hos_name); ?></h4></div>
								<div class="aa"><h4><?php echo ($department_name); ?></h4></div>
								<p>
									<?php echo ($expert_skill); ?>
								</p>
							</div>
						</div>
						<div class="form-group">
							 <label for="date">您选择的日期</label><input type="text" readonly="readonly" class="form-control" id="date" name="appointment_date" value="<?php echo ($appointment_date); ?>" />
						</div>
						<div style="display: none;">
							<input type="text" name="hos_name" value="<?php echo ($hos_name); ?>">
							<input type="text" name="hos_code" value="<?php echo ($hos_code); ?>">
							<input type="text" name="expert_code" value="<?php echo ($expert_code); ?>">
							<input type="text" name="department_name" value="<?php echo ($department_name); ?>">
							<input type="text" name="info" value="<?php echo ($info); ?>">
							<input type="text" name="expert_name" value="<?php echo ($expert_name); ?>">
						</div>
						<div class="form-group">
							<label for="time">请选择前去就诊时间</label>
					        <select class="form-control" name="time">
					            <?php if(is_array($timeList)): $i = 0; $__LIST__ = $timeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$time): $mod = ($i % 2 );++$i;?><option value="<?php echo ($time); ?>"><?php echo ($time); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		                	</select>
					        </div>
					<button type="submit" class="btn btn-default btn-primary">提交预约</button>
				</form>
			</div>
		</div>
	</div>
	<footer></footer>
	
</body>
</html>