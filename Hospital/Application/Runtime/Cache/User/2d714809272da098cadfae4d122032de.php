<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>首页</title>
    <script src="/Hospital/Public/js/jquery.min.js"></script>
    <script src="/Hospital/Publicjs/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/Hospital/Public/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/Hospital/Public/css/Common/show.css" />
    <style>
    	p{
       		overflow:hidden;
			text-overflow:ellipsis;
			-o-text-overflow:ellipsis;
			width:100%;
			height: 60PX;
		}
		h4,h1{
			display: inline;
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
						<form class="form-inline" role="form" style="background-color: #F9F9F9;height: 40px;text-align:center;" action="/Hospital/index.php/User/Use/index" method="post">
						  	<div class="form-group">
						    	<label class="sr-only" for="name">名称</label>
						    	<input type="text" class="form-control" id="name" name="hos_name" placeholder="医院名称">
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
						</form>
						<br><br><br><br><br><br><br>
						<table class="table">
							<tbody>
					            <?php if(is_array($hospitalList)): $i = 0; $__LIST__ = $hospitalList;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$hospital): $mod = ($i % 2 );++$i;?><tr onclick="location.href='/Hospital/index.php/User/Use/department/hos_name/<?php echo ($hospital['hos_name']); ?>';">
									<td style="width: 170px;height: 140px;" ><img src="<?php echo ($hospital['hos_pic']); ?>" alt="医院图片"></td>
									<td>
										<h1><a href="#"><?php echo ($hospital['hos_name']); ?></a></h1>&nbsp;&nbsp;&nbsp;<h4 style="background-color: #87CEEB; border-radius: 3px;"><?php echo ($hospital['hos_rank']); ?></h4>&nbsp;&nbsp;&nbsp;<h4 style="background-color: #00FF7F"><?php echo ($hospital['hos_area']); ?></h4>
										<p><?php echo ($hospital['hos_introduce']); ?></p>
									</td>
								</tr><?php endforeach; endif; else: echo "$empty" ;endif; ?>
							</tbody>
						</table>
						<div class="page-list"><?php echo ($page); ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer></footer>
	
</body>
</html>